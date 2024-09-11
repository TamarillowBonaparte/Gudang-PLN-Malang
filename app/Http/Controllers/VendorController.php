<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function index()
    {
        $suratDpm = DB::table('daftar_permintaan_material')
        ->join('dpb_suratjalan', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('ulp', 'dpb_suratjalan.id_ulp', '=', 'ulp.id_ulp')
        ->join('jenis_pekerjaan', 'dpb_suratjalan.id_jenis_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->select(
            'daftar_permintaan_material.*',
            'dpb_suratjalan.*',
            'jenis_pekerjaan.pekerjaan as jnspkrjaan',
            'ulp.nama as ulpnama'
            )
        ->get();

        return view ('vendor', compact('suratDpm'));
    }
}
