<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testview extends Controller
{
    public function index () {

        $id = 6;

        $sja = DB::table('surat_jalan AS sj')
        ->join('surat_jalan_admin AS sja', 'sja.id_suratjalan', '=', 'sj.id_surat_jalan')        
        ->select(
            'sj.id_surat_jalan AS idsj',
            'sj.nomor_polisi AS nopol',
            'sj.pengemudi',
            'sj.tgl_diterima',
            'sj.nomor_suratjln AS nsj',
            'sja.id',   
            'sja.kepada',
            'sja.alamat',
            'sja.no_permintaan AS noperm',
            'sja.penerima',
            'sja.yang_menyerahkan AS ygMenyerhkn',
            'sja.keterangan',
        )
        ->where('sj.id_surat_jalan', $id)
        ->get();

        $idsjadmin = DB::table('surat_jalan_admin')
        ->select('id')
        ->where('id_suratjalan', '=', $id);

        $dmsja = DB::table('daftar_material_sja AS dmsja')
        ->join('material', 'dmsja.id_material', '=', 'material.id_material')
        ->select(
            'material.id_material',
            'material.nama',
            'material.normalisasi',
            'material.satuan',
            'dmsja.jumlah_diminta',
            'dmsja.jumlah_diberi',
        )
        ->where('id_sja', '=', $idsjadmin)
        ->get();

        $jumlah = DB::table('daftar_material_sja AS dmsja')
        ->select('id_sja')
        ->where('id_sja', $idsjadmin)
        ->count();

        $list = $jumlah;

        // Riwayat edit

        $riwayat = DB::table('riwayat_edit AS rd')
        ->join('material', 'material.id_material', '=', 'rd.id_material')
        ->select(
            'rd.tgl_diubah',
            'rd.jumlah_sebelumnya',
            'rd.jumlah_ditambah',
            'material.nama',
        )
        ->where('rd.id_suratjalan', $id)
        ->get();

        return view('testview', compact('sja', 'dmsja', 'list', 'riwayat'));
    }
}
