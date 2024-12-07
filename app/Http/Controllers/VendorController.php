<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Barryvdh\DomPDF\Facade\Pdf;

class VendorController extends Controller
{
    public function index()
    {
        $idUser = Auth::user()->id_user;
        $dpbjumlah = DB::table('dpb_suratjalan')->where('dpb_suratjalan.id_user', '=', $idUser)->count();
        $k7jumlah = DB::table('k7_srtjln')->where('k7_srtjln.id_user',"=", $idUser)->count();
        $k3jumlah = DB::table('k3')->where('k3.id_user',"=",$idUser)->count();


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
        ->where('dpb_suratjalan.id_user', '=', $idUser)
        ->get();


        $suratk7 = DB::table('k7')
        ->join('k7_srtjln', 'k7.id_k7srtjln', '=', 'k7_srtjln.id')
        ->join('surat_jalan', 'k7_srtjln.id_srtjln', '=', 'surat_jalan.id_surat_jalan')
        ->select(
            'k7.*',
            'k7.id as idk7',
            'k7_srtjln.*',
            'surat_jalan.id_surat_jalan'
            )
        ->where('k7_srtjln.id_user', '=', $idUser)
        ->get();

        $user = Auth::user();
        $suratk3 = DB::table('k3')
        ->select(
            'id AS idk3',
            'nmr_k3',
            'tgl_diminta',
            'nm_pelanggan',
        )
        ->where('id_user', '=', $user->id_user)
        ->get();

        $material = DB::table('material')
        ->select(
            'id_material AS id',
            'nama AS nm_material',
            'normalisasi',
            'jumlah_sap',
        )
        ->get();



        return view('vendor', compact('suratDpm','dpbjumlah', 'k7jumlah','k3jumlah','suratk7','suratk3', 'material'));
    }

    public function show(String $encryptedId, String $srtJlnEncryptdId) {

        $id = Crypt::decryptString($encryptedId);
        $srtJlnId = Crypt::decryptString($srtJlnEncryptdId);

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
        ->where('id_suratjalan', '=', $srtJlnId)
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

        return view('detailsurat', compact('dpm', 'material', 'list'));
    }

    public function showK7(String $encryptedId, String $srtJlnEncryptdId) {

        $id = Crypt::decryptString($encryptedId);
        $srtJlnId = Crypt::decryptString($srtJlnEncryptdId);

        $dpm = DB::table('k7')
        ->join('k7_srtjln', 'k7.id_k7srtjln', '=', 'k7_srtjln.id')
        ->join('user', 'k7_srtjln.id_user', '=', 'user.id_user')
        ->join('jenis_pekerjaan', 'jenis_pekerjaan.id_jenis_pekerjaan', '=', 'k7_srtjln.id_jns_pekerjaan')
        ->join('pb/pd', 'k7_srtjln.id_pbpd', '=', 'pb/pd.id_pb_pd')
        ->join('ulp', 'k7_srtjln.id_ulp', '=', 'ulp.id_ulp')
        ->select(
            'k7.tgl_diminta',
            'k7.nmr_k7',
            'k7.setuju',
            'k7.pemeriksa',
            'k7.merk_material',
            'k7.noseri_material as nosrmat',
            'k7.keterangan',
            'user.nama as nmu',
            'user.alamat as almt',
            'k7_srtjln.nospk',
            'k7_srtjln.nm_pelanggan as np',
            'k7_srtjln.almt_pelanggan as almtp',
            'k7_srtjln.idpel',
            'k7_srtjln.trfdy_baru as tdbaru',
            'k7_srtjln.trfdy_lama as tdlama',
            'k7_srtjln.kpl_gudang as kpgdg',
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
            'material_bekas.nama as nammat',
            'material_bekas.normalisasi',
            'material_bekas.satuan',
        )
        ->join('material_bekas', 'dftrmaterial_k7.id_mtrl_k7', '=', 'material_bekas.id')
        ->where('dftrmaterial_k7.id', '=', $iddpbsrtjln)
        ->get();

        $dpbsrt = DB::table('k7_srtjln')
        ->select('id')
        ->where('id_srtjln', '=', $srtJlnId)
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

        return view('detailsuratk7', compact('dpm', 'material', 'list'));
    }

    public function cetak(String $encryptedId, String $srtJlnEncryptdId) {

        $id = Crypt::decryptString($encryptedId);
        $srtJlnId = Crypt::decryptString($srtJlnEncryptdId);

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

        $nmrDPB = DB::table('daftar_permintaan_material')
        ->select('nomor_dpb')
        ->where('daftar_permintaan_material.id_dpb', '=', $id)
        ->pluck('nomor_dpb');

        $nmrDPB = trim(str_replace(['[', ']', '_'], '', $nmrDPB));

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
        ->where('id_suratjalan', '=', $srtJlnId)
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
        $pdf = Pdf::loadView('print', compact('dpm', 'material', 'jumlah', 'list'));

        // Mengirimkan file PDF untuk didownload
        return $pdf->download('DaftarPermintaanMaterial' . $nmrDPB . '.pdf');

        // return view('print', compact('dpm', 'material', 'jumlah', 'list'));
    }

    public function showK3(String $encryptedId)
    {
        // Dekripsi ID untuk keamanan
        $id = Crypt::decryptString($encryptedId);

        // Query untuk mendapatkan data K3 dengan penggabungan tabel yang sesuai
        $k3 = DB::table('k3')
            ->join('kondisi_material', 'kondisi_material.id', '=', 'k3.id_kondisi')
            ->join('gudang', 'gudang.id', '=', 'k3.id_gdngpengembalian')
            ->join('user', 'user.id_user', '=', 'k3.id_user')
            ->select(
                'k3.nmr_k3 as nmrk3',
                'k3.tgl_diminta',
                'k3.setuju',
                'k3.pemeriksa',
                'k3.kpl_gdng',
                'k3.pengembali',
                'k3.nospk',
                'k3.jnspekerjaan',
                'k3.idpel',
                'k3.nm_pelanggan',
                'k3.almt_pelanggan',
                'k3.nmr_seri',
                'k3.nodpb_buktipotong',
                'k3.lokasi_pengembalian',
                'k3.keterangan',
                'kondisi_material.kondisi',
                'gudang.nama_gudang as namaGudang',
                'user.nama as namaUser',
                'user.alamat as alamatUser'
            )
            ->where('k3.id', '=', $id)
            ->first();  // Mengambil hanya satu data

        // Jika data tidak ditemukan, return error
        if (!$k3) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Mengembalikan tampilan dengan data yang diperlukan
        return view('detailsuratk3', compact('k3'));
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
