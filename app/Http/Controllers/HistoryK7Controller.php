<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class HistoryK7Controller extends Controller
{

    public function index(){

        $idUser = Auth::user()->id_user;
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
        return view('historyk7',compact('suratk7'));
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
}
