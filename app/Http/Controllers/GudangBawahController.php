<?php

namespace App\Http\Controllers;

use App\Models\DpmSuratJalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GudangBawahController extends Controller
{
    function index() {

        $dpmOngoing = DB::table('daftar_permintaan_material')
        ->join('dpb_suratjalan', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('surat_jalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
        ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
        ->select(
            'daftar_permintaan_material.tgl_diminta as tgl',
            'daftar_permintaan_material.nomor_dpb as nomor',
            'user.nama as vendor',
            'dpb_suratjalan.nama_pelanggan as pelanggan'
        )
        ->get();

        $dpm = DB::table('daftar_permintaan_material')
        ->join('dpb_suratjalan', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('surat_jalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
        ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
        ->whereNotNull('nomor_polisi')
        ->select(
            'surat_jalan.nomor_suratjln as nosj',
            'surat_jalan.tgl_diterima as tgldicetak',
            'daftar_permintaan_material.nomor_dpb as nomor',
            'user.nama as vendor',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
        )
        ->get();

        return view('gudangbawah', compact('dpmOngoing', 'dpm'));
    }
}
