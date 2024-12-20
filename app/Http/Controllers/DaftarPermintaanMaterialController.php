<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class DaftarPermintaanMaterialController extends Controller
{
    public function index()
    {
        $dpb = DB::table('daftar_permintaan_material as dpm')
        ->join('dpb_suratjalan as dsj', 'dpm.id_dpb_suratjalan', '=', 'dsj.id_dpb_suratjalan')
        ->join('surat_jalan as sj', 'sj.id_surat_jalan', '=', 'dsj.id_suratjalan')
        ->join('ulp', 'dsj.id_ulp', '=', 'ulp.id_ulp')
        ->join('user', 'dsj.id_user', '=', 'user.id_user')
        ->select(
            'sj.id_surat_jalan as idsj',
            'dpm.id_dpb as id',
            'dpm.tgl_diminta as tgl',
            'dpm.nomor_dpb as ndpb',
            'dsj.nama_pelanggan as nmpel',
            'user.nama as nmu',
            'ulp.nama as ulpnm'
            )
        ->orderByDesc('ndpb')
        ->get();
        
        return view('daftarpermintaanmaterial', compact('dpb'));
    }

    public function show(String $encryptedId) {

        $id = Crypt::decryptString($encryptedId);

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
        ->where('id_dpb', '=', $id)
        ->pluck('id_dpb_suratjalan');

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

        $idsj = DB::table('dpb_suratjalan')
        ->where('id_dpb_suratjalan', $iddpbsrtjln)
        ->pluck('id_suratjalan');
    
        $jumlah = DB::table('daftar_material')
        ->select('id_dpb_suratjalan')
        ->where('id_dpb_suratjalan', '=', $iddpbsrtjln)
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

        return view('detailsurat', compact('dpm', 'material', 'list'));
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
