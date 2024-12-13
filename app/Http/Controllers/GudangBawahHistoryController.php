<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DpmSuratJalan;
use App\Models\SuratJalan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\View\View;

class GudangBawahHistoryController extends Controller
{
    function index() {

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
        ->orderByDesc('nomor_suratjln')
        ->get();

        $k7 = DB::table('k7')
        ->join('k7_srtjln AS k7sj', 'k7.id_k7srtjln', '=', 'k7sj.id')
        ->join('surat_jalan AS sj', 'k7sj.id_srtjln', '=', 'sj.id_surat_jalan')
        ->join('user', 'k7sj.id_user', '=', 'user.id_user')
        ->whereNotNull('nomor_polisi')
        ->select(
            'sj.id_surat_jalan as idsrt',
            'sj.nomor_suratjln as nosj',
            'sj.tgl_diterima as tgldicetak',
            'sj.nomor_polisi',
            'sj.pengemudi',
            'k7.nmr_k7 as nomor',
            'user.nama as vendor',
        )
        ->orderByDesc('nomor_suratjln')
        ->get();

        $sjAdmin = DB::table('surat_jalan_admin AS sja')
        ->join('surat_jalan AS sj', 'sj.id_surat_jalan', '=', 'sja.id_suratjalan')
        ->join('daftar_material_sja AS dmsja', 'dmsja.id_sja', '=', 'sja.id')
        ->select(
            'sj.nomor_suratjln AS nsj',
            'sj.id_surat_jalan AS idsj',
            'sja.id',
            'sja.no_permintaan',
            'sja.kepada',
            'sja.alamat',
        )
        ->groupBy('sj.nomor_suratjln', 'sj.id_surat_jalan', 'sja.id', 'sja.no_permintaan', 'sja.kepada', 'sja.alamat')
        ->orderByDesc('sj.tgl_diterima')
        ->get();


        return view('gudangbawahhistory', compact('dpm', 'k7', 'sjAdmin'));
        // return view('gudangbawah', compact('dpm'));
    }

    public function show(String $encryptedId): View {

        $id = Crypt::decrypt($encryptedId);

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
        )
        ->join('surat_jalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
        ->join('daftar_permintaan_material', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
        ->join('ulp', 'dpb_suratjalan.id_ulp', '=', 'ulp.id_ulp')
        ->join('jenis_pekerjaan', 'dpb_suratjalan.id_jenis_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->where('id_surat_jalan', '=', $id)
        ->get();

        $iddpbsrtjln = DB::table('daftar_permintaan_material')
        ->select('id_dpb_suratjalan')
        ->where('id_dpb', '=', $id);

        $material = DB::table('daftar_material')
        ->select(
            'daftar_material.jumlah_diminta',
            'daftar_material.id_dpb_suratjalan',
            'material.nama as nammat',
            'material.normalisasi',
            'material.satuan',
        )
        ->join('material', 'daftar_material.id_material', '=', 'material.id_material')
        ->where('id_dpb_suratjalan', '=', $iddpbsrtjln)
        ->get();

        $dpbsrt = DB::table('dpb_suratjalan')
        ->select('id_dpb_suratjalan')
        ->where('id_suratjalan', '=', $id)
        ->pluck('id_dpb_suratjalan');

        $jumlah = DB::table('daftar_material')
        ->select('id_dpb_suratjalan')
        ->where('id_dpb_suratjalan', '=', $dpbsrt)
        ->count();

        $list = $jumlah+1;

        return view('form_suratjalan', compact('suratjln', 'material', 'list'));
    }

    public function print(String $encryptedId): View {

        $id = Crypt::decrypt($encryptedId);

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
        )
        ->join('surat_jalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
        ->join('daftar_permintaan_material', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
        ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
        ->join('ulp', 'dpb_suratjalan.id_ulp', '=', 'ulp.id_ulp')
        ->join('jenis_pekerjaan', 'dpb_suratjalan.id_jenis_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->where('id_surat_jalan', '=', $id)
        ->get();

        $iddpbsrtjln = DB::table('daftar_permintaan_material')
        ->select('id_dpb_suratjalan')
        ->where('id_dpb', '=', $id);

        $material = DB::table('daftar_material')
        ->select(
            'daftar_material.jumlah_diminta',
            'daftar_material.id_dpb_suratjalan',
            'material.nama as nammat',
            'material.normalisasi',
            'material.satuan',
        )
        ->join('material', 'daftar_material.id_material', '=', 'material.id_material')
        ->where('id_dpb_suratjalan', '=', $iddpbsrtjln)
        ->get();

        $dpbsrt = DB::table('dpb_suratjalan')
        ->select('id_dpb_suratjalan')
        ->where('id_suratjalan', '=', $id)
        ->pluck('id_dpb_suratjalan');

        $jumlah = DB::table('daftar_material')
        ->select('id_dpb_suratjalan')
        ->where('id_dpb_suratjalan', '=', $dpbsrt)
        ->count();

        $list = $jumlah+1;

        return view('form_suratjalan', compact('suratjln', 'material', 'list'));
    }

    public function showSurat(Request $request) {
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

        return response()->json($dpmOngoing);
    }
}
