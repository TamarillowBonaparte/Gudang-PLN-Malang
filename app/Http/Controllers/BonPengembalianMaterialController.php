<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
class BonPengembalianMaterialController extends Controller
{
    public function index(){
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
        return view('bonpengembalianmaterial',compact('suratk3'));
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
}
