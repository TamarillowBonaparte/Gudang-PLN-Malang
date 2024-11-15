<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratJalanController extends Controller
{
    public function index()
    {

        $suratjalan = DB::table('daftar_permintaan_material')
        ->join('dpb_suratjalan', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('daftar_permintaan_material AS dpm', 'dpm.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('surat_jalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
        ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
        ->whereNotNull('nomor_polisi')
        ->select(
            'surat_jalan.id_surat_jalan as idsrt',
            'surat_jalan.nomor_suratjln as nosj',
            'surat_jalan.tgl_diterima as tgldicetak',
            'daftar_permintaan_material.nomor_dpb as nomor',
            'user.nama as vendor',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
            'dpm.nomor_dpb'
        )
        ->orderByDesc('nomor_suratjln')
        ->get();

        return view('surat_jalan', compact('suratjalan'));
    }

    public function store() {
        
    }
}
