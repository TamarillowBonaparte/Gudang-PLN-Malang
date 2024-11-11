<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;


class HistoryDPMController extends Controller
{
    public function index()
    {
        $idUser = Auth::user()->id_user;


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

        return view('historyDPM', compact('suratDpm'));
    }
}
