<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

        $dpbjumlah = DB::table('daftar_permintaan_material')->count('nomor_dpb');
        $k7jumlah = DB::table('k7')->count('nmr_k7');
        $k3jumlah = DB::table('k3')->count('nmr_k3');
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

        $materialKeluar = DB::table('daftar_material')
        ->join('material', 'daftar_material.id_material', '=', 'material.id_material')
        ->select(
            'daftar_material.jumlah',
            'daftar_material.tgl_keluar',
            'material.nama'
        )
        ->orderByDesc('tgl_keluar')
        ->get();

        $materialPerBagian = DB::table('material')
        ->select('nama', DB::raw('COUNT(*) as jumlah'))
        ->groupBy('nama')
        ->get();
    
    // Query untuk total material
    $totalMaterial = DB::table('material')->count();

    // Query untuk mendapatkan statistik material
    $materialStats = [
        'total' => $totalMaterial,
        'perBagian' => $materialPerBagian
    ];

    return view('home', compact(
        'dpbjumlah', 
        'suratJln', 
        'materialKeluar', 
        'k7jumlah', 
        'k3jumlah',
        'materialStats'
    ));

    }
}
