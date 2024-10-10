<?php

namespace App\Http\Controllers;

use App\Models\DaftarMaterial;
use App\Models\Dpm;
use App\Models\DpmSuratJalan;
use App\Models\K7SrtJln;
use App\Models\KepalaGudang;
use App\Models\Material;
use App\Models\Pemeriksa;
use App\Models\PengambilPenerima;
use App\Models\Setuju;
use App\Models\SuratJalan;
use App\Models\Ulp;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class K7Controller extends Controller
{
    public function index () {

        $user = Auth::user();
        $ulps = Ulp::all();
        $kepalaGdng = KepalaGudang::all();
        $setuju = Setuju::all();
        $pemeriksa = Pemeriksa::where('id_user', $user->id_user)->get();
        $penerima = PengambilPenerima::where('id_user', $user->id_user)->get();

        return view('k7', compact('ulps', 'kepalaGdng', 'setuju', 'pemeriksa', 'penerima'));
    }

    public function search(Request $request) {
        if($request->ajax()) {

            $materials = DB::table('material_k7')
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
        $noK7 = DB::table('k7')
        ->orderBy('nmr', 'desc')
        ->first();
        $nomorK7String = $noK7? ($noDpm->nomor_dpb ?? 0) : 0;
        $parts = explode('-', $nomorK7String);
        $lastPart = end($parts); // Mengambil bagian terakhir

        if ($lastPart !== null) {
            // Menghapus angka nol di depan
            $filteredPart = (int)ltrim($lastPart, '0');
        }
        $lastDpmNum = $filteredPart + 1;
        $nomorBon = "MLG" . date("y") . "-" . str_pad($lastDpmNum, 4, '0', STR_PAD_LEFT);
        $nomorDPB = "TUG 5 NS. " . $nomorBon;

        // Validasi umum
        $request->validate([
            'pbpd'              => 'required|in:1,2',
            'nospk'             => 'required',
            'jenispekerjaan'    => 'required|in:1,2,3,4,5,6,7,8,9',
            'idpel'             => 'required',
            'nama_pel'          => 'required',
            'alamat_pel'        => 'required',
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

        $merkmat = $request->input('merkmaterial');

        // Insert SuratJalan
        $sJln = SuratJalan::create([
            'nomor_suratjln'    => null,
            'tgl_diterima'      => null,
            'nomor_polisi'      => null,
            'pengemudi'         => null
        ]);

        $lastSurJalId = $sJln->id_surat_jalan;

        $kepalaGudang = strtoupper($request->input('kepalagudang'));
        $penerima = strtoupper($request->input('penerima'));

        $this->createIfNotExists(KepalaGudang::class, 'nama', $kepalaGudang);
        $this->createIfNotExists(PengambilPenerima::class, 'nama', $penerima);

        // Insert DpmSuratJalan
        $k7SuratJalan = K7SrtJln::create([
            'id_srtjln'         => $lastSurJalId,
            'kepala_gudang'         => $kepalaGudang,
            'penerima'              => $penerima,
            'no_spk'                => $request->input('nospk'),
            'id_jns_pekerjaan'    => $request->input('jenispekerjaan'),
            'idpel'                 => $request->input('idpel'),
            'nm_pelanggan'        => $request->input('nama_pel'),
            'almt_pelanggan'      => $request->input('alamat_pel'),
            'id_ulp'                => $request->input('ulp'),
            'id_pb_pd'              => $request->input('pbpd'),
            'trfdy_lama'       => $pbpd == 2 ? $request->input('dayalama') : null,
            'trfdy_baru'       => $request->input('dayabaru'),
            'id_user'               => $idUser
        ]);

        $lastInsertedId = $k7SuratJalan->id;


        // Looping untuk insert daftar material dan update stok
        foreach ($request->input('idmaterial') as $index => $idMaterial) {
            $banyakDiminta = $request->input('banyakdiminta')[$index];
            $material = Material::find($idMaterial);
            $material->decrement('jumlah_sap', $banyakDiminta);

            DaftarMaterial::create([
                'id' => $lastInsertedId,
                'id_material'       => $idMaterial,
                'jumlah'            => $banyakDiminta
            ]);
        }

        $setuju = strtoupper($request->input('setuju'));
        $pemeriksa = strtoupper($request->input('pemeriksa'));

        // Insert Dpm
        $dPM = Dpm::create([
            'nomor_dpb'         => $nomorDPB,
            'id' => $lastInsertedId,
            'tgl_diminta'       => date('Y-m-d'),
            'setuju'            => $setuju,
            'pemeriksa'         => $pemeriksa
        ]);

        $id = $dPM->id_dpb;

        // Proses penyimpanan data "setuju" dan "pemeriksa" jika belum ada di database
        $this->createIfNotExists(Setuju::class, 'nama', $setuju);
        $this->createIfNotExists(Pemeriksa::class, 'nama', $pemeriksa);

        return redirect()->route('print')->with('id', $id);
    }

    public function cetak(String $id) {

        $id = session('id');

        $dpm = DB::table('k7')
        ->join('k7_srtjln', 'k7.id', '=', 'k7_srtjln.id,')
        ->join('user', 'k7_srtjln.id_user', '=', 'user.id_user')
        ->join('jenis_pekerjaan', 'jenis_pekerjaan.id_jenis_pekerjaan', '=', 'k7_srtjln.id_jns_pekerjaan')
        ->join('pb/pd', 'k7_srtjln.id_pb_pd', '=', 'pb/pd.id_pb_pd')
        ->join('ulp', 'k7_srtjln.id_ulp', '=', 'ulp.id_ulp')
        ->select(
            'k7.tgl_diminta',
            'k7.nomor_dpb',
            'k7.setuju',
            'k7.pemeriksa',
            'user.nama as nmu',
            'user.alamat as almt',
            'k7_srtjln.no_spk',
            'k7_srtjln.nm_pelanggan as np',
            'k7_srtjln.almt_pelanggan as almtp',
            'k7_srtjln.idpel',
            'k7_srtjln.trfdy_baru as tdbaru',
            'k7_srtjln.trfdy_lama as tdlama',
            'k7_srtjln.kepala_gudang as kpgdg',
            'k7_srtjln.penerima',
            'jenis_pekerjaan.pekerjaan as jpkj',
            'pb/pd.nama as nmpbd',
            'ulp.nama as nmulp',
            'ulp.kd_pos as kpos',
            )
        ->where('k7.id', '=', $id)
        ->get();

        $iddpbsrtjln = DB::table('k7')
        ->select('id')
        ->where('id', '=', $id);

        $lMaterial = DB::table('dftrmaterial_k7')
        ->select(
            'dftrmaterial_k7.jumlah',
            'dftrmaterial_k7.id',
            'material_k7.nama as nammat',
            'material_k7.normalisasi',
            'material_k7.satuan',
        )
        ->join('material_k7', 'dftrmaterial_k7.id_mtrl_k7', '=', 'material_k7.id')
        ->where('id', '=', $iddpbsrtjln)
        ->get();

        $dpbsrt = DB::table('k7_srtjln')
        ->select('id')
        ->where('id_srtjln', '=', $id)
        ->pluck('id');

        $jumlah = DB::table('dftrmaterial_k7')
        ->select('id')
        ->where('id', '=', $dpbsrt)
        ->count();

        $list = $jumlah+1;

        $jmlhMaterial = DB::table('dftrmaterial_k7')
        ->where('id', '=', $iddpbsrtjln)
        ->pluck('jumlah');

        $angkaKeHuruf = $this->angkaKeHuruf($jmlhMaterial);

        $material = [];

        for ($i=0; $i < count($jmlhMaterial); $i++) {
            $material[] = [
                'lMaterial' => $lMaterial[$i],
                'jumlah' => $angkaKeHuruf[$i]
            ];
        }

        return view('print', compact('dpm', 'material', 'jumlah', 'list'));
    }

    /**
     * Helper function untuk create record jika belum ada.
     */
    private function createIfNotExists($model, $field, $value) {

        $idUser = Auth::user()->id_user;

        if ($model == KepalaGudang::class || $model == Setuju::class) {
            if (!$model::where($field, $value)->exists()) {
                $model::create([$field => $value]);
            }
        }
        else if (!$model::where('id_user', $idUser)->exists() || !$model::where($field, $value)->exists()) {
            $model::create([$field => $value, 'id_user' => $idUser]);
        }
    }

    public function angkaKeHuruf($angka) {
        // Array untuk mendefinisikan angka 0-9 dalam bentuk teks
        foreach ($angka as $key) {

            $angkaHuruf = [
                '0' => 'Nol',
                '1' => 'Satu',
                '2' => 'Dua',
                '3' => 'Tiga',
                '4' => 'Empat',
                '5' => 'Lima',
                '6' => 'Enam',
                '7' => 'Tujuh',
                '8' => 'Delapan',
                '9' => 'Sembilan'
            ];

            // Konversi angka menjadi string agar bisa dipecah per digit
            $angkaStr = strval($key);

            // Inisialisasi array kosong untuk menampung hasil konversi
            $konversi = [];

            // Loop setiap digit dalam angka
            foreach (str_split($angkaStr) as $digit) {
                // Masukkan teks yang sesuai dengan digit ke dalam array hasil
                $konversi[] = $angkaHuruf[$digit];
            }

            // Gabungkan hasil menjadi string dengan spasi antar kata
            $hasil[] = implode(' ', $konversi);
        }

        return $hasil;
    }
}
