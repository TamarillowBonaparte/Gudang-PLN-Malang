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
use Illuminate\Support\Facades\Crypt;

class DpmController extends Controller {

    public function index () {

        $user = Auth::user();
        $ulps = Ulp::all();
        $kepalaGdng = KepalaGudang::all();
        $setuju = Setuju::all();
        $pemeriksa = Pemeriksa::where('id_user', $user->id_user)->get();
        $penerima = PengambilPenerima::where('id_user', $user->id_user)->get();

        $material = DB::table('material')
        ->select(
            'id_material AS id',
            'nama AS nm_material',
            'normalisasi',
            'jumlah_sap',
        )
        ->get();



        $suratDpm = DB::table('daftar_permintaan_material')
        ->join('dpb_suratjalan', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('ulp', 'dpb_suratjalan.id_ulp', '=', 'ulp.id_ulp')
        ->join('jenis_pekerjaan', 'dpb_suratjalan.id_jenis_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->join('surat_jalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
        ->select(
            'daftar_permintaan_material.*',
            'dpb_suratjalan.*',
            'jenis_pekerjaan.pekerjaan as jnspkrjaan',
            'ulp.nama as ulpnama',
            'surat_jalan.id_surat_jalan as idsrtjln'
            )
        ->orderByDesc('daftar_permintaan_material.nomor_dpb')
        ->where('dpb_suratjalan.id_user', '=', $user->id_user)
        ->get();

        return view('dpm', compact('ulps', 'kepalaGdng', 'setuju', 'pemeriksa', 'penerima', 'suratDpm','material'));
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
        $noDpm = DB::table('daftar_permintaan_material')
        ->orderBy('nomor_dpb', 'desc')
        ->first();
        $nomorDpbString = $noDpm ? ($noDpm->nomor_dpb ?? 0) : 0;
        $parts = explode('-', $nomorDpbString);
        $lastPart = end($parts); // Mengambil bagian terakhir

        if ($lastPart !== null) {
            // Menghapus angka nol di depan
            $filteredPart = (int)ltrim($lastPart, '0');
        }
        $lastDpmNum = $filteredPart + 1;
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
        $dpmSuratJalan = DpmSuratJalan::create([
            'id_suratjalan'         => $lastSurJalId,
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
            'merk_material'         => $merkmat != null ? $merkmat : null,
            'id_user'               => $idUser
        ]);

        $lastInsertedId = $dpmSuratJalan->id_dpb_suratjalan;

        // Looping untuk insert daftar material dan update stok
        foreach ($request->input('idmaterial') as $index => $idMaterial) {
            $banyakDiminta = $request->input('banyakdiminta')[$index];

            DaftarMaterial::create([
                'id_dpb_suratjalan' => $lastInsertedId,
                'id_material'       => $idMaterial,
                'jumlah_diminta'    => $banyakDiminta,
                'jumlah_diberi'     => null,
                'tgl_keluar'        => date('Y-m-d')
            ]);
        }

        $setuju = strtoupper($request->input('setuju'));
        $pemeriksa = strtoupper($request->input('pemeriksa'));

        // Insert Dpm
        $dPM = Dpm::create([
            'nomor_dpb'         => $nomorDPB,
            'id_dpb_suratjalan' => $lastInsertedId,
            'tgl_diminta'       => date('Y-m-d'),
            'setuju'            => $setuju,
            'pemeriksa'         => $pemeriksa,
            'id_jnssurat'       => 1
        ]);

        $id = $dPM->id_dpb;

        // Proses penyimpanan data "setuju" dan "pemeriksa" jika belum ada di database
        $this->createIfNotExists(Setuju::class, 'nama', $setuju);
        $this->createIfNotExists(Pemeriksa::class, 'nama', $pemeriksa);

        return redirect()->route('print', ['id' => Crypt::encryptString($id), 'srtJlnId' => Crypt::encryptString($lastSurJalId)]);
    }

    public function cetak(String $id) {

        $id = session('id');

        $dpm = DB::table('daftar_permintaan_material')
        ->join('dpb_suratjalan', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
        ->join('jenis_pekerjaan', 'jenis_pekerjaan.id_jenis_pekerjaan', '=', 'dpb_suratjalan.id_jenis_pekerjaan')
        ->join('pb/pd', 'dpb_suratjalan.id_pb_pd', '=', 'pb/pd.id_pb_pd')
        ->join('ulp', 'dpb_suratjalan.id_ulp', '=', 'ulp.id_ulp')
        ->select(
            'daftar_permintaan_material.tgl_diminta',
            'daftar_permintaan_material.nomor_dpb',
            'daftar_permintaan_material.setuju',
            'daftar_permintaan_material.pemeriksa',
            'user.nama as nmu',
            'user.alamat as almtu',
            'dpb_suratjalan.merk_material',
            'dpb_suratjalan.no_spk',
            'dpb_suratjalan.nama_pelanggan as np',
            'dpb_suratjalan.alamat_pelanggan as almtp',
            'dpb_suratjalan.idpel',
            'dpb_suratjalan.tarif_daya_baru as tdbaru',
            'dpb_suratjalan.tarif_daya_lama as tdlama',
            'dpb_suratjalan.kepala_gudang as kpgdg',
            'dpb_suratjalan.penerima',
            'jenis_pekerjaan.pekerjaan as jpkj',
            'pb/pd.nama as nmpbd',
            'ulp.nama as nmulp',
            'ulp.kd_pos as kpos',
            )
        ->where('daftar_permintaan_material.id_dpb', '=', $id)
        ->get();

        $iddpbsrtjln = DB::table('daftar_permintaan_material')
        ->select('id_dpb_suratjalan')
        ->where('id_dpb', '=', $id);

        $lMaterial = DB::table('daftar_material')
        ->select(
            'daftar_material.jumlah_diminta',
            'daftar_material.id_dpb_suratjalan',
            'material.nama as nammat',
            'material.normalisasi',
            'material.satuan',
        )
        ->join('material', 'daftar_material.id_material', '=', 'material.id_material')
        ->where('id_dpb_suratjalan', '=', $iddpbsrtjln)
        ->get();

        $dpbsrt = DB::table('dpb_suratjalan')
        ->select('id_dpb_suratjalan')
        ->where('id_suratjalan', '=', $id)
        ->pluck('id_dpb_suratjalan');

        $jumlah = DB::table('daftar_material')
        ->select('id_dpb_suratjalan')
        ->where('id_dpb_suratjalan', '=', $dpbsrt)
        ->count();

        $list = $jumlah+1;

        $jmlhMaterial = DB::table('daftar_material')
        ->where('id_dpb_suratjalan', '=', $iddpbsrtjln)
        ->pluck('jumlah_diminta');

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
