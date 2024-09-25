<?php

namespace App\Http\Controllers;

use App\Models\DpmSuratJalan;
use App\Models\SuratJalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GudangBawahController extends Controller
{
    function index() {

        $dpmOngoing = DB::table('daftar_permintaan_material')
        ->join('dpb_suratjalan', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('surat_jalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
        ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
        ->whereNull('surat_jalan.pengemudi')
        ->select(
            'surat_jalan.id_surat_jalan as id_srtjln',
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
            'surat_jalan.id_surat_jalan as idsrt',
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

    function inputNopolDriver(Request $request) {

        $request->validate([
            "nopol" => 'required',
            "pengemudi" => 'required',
        ]);

        SuratJalan::where('id_surat_jalan', $request->input('idsrtjln'))
        ->update([
            'nomor_polisi'  => trim ($request->input('nopol')),
            'pengemudi'     => trim ($request->input('pengemudi')),
            'tgl_diterima'  => date('Y-m-d H:i:s')
            ]);

        return redirect('gudangbawah');
    }

    public function show(String $id): View {

        $suratjln = DB::table('dpb_suratjalan')
        ->select(
            'surat_jalan.nomor_suratjln as nosj',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
            'dpb_suratjalan.no_spk as nospk',
            'dpb_suratjalan.nama_pelanggan as nampel',
            'dpb_suratjalan.idpel as idpel',
            'dpb_suratjalan.alamat_pelanggan as almtpel',
            'dpb_suratjalan.tarif_daya_lama as daylam',
            'dpb_suratjalan.tarif_daya_baru as daybar',
            'surat_jalan.tgl_diterima as tgldicetak',
            'dpb_suratjalan.penerima',
            'dpb_suratjalan.kepala_gudang',
            'daftar_permintaan_material.nomor_dpb as nodpb',
            'user.nama as vendor',
            'ulp.nama as ulp',
            'jenis_pekerjaan.pekerjaan as nmpkrjn',
            'daftar_material.jumlah',
            'daftar_material.id_dpb_suratjalan',
            'material.nama as nammat',
            'material.normalisasi',
            'material.satuan',
        )
        ->join('surat_jalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
        ->join('daftar_permintaan_material', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
        ->join('ulp', 'dpb_suratjalan.id_ulp', '=', 'ulp.id_ulp')
        ->join('jenis_pekerjaan', 'dpb_suratjalan.id_jenis_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->join('daftar_material', 'daftar_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('material', 'daftar_material.id_material', '=', 'material.id_material')
        ->where('id_surat_jalan', '=', $id)
        ->get();

        $material = DB::table('dpb_suratjalan')
        ->select(
            'surat_jalan.nomor_suratjln as nosj',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
            'dpb_suratjalan.no_spk as nospk',
            'dpb_suratjalan.nama_pelanggan as nampel',
            'dpb_suratjalan.idpel as idpel',
            'dpb_suratjalan.alamat_pelanggan as almtpel',
            'dpb_suratjalan.tarif_daya_lama as daylam',
            'dpb_suratjalan.tarif_daya_baru as daybar',
            'surat_jalan.tgl_diterima as tgldicetak',
            'dpb_suratjalan.penerima',
            'dpb_suratjalan.kepala_gudang',
            'daftar_permintaan_material.nomor_dpb as nodpb',
            'user.nama as vendor',
            'ulp.nama as ulp',
            'jenis_pekerjaan.pekerjaan as nmpkrjn',
            'daftar_material.jumlah',
            'daftar_material.id_dpb_suratjalan',
            'material.nama as nammat',
            'material.normalisasi',
            'material.satuan',
        )
        ->join('surat_jalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
        ->join('daftar_permintaan_material', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
        ->join('ulp', 'dpb_suratjalan.id_ulp', '=', 'ulp.id_ulp')
        ->join('jenis_pekerjaan', 'dpb_suratjalan.id_jenis_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->join('daftar_material', 'daftar_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('material', 'daftar_material.id_material', '=', 'material.id_material')
        ->where('id_surat_jalan', '=', $id)
        ->get();

        return view('form_suratjalan', compact('suratjln', 'material'));
    }
}
