<?php

namespace App\Http\Controllers;
use App\Models\K7;
use App\Models\DpmSuratJalan;
use App\Models\SuratJalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
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
        ) ->orderByDesc('nomor_suratjln')
        ->get();

        $k7Ongoing = DB::table('k7')
        ->join('k7_srtjln', 'k7.id_k7srtjln', '=', 'k7_srtjln.id')
        ->join('surat_jalan', 'k7_srtjln.id_srtjln', '=', 'surat_jalan.id_surat_jalan')
        ->join('user', 'k7_srtjln.id_user', '=', 'user.id_user')
        ->whereNull('surat_jalan.pengemudi')
        ->select(
            'surat_jalan.id_surat_jalan as id_srtjln',
            'k7.tgl_diminta as tgl',
            'k7.nmr_k7 as nomor',
            'user.nama as vendor',
            'k7_srtjln.nm_pelanggan as pelanggan'
        )
        ->get();

        $k7 = DB::table('k7')
        ->join('k7_srtjln', 'k7.id_k7srtjln', '=', 'k7_srtjln.id')
        ->join('surat_jalan', 'k7_srtjln.id_srtjln', '=', 'surat_jalan.id_surat_jalan')
        ->join('user', 'k7_srtjln.id_user', '=', 'user.id_user')
        ->whereNotNull('nomor_polisi')
        ->select(
            'surat_jalan.id_surat_jalan as idsrt',
            'surat_jalan.nomor_suratjln as nosj',
            'surat_jalan.tgl_diterima as tgldicetak',
            'k7.nmr_k7 as nomor',
            'user.nama as vendor',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
        )
        ->orderByDesc('nomor_suratjln')
        ->get();

        return view('gudangbawah', compact('dpmOngoing', 'k7Ongoing', 'dpm' , 'k7'));
        // return view('gudangbawah', compact('dpm'));
    }

    

    function inputNopolDriver(Request $request) {

        $lastSJ = DB::table('surat_jalan')
        ->selectRaw("nomor_suratjln, CAST(SUBSTRING_INDEX(nomor_suratjln, '/', 1) AS UNSIGNED) AS nosrtjln")
        ->orderBy('nosrtjln', 'DESC')
        ->limit(1)
        ->pluck('nosrtjln')
        ->first();
        preg_match('/^\d+/', $lastSJ, $matches);
        $lastAngka = $matches[0] + 1;
        $nomorSuratJalan = $lastAngka."/LOG.00.02/GD. ARIES/VI/".date("Y");

        $request->validate([
            "nopol" => 'required',
            "pengemudi" => 'required',
        ]);

        SuratJalan::where('id_surat_jalan', $request->input('idsrtjln'))
        ->update([
            'nomor_suratjln' => $nomorSuratJalan,
            'nomor_polisi'  => trim ($request->input('nopol')),
            'pengemudi'     => trim ($request->input('pengemudi')),
            'tgl_diterima'  => date('Y-m-d H:i:s')
            ]);

        return redirect('gudangbawah');
    }

    public function show_k7(String $encryptedId): View {

        $id = Crypt::decrypt($encryptedId);

        $suratjalan = DB::table('k7_srtjln')
        ->select(
            'surat_jalan.nomor_suratjln as nosj',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
            'k7_srtjln.no_spk as nospk',
            'k7_srtjln.nm_pelanggan as nampel',
            'k7_srtjln.idpel as idpel',
            'k7_srtjln.almt_pelanggan as almtpel',
            'k7_srtjln.trfdy_lama as daylam',
            'k7_srtjln.trfdy_baru as daybar',
            'surat_jalan.tgl_diterima as tgldicetak',
            'k7.nmr_k7 as nok7',
            'k7_srtjln.penerima',
            'k7_srtjln.kepala_gudang',
            'user.nama as vendor',
        )
        ->join('surat_jalan', 'k7_srtjln.id_srtjln', '=', 'surat_jalan.id_surat_jalan')
        ->join('k7', 'k7_srtjln.id', '=', 'k7.id_k7srtjln')
        ->join('user', 'k7_srtjln.id_user', '=', 'user.id_user')
        ->join('jenis_pekerjaan', 'k7_srtjln.id_jenis_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->join('ulp', 'k7_srtjln.id_ulp', '=', 'ulp.id_ulp')
        ->join('pb/pd', 'k7_srtjln.id_pbpd', '=', '.id_pb_pd')
        ->where('id_surat_jalan', '=', $id)
        ->get();

        $idk7srtjln = DB::table('k7')
        ->select('id_k7srtjln')
        ->where('id_k7srtjln', '=', $id);

        $material = DB::table('dftrmaterial_k7')
        ->select(
            'dftrmaterial_k7.jumlah',
            'dftrmaterial_k7.id_k7srtjln',
            'material.nama as nammat',
            'material.normalisasi',
            'material.satuan',
        )
        ->join('material_bekas', 'dftrmaterial_k7.id', '=', 'material_bekas.id')
        ->where('dftrmaterial_k7.id_mtrl_k7', '=', $idk7srtjln)
        ->get();

        $k7srt = DB::table('k7_srtjln')
        ->select('id')
        ->where('id_srtjln', '=', $id)
        ->pluck('id');

        $jumlah = DB::table('dftrmaterial_k7')
        ->select('id_k7srtjln')
        ->where('id_k7srtjln', '=', $k7srt)
        ->count();

        $list = $jumlah+1;

        return view('suratjalank7', compact('suratjln', 'material', 'list'));
    }

    public function printk7(String $encryptedId): View {

        $id = Crypt::decrypt($encryptedId);

        $suratjalan = DB::table('k7_srtjln')
        ->select(
            'surat_jalan.nomor_suratjln as nosj',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
            'k7_srtjln.no_spk as nospk',
            'k7_srtjln.nm_pelanggan as nampel',
            'k7_srtjln.idpel as idpel',
            'k7_srtjln.almt_pelanggan as almtpel',
            'k7_srtjln.trfdy_lama as daylam',
            'k7_srtjln.trfdy_baru as daybar',
            'surat_jalan.tgl_diterima as tgldicetak',
            'k7.nmr_k7 as nok7',
            'k7_srtjln.penerima',
            'k7_srtjln.kepala_gudang',
            'user.nama as vendor',
        )
        ->join('surat_jalan', 'k7_srtjln.id_srtjln', '=', 'surat_jalan.id_surat_jalan')
        ->join('k7', 'k7_srtjln.id', '=', 'k7.id_k7srtjln')
        ->join('user', 'k7_srtjln.id_user', '=', 'user.id_user')
        ->join('jenis_pekerjaan', 'k7_srtjln.id_jenis_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->join('ulp', 'k7_srtjln.id_ulp', '=', 'ulp.id_ulp')
        ->join('pb/pd', 'k7_srtjln.id_pbpd', '=', '.id_pb_pd')
        ->where('id_surat_jalan', '=', $id)
        ->get();

        $idk7srtjln = DB::table('k7')
        ->select('id_k7srtjln')
        ->where('id_k7srtjln', '=', $id);

        $material = DB::table('dftrmaterial_k7')
        ->select(
            'dftrmaterial_k7.jumlah',
            'dftrmaterial_k7.id_k7srtjln',
            'material.nama as nammat',
            'material.normalisasi',
            'material.satuan',
        )
        ->join('material_bekas', 'dftrmaterial_k7.id', '=', 'material_bekas.id')
        ->where('dftrmaterial_k7.id_mtrl_k7', '=', $idk7srtjln)
        ->get();

        $k7srt = DB::table('k7_srtjln')
        ->select('id')
        ->where('id_srtjln', '=', $id)
        ->pluck('id');

        $jumlah = DB::table('dftrmaterial_k7')
        ->select('id_k7srtjln')
        ->where('id_k7srtjln', '=', $k7srt)
        ->count();

        $list = $jumlah+1;

        return view('suratjalank7', compact('suratjln', 'material', 'list'));
    }

    public function showSuratk7(Request $request) {
        $k7Ongoing = DB::table('k7')
        ->join('k7_srtjln', 'k7.id_k7srtjln', '=', 'k7_srtjln.id')
        ->join('surat_jalan', 'k7_srtjln.id_srtjln', '=', 'surat_jalan.id_surat_jalan')
        ->join('user', 'k7_srtjln.id_user', '=', 'user.id_user')
        ->whereNull('surat_jalan.pengemudi')
        ->select(
            'surat_jalan.id_surat_jalan as id_srtjln',
            'k7.tgl_diminta as tgl',
            'k7.nmr_k7 as nomor',
            'user.nama as vendor',
            'k7_srtjln.nm_pelanggan as pelanggan'
        )
        ->get();

        return response()->json($k7Ongoing);
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
            'daftar_material.jumlah',
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
            'daftar_material.jumlah',
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
