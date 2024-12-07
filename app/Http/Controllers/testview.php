<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class testview extends Controller
{
    public function index () {

        $lastSJ = DB::table('surat_jalan')
            ->selectRaw("nomor_suratjln, CAST(SUBSTRING_INDEX(nomor_suratjln, '/', 1) AS UNSIGNED) AS nosrtjln")
            ->orderBy('nosrtjln', 'DESC')
            ->limit(1)
            ->pluck('nosrtjln')
            ->first();
        $getNull = ($lastSJ == null) ? 0 : $lastSJ;
        preg_match('/^\d+/', $getNull, $matches);
        $lastAngka = $matches[0] + 1;
        $nomorSuratJalan = $lastAngka."/LOG.00.02/GD. ARIES/VI/".date("Y");        

        $id = 9;

        $sja = DB::table('surat_jalan AS sj')
        ->join('surat_jalan_admin AS sja', 'sja.id_suratjalan', '=', 'sj.id_surat_jalan')        
        ->select(
            'sj.nomor_polisi AS nopol',
            'sj.pengemudi',
            'sj.tgl_diterima',
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
            'material.nama',
            'material.normalisasi',
            'material.satuan',
            'dmsja.jumlah',
        )
        ->where('id_sja', '=', $idsjadmin)
        ->get();

        $jumlah = DB::table('daftar_material_sja AS dmsja')
        ->select('id_sja')
        ->where('id_sja', $idsjadmin)
        ->count();

        $list = $jumlah;

        // dd($list);

        return view('form_suratjalan_admin', compact('nomorSuratJalan', 'sja', 'dmsja', 'list'));
    }
}
