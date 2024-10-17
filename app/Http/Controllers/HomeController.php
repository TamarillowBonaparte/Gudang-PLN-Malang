<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $dpbjumlah = DB::table('daftar_permintaan_material')->count('nomor_dpb');
        $suratJln = DB::table('surat_jalan')
        ->join('dpb_suratjalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
        ->join('daftar_permintaan_material as dpm', 'dpm.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
        ->select(
            'surat_jalan.nomor_suratjln as nsurat',
            'dpm.nomor_dpb as ndpb',
            'dpm.tgl_diminta as tgl',
            'user.nama as nmuser',
        )
        ->orderByDesc('tgl')
        // ->where('tgl', '')
        ->get();

        return view('home', compact('dpbjumlah', 'suratJln'));
    }
}
