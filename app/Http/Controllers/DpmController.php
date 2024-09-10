<?php

namespace App\Http\Controllers;

use App\Models\DaftarMaterial;
use App\Models\Dpm;
use App\Models\DpmSuratJalan;
use App\Models\KepalaGudang;
use App\Models\Material;
use App\Models\Pemeriksa;
use App\Models\PengambilPenerima;
use App\Models\Setuju;
use App\Models\SuratJalan;
use App\Models\Ulp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DpmController extends Controller {    

    public function index () {

        $user = Auth::user();

        $ulps = Ulp::all();
        $kepalaGdng = KepalaGudang::all();
        $setuju = Setuju::all();
        $pemeriksa = Pemeriksa::where('id_user', $user->id_user)->get();
        $penerima = PengambilPenerima::where('id_user', $user->id_user)->get();


        return view('dpm', compact('ulps', 'kepalaGdng', 'setuju', 'pemeriksa', 'penerima'));
    }

    public function search(Request $request) {
        if($request->ajax()) {
    
            $materials = DB::table('material')
                ->where('nama','LIKE','%'.$request->search."%")
                ->get();
    
            $results = [];
    
            if($materials) {
                foreach ($materials as $material) {
                    $results[] = [
                        'id'            => $material->id_material,
                        'nama'          => $material->nama,
                        'normalisasi'   => $material->normalisasi,
                        'satuan'        => $material->satuan
                    ];
                }
            }
    
            return response()->json(['materials' => $results]);
        }
    }

    public function store(Request $request) {

        $idUser = Auth::user()->id_user;

        // Mengambil id_dpb terakhir atau menginisiasi nomor baru
        $lastDpm = Dpm::orderBy('id_dpb', 'desc')->first();
        $lastDpmNum = $lastDpm ? $lastDpm->id_dpb + 1 : 1;
        $nomorBon = "MLG" . date("y") . "-" . str_pad($lastDpmNum, 4, '0', STR_PAD_LEFT);
        $nomorDPB = "TUG 5. " . $nomorBon;

        // Validasi umum
        $request->validate([
            'pbpd'              => 'required|in:1,2',
            'nospk'             => 'required',
            'jenispekerjaan'    => 'required|in:1,2,3,4,5,6,7,8,9',
            'idpel'             => 'required',
            'nama_pel'          => 'required',
            'alamat_pel'        => 'required',
            'pbpd'              => 'required|in:1,2',
            'dayabaru'          => 'required',
        ]);

        $pbpd = $request->input('pbpd');

        // Validasi tambahan untuk case 1
        if ($pbpd == 1) {
            $request->validate([
                'setuju'        => 'required',
                'kepalagudang'  => 'required',
                'pemeriksa'     => 'required',
                'penerima'      => 'required',
            ]);
        } else {
            $request->validate([
                'dayalama' => 'required',
            ]);
        }

        $kepalaGudang = strtoupper($request->input('setuju'));
        $penerima = strtoupper($request->input('pemeriksa'));

        $this->createIfNotExists(KepalaGudang::class, 'nama', $kepalaGudang);
        $this->createIfNotExists(PengambilPenerima::class, 'nama', $penerima);

        // Insert DpmSuratJalan
        $dpmSuratJalan = DpmSuratJalan::create([
            'kepala_gudang'         => $kepalaGudang,
            'penerima'              => $penerima,
            'no_spk'                => $request->input('nospk'),
            'id_jenis_pekerjaan'    => $request->input('jenispekerjaan'),
            'idpel'                 => $request->input('idpel'),
            'nama_pelanggan'        => $request->input('nama_pel'),
            'alamat_pelanggan'      => $request->input('alamat_pel'),
            'id_ulp'                => $request->input('ulp'),
            'id_pb_pd'              => $request->input('pbpd'),
            'tarif_daya_lama'       => $pbpd == 2 ? $request->input('dayalama') : null,
            'tarif_daya_baru'       => $request->input('dayabaru'),
            'id_user'               => $idUser
        ]);

        $lastInsertedId = $dpmSuratJalan->id_dpb_suratjalan;

        // Looping untuk insert daftar material dan update stok
        foreach ($request->input('idmaterial') as $index => $idMaterial) {
            $banyakDiminta = $request->input('banyakdiminta')[$index];
            $material = Material::find($idMaterial);
            $material->decrement('jumlah_sap', $banyakDiminta);

            DaftarMaterial::create([
                'id_dpb_suratjalan' => $lastInsertedId,
                'id_material'       => $idMaterial,
                'jumlah'            => $banyakDiminta
            ]);
        }

        $setuju = strtoupper($request->input('setuju'));
        $pemeriksa = strtoupper($request->input('pemeriksa'));

        // Insert Dpm
        Dpm::create([
            'nomor_dpb'         => $nomorDPB,
            'id_dpb_suratjalan' => $lastInsertedId,
            'tgl_diminta'       => date('Y-m-d'),
            'setuju'            => $setuju,
            'pemeriksa'         => $pemeriksa
        ]);

        // Proses penyimpanan data "setuju" dan "pemeriksa" jika belum ada di database
        $this->createIfNotExists(Setuju::class, 'nama', $setuju);
        $this->createIfNotExists(Pemeriksa::class, 'nama', $pemeriksa);

        // Insert SuratJalan
        SuratJalan::create([
            'id_dpb_suratjalan' => $lastInsertedId,
            'tgl_diterima'      => null,
            'nomor_polisi'      => null,
            'pengemudi'         => null
        ]);

        return redirect('/detail-surat');
    }

    /**
     * Helper function untuk create record jika belum ada.
     */
    private function createIfNotExists($model, $field, $value) {

        $idUser = Auth::user()->id_user;

        if (!$model::where($field, $value)->exists()) {
            $model::create([$field => $value, 'id_user' => $idUser]);
        }
    }
}