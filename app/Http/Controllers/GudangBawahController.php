<?php

namespace App\Http\Controllers;

use App\Models\DaftarMaterial;
use App\Models\DaftarMaterialSJA;
use App\Models\DpmSuratJalan;
use App\Models\RiwayatEdit;
use App\Models\SuratJalan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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
            'dpb_suratjalan.nama_pelanggan as pelanggan',
        )
        ->orderByDesc('tgl')
        ->get();

        $k7Ongoing = DB::table('k7')
        ->join('k7_srtjln AS k7sj', 'k7sj.id', '=', 'k7.id_k7srtjln')
        ->join('surat_jalan', 'k7sj.id_srtjln', '=', 'surat_jalan.id_surat_jalan')
        ->join('user', 'k7sj.id_user', '=', 'user.id_user')
        ->whereNull('surat_jalan.pengemudi')
        ->select(
            'surat_jalan.id_surat_jalan as id_srtjln',
            'k7.tgl_diminta as tgl',
            'k7.nmr_k7',
            'user.nama as vendor',
            'k7sj.nm_pelanggan as pelanggan',
        )
        ->orderByDesc('tgl')
        ->get();        

        // $dpm = DB::table('daftar_permintaan_material')
            // ->join('dpb_suratjalan', 'daftar_permintaan_material.id_dpb_suratjalan', '=', 'dpb_suratjalan.id_dpb_suratjalan')
            // ->join('surat_jalan', 'dpb_suratjalan.id_suratjalan', '=', 'surat_jalan.id_surat_jalan')
            // ->join('user', 'dpb_suratjalan.id_user', '=', 'user.id_user')
            // ->whereNotNull('nomor_polisi')
            // ->select(
            //     'surat_jalan.id_surat_jalan as idsrt',
            //     'surat_jalan.nomor_suratjln as nosj',
            //     'surat_jalan.tgl_diterima as tgldicetak',
            //     'daftar_permintaan_material.nomor_dpb as nomor',
            //     'user.nama as vendor',
            //     'surat_jalan.nomor_polisi',
            //     'surat_jalan.pengemudi',
            // )
            // ->orderByDesc('nomor_suratjln')
        // ->get();

        return view('gudangbawah', compact('dpmOngoing', 'k7Ongoing'));
        // return view('gudangbawah', compact('dpm'));
    }

    public function editDataSurat(String $encryptedId) {

        $id = Crypt::decryptString($encryptedId);

        // dd($id);
        
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
        
        $suratjln = DB::table('dpb_suratjalan')
        ->select(
            'surat_jalan.nomor_suratjln as nosj',
            'surat_jalan.id_surat_jalan AS idsrtjl',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
            'surat_jalan.tgl_diterima as tgldicetak',
            'dpb_suratjalan.id_dpb_suratjalan',
            'dpb_suratjalan.no_spk as nospk',
            'dpb_suratjalan.nama_pelanggan as nampel',
            'dpb_suratjalan.idpel as idpel',
            'dpb_suratjalan.alamat_pelanggan as almtpel',
            'dpb_suratjalan.tarif_daya_lama as daylam',
            'dpb_suratjalan.tarif_daya_baru as daybar',            
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

        $iddpbsrtjln = DB::table('dpb_suratjalan')
        ->select(
            'id_dpb_suratjalan'
        )
        ->where('id_suratjalan', '=', $id);

        $material = DB::table('daftar_material')
        ->join('material', 'daftar_material.id_material', '=', 'material.id_material')
        ->select(
            'daftar_material.jumlah_diminta',
            'daftar_material.jumlah_diberi',
            'daftar_material.id_material',
            'daftar_material.id_dpb_suratjalan',
            'material.nama as nammat',
            'material.normalisasi',
            'material.satuan',
        )
        ->where('daftar_material.id_dpb_suratjalan', '=', $iddpbsrtjln)
        ->get();

        // dd($iddpbsrtjln);

        $dpbsrt = DB::table('dpb_suratjalan')
        ->select('id_dpb_suratjalan')
        ->where('id_suratjalan', '=', $id)
        ->pluck('id_dpb_suratjalan');

        $jumlah = DB::table('daftar_material')
        ->select('id_dpb_suratjalan')
        ->where('id_dpb_suratjalan', '=', $dpbsrt)
        ->count();

        $list = $jumlah+1;

        return view('form_suratjalan_edit', compact('suratjln', 'material', 'list', 'nomorSuratJalan'));
    }

    public function storeDataSurat(Request $request) {

        $idsrtjl = $request->input('idsrtjl');

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

        foreach ($request->input('jumlahdiberi') as $key => $value) {
            DB::table('daftar_material')
            ->where('id_dpb_suratjalan', $request->input('iddpbsrtjln'))
            ->where('id_material', $request->input('idmat')[$key])
            ->update([
                'jumlah_diberi' => ($value == "TA") ? null : $value
            ]);

            DB::table('material')
            ->where('id_material', $request->input('idmat')[$key])
            ->decrement('jumlah_sap', ($value == "TA") ? 0 : $value);
        }

        SuratJalan::where('id_surat_jalan', $idsrtjl)
        ->update([
            'nomor_suratjln'    => $nomorSuratJalan,
            'nomor_polisi'      => trim ($request->input('nopol')),
            'pengemudi'         => trim ($request->input('pengemudi')),
            'tgl_diterima'      => date('Y-m-d H:i:s')
            ]);

        foreach ($request->input('jumlahdiberi') as $key => $value) {
            $idre = DB::table('riwayat_edit')
            ->where('id_suratjalan', $request->input('idsrtjl'))
            ->where('id_material', $request->input('idmat')[$key])
            ->orderByDesc('id')
            ->pluck('jumlah_ditambah')
            ->first();

            RiwayatEdit::create([
                'id_suratjalan' => $request->input('idsrtjl'),
                'id_material' => $request->input('idmat')[$key],
                'jumlah_sebelumnya' => ($idre == null) ? null : $idre,
                'jumlah_ditambah' => ($value == "TA") ? null : $value,
                'tgl_diubah' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->route('printsj', ['id' => Crypt::encrypt($idsrtjl)]);
    }

    public function editDataSuratK7(String $encryptedId) {

        $id = Crypt::decryptString($encryptedId);

        // dd($id);
        
        $lastSJ = DB::table('surat_jalan')
            ->selectRaw(" CAST(SUBSTRING_INDEX(nomor_suratjln, '/', 1) AS UNSIGNED) AS nosrtjln")
            ->orderByDesc('nosrtjln')
            ->limit(1)
            ->value('nosrtjln');
        $getNull = ($lastSJ == null) ? 0 : $lastSJ;
        preg_match('/^\d+/', $getNull, $matches);
        $lastAngka = $matches[0] + 1;
        $nomorSuratJalan = $lastAngka."/LOG.00.02/GD. ARIES/VI/".date("Y");
        
        $suratjln = DB::table('k7_srtjln AS k7sj')
        ->select(
            'surat_jalan.nomor_suratjln AS nosj',
            'surat_jalan.id_surat_jalan AS idsrtjl',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
            'surat_jalan.tgl_diterima AS tgldicetak',
            'k7sj.id',
            'k7sj.nospk',
            'k7sj.nm_pelanggan AS nampel',
            'k7sj.idpel',
            'k7sj.almt_pelanggan AS almtpel',
            'k7sj.trfdy_lama AS daylam',
            'k7sj.trfdy_baru AS daybar',
            'k7sj.penerima',
            'k7sj.kpl_gudang AS kplg',
            'k7.nmr_k7 AS nomor',
            'user.nama AS vendor',
            'ulp.nama AS ulp',
            'jenis_pekerjaan.pekerjaan AS nmpkrjn'
        )
        ->join('surat_jalan', 'k7sj.id_srtjln', '=', 'surat_jalan.id_surat_jalan')
        ->join('k7', 'k7.id_k7srtjln', '=', 'k7sj.id')
        ->join('user', 'k7sj.id_user', '=', 'user.id_user')
        ->join('ulp', 'k7sj.id_ulp', '=', 'ulp.id_ulp')
        ->join('jenis_pekerjaan', 'k7sj.id_jns_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->where('surat_jalan.id_surat_jalan', $id)
        ->get();

        $idk7sj = DB::table('k7_srtjln')
        ->select(
            'id'
        )
        ->where('id_srtjln', '=', $id);

        $material = DB::table('dftrmaterial_k7 AS dmk7')
        ->join('material_bekas AS mb', 'dmk7.id_mtrl_k7', '=', 'mb.id')
        ->select(
            'dmk7.jumlah_diminta',
            'dmk7.jumlah_diberi',
            'dmk7.id_mtrl_k7',
            'dmk7.id_k7srtjln',
            'mb.nama as nammat',
            'mb.normalisasi',
            'mb.satuan',
        )
        ->where('dmk7.id_k7srtjln', '=', $idk7sj)
        ->get();

        $dpbsrt = DB::table('k7_srtjln AS k7sj')
        ->select('id')
        ->where('id_srtjln', '=', $id)
        ->pluck('id');

        $jumlah = DB::table('dftrmaterial_k7')
        ->select('id_k7srtjln')
        ->where('id_k7srtjln', '=', $dpbsrt)
        ->count();

        $list = $jumlah+1;

        return view('form_suratjalan_k7_edit', compact('suratjln', 'material', 'list', 'nomorSuratJalan'));
    }

    public function storeDataSuratK7(Request $request) {

        $idsrtjl = $request->input('idsrtjl');

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

        foreach ($request->input('jumlahdiberi') as $key => $value) {
            DB::table('dftrmaterial_k7')
            ->where('id_k7srtjln', $request->input('idk7sj'))
            ->where('id_mtrl_k7', $request->input('idmat')[$key])
            ->update([
                'jumlah_diberi' => ($value == "TA") ? null : $value
            ]);

            DB::table('material_bekas')
            ->where('id', $request->input('idmat')[$key])
            ->decrement('jumlah_sap', ($value == "TA") ? 0 : $value);
        }

        SuratJalan::where('id_surat_jalan', $idsrtjl)
        ->update([
            'nomor_suratjln'    => $nomorSuratJalan,
            'nomor_polisi'      => trim ($request->input('nopol')),
            'pengemudi'         => trim ($request->input('pengemudi')),
            'tgl_diterima'      => date('Y-m-d H:i:s')
            ]);

        foreach ($request->input('jumlahdiberi') as $key => $value) {
            $idre = DB::table('riwayat_edit')
            ->where('id_suratjalan', $request->input('idsrtjl'))
            ->where('id_material', $request->input('idmat')[$key])
            ->orderByDesc('id')
            ->pluck('jumlah_ditambah')
            ->first();

            $jumlahsebelumnya = DB::table('riwayat_edit')
            ->where('id_suratjalan', $request->input('idsrtjl'))
            ->pluck('jumlah_ditambah');

            if ($jumlahsebelumnya != $value) {
                RiwayatEdit::create([
                    'id_suratjalan' => $request->input('idsrtjl'),
                    'id_material' => $request->input('idmat')[$key],
                    'jumlah_sebelumnya' => ($idre == null) ? null : $idre,
                    'jumlah_ditambah' => ($value == "TA") ? null : $value,
                    'tgl_diubah' => date('Y-m-d H:i:s'),
                ]);
            }                        
        }

        return redirect()->route('printsjk7', ['id' => Crypt::encrypt($idsrtjl)]);
    }

    public function editDataSuratAdmin(String $encryptedId) {        

        $id = Crypt::decryptString($encryptedId);

        $sja = DB::table('surat_jalan AS sj')
        ->join('surat_jalan_admin AS sja', 'sja.id_suratjalan', '=', 'sj.id_surat_jalan')        
        ->select(
            'sj.id_surat_jalan AS idsj',
            'sj.nomor_polisi AS nopol',
            'sj.pengemudi',
            'sj.tgl_diterima',
            'sj.nomor_suratjln AS nsj',
            'sja.id',
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
            'material.id_material',
            'material.nama',
            'material.normalisasi',
            'material.satuan',
            'dmsja.jumlah_diminta',
            'dmsja.jumlah_diberi',
        )
        ->where('id_sja', '=', $idsjadmin)
        ->get();

        $jumlah = DB::table('daftar_material_sja AS dmsja')
        ->select('id_sja')
        ->where('id_sja', $idsjadmin)
        ->count();

        $list = $jumlah;

        return view('form_suratjalan_admin_edit', compact('sja', 'dmsja', 'list'));
    }

    public function storeDataSuratAdmin(Request $request) {

        $idsj = $request->input('idsj');
        $idsja = $request->input('idsja');

        foreach ($request->input('jumlahdiberi') as $key => $value) {
            DB::table('daftar_material_sja')
            ->where('id_sja', $idsja)
            ->where('id_material', $request->input('idmat')[$key])
            ->update([
                'jumlah_diberi' => ($value == "TA") ? null : $value
            ]);

            DB::table('material')
            ->where('id_material', $request->input('idmat')[$key])
            ->decrement('jumlah_sap', ($value == "TA") ? 0 : $value);
        }

        DB::table('surat_jalan_admin')
        ->where('id', $idsja)
        ->update([
            'penerima' => ($request->input('penerima') == null) ? null : $request->input('penerima')
        ]);

        DB::table('surat_jalan AS sj')
        ->where('id_surat_jalan', $idsj)
        ->update([
            'pengemudi' => ( $request->input('pengemudi') == null ) ? null : $request->input('pengemudi'),
            'nomor_polisi' => ( $request->input('nopol') == null ) ? null : $request->input('nopol'),
        ]);

        foreach ($request->input('jumlahdiberi') as $key => $value) {
            $idre = DB::table('riwayat_edit')
            ->where('id_suratjalan', $request->input('idsj'))
            ->where('id_material', $request->input('idmat')[$key])
            ->orderByDesc('id')
            ->pluck('jumlah_ditambah')
            ->first();

            // dd($request->input('idmat')[$key]);

            $jumlahsebelumnya = DB::table('riwayat_edit')
            ->where('id_suratjalan', $request->input('idsrtjl'))
            ->where('id_material', $request->input('idmat')[$key])
            ->orderByDesc('id')
            ->pluck('jumlah_ditambah')
            ->first();
            
            // $log = $value ." ". $idre ." ". $jumlahsebelumnya;
            // dd($log);

            if ($jumlahsebelumnya != $value) {
                RiwayatEdit::create([
                    'id_suratjalan' => $request->input('idsj'),
                    'id_material' => $request->input('idmat')[$key],
                    'jumlah_sebelumnya' => ($idre == null) ? null : $idre,
                    'jumlah_ditambah' => ($value == "TA") ? null : $value,
                    'tgl_diubah' => date('Y-m-d H:i:s'),
                ]);
            }      
        }

        return redirect()->route('showsjadmin', ['id' => Crypt::encryptString($idsj)]);
    }

    public function show(String $encryptedId): View {

        $id = Crypt::decryptString($encryptedId);

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

        $iddpbsrtjln = DB::table('dpb_suratjalan')
        ->select('id_dpb_suratjalan')
        ->where('id_suratjalan', '=', $id);

        $material = DB::table('daftar_material')
        ->select(
            'daftar_material.jumlah_diminta',
            'daftar_material.jumlah_diberi',
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

        $list = $jumlah + 1;

        $riwayat = DB::table('riwayat_edit AS rd')
        ->join('material', 'material.id_material', '=', 'rd.id_material')
        ->select(
            'rd.tgl_diubah',
            'rd.jumlah_sebelumnya',
            'rd.jumlah_ditambah',
            'material.nama',
        )
        ->where('rd.id_suratjalan', $id)
        ->orderByDesc('rd.tgl_diubah')
        ->get();

        return view('form_suratjalan', compact('suratjln', 'material', 'list', 'riwayat'));
    }

    public function showk7(String $encryptedId): View {

        $id = Crypt::decryptString($encryptedId);

        $suratjln = DB::table('k7_srtjln AS k7sj')
        ->select(
            'surat_jalan.nomor_suratjln AS nosj',
            'surat_jalan.id_surat_jalan AS idsrtjl',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
            'surat_jalan.tgl_diterima AS tgldicetak',
            'k7sj.id',
            'k7sj.nospk',
            'k7sj.nm_pelanggan AS nampel',
            'k7sj.idpel',
            'k7sj.almt_pelanggan AS almtpel',
            'k7sj.trfdy_lama AS daylam',
            'k7sj.trfdy_baru AS daybar',
            'k7sj.penerima',
            'k7sj.kpl_gudang AS kplg',
            'k7.nmr_k7 AS nomor',
            'user.nama AS vendor',
            'ulp.nama AS ulp',
            'jenis_pekerjaan.pekerjaan AS nmpkrjn'
        )
        ->join('surat_jalan', 'k7sj.id_srtjln', '=', 'surat_jalan.id_surat_jalan')
        ->join('k7', 'k7.id_k7srtjln', '=', 'k7sj.id')
        ->join('user', 'k7sj.id_user', '=', 'user.id_user')
        ->join('ulp', 'k7sj.id_ulp', '=', 'ulp.id_ulp')
        ->join('jenis_pekerjaan', 'k7sj.id_jns_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->where('surat_jalan.id_surat_jalan', $id)
        ->get();

        $idk7sj = DB::table('k7_srtjln')
        ->select(
            'id'
        )
        ->where('id_srtjln', '=', $id);

        $material = DB::table('dftrmaterial_k7 AS dmk7')
        ->join('material_bekas AS mb', 'dmk7.id_mtrl_k7', '=', 'mb.id')
        ->select(
            'dmk7.jumlah_diminta',
            'dmk7.jumlah_diberi',
            'dmk7.id_mtrl_k7',
            'dmk7.id_k7srtjln',
            'mb.nama as nammat',
            'mb.normalisasi',
            'mb.satuan',
        )
        ->where('dmk7.id_k7srtjln', '=', $idk7sj)
        ->get();

        $dpbsrt = DB::table('k7_srtjln AS k7sj')
        ->select('id')
        ->where('id_srtjln', '=', $id)
        ->pluck('id');

        $jumlah = DB::table('dftrmaterial_k7')
        ->select('id_k7srtjln')
        ->where('id_k7srtjln', '=', $dpbsrt)
        ->count();

        $list = $jumlah+1;

        $riwayat = DB::table('riwayat_edit AS rd')
        ->join('material', 'material.id_material', '=', 'rd.id_material')
        ->select(
            'rd.tgl_diubah',
            'rd.jumlah_sebelumnya',
            'rd.jumlah_ditambah',
            'material.nama',
        )
        ->where('rd.id_suratjalan', $id)
        ->orderByDesc('rd.tgl_diubah')
        ->get();

        return view('form_suratjalan_k7', compact('suratjln', 'material', 'list', 'riwayat'));
    }

    public function showsjadmin(String $encryptedId): View {

        $id = Crypt::decryptString($encryptedId);

        // dd($id);

        $sja = DB::table('surat_jalan AS sj')
        ->join('surat_jalan_admin AS sja', 'sja.id_suratjalan', '=', 'sj.id_surat_jalan')        
        ->select(
            'sj.id_surat_jalan AS idsj',
            'sj.nomor_polisi AS nopol',
            'sj.pengemudi',
            'sj.tgl_diterima',
            'sj.nomor_suratjln AS nsj',
            'sja.id',   
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
            'material.id_material',
            'material.nama',
            'material.normalisasi',
            'material.satuan',
            'dmsja.jumlah_diminta',
            'dmsja.jumlah_diberi',
        )
        ->where('id_sja', '=', $idsjadmin)
        ->get();

        $jumlah = DB::table('daftar_material_sja AS dmsja')
        ->select('id_sja')
        ->where('id_sja', $idsjadmin)
        ->count();

        $list = $jumlah;


        $riwayat = DB::table('riwayat_edit AS rd')
        ->join('material', 'material.id_material', '=', 'rd.id_material')
        ->select(
            'rd.tgl_diubah',
            'rd.jumlah_sebelumnya',
            'rd.jumlah_ditambah',
            'material.nama',
        )
        ->where('rd.id_suratjalan', $id)
        ->orderByDesc('rd.tgl_diubah')
        ->get();

        return view('form_suratjalan_admin', compact('sja', 'dmsja', 'list', 'riwayat'));
    }

    public function print(String $encryptedId): View {

        $id = Crypt::decryptString($encryptedId);

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

        $iddpbsrtjln = DB::table('dpb_suratjalan')        
        ->where('id_suratjalan', '=', $id)
        ->pluck('id_dpb_suratjalan');

        $material = DB::table('daftar_material')
        ->select(
            'daftar_material.jumlah_diminta',
            'daftar_material.jumlah_diberi',
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

        return view('printsuratjalan', compact('suratjln', 'material', 'list'));
    }

    public function printk7(String $encryptedId): View {

        $id = Crypt::decryptString($encryptedId);

        $suratjln = DB::table('k7_srtjln AS k7sj')
        ->select(
            'surat_jalan.nomor_suratjln AS nosj',
            'surat_jalan.id_surat_jalan AS idsrtjl',
            'surat_jalan.nomor_polisi',
            'surat_jalan.pengemudi',
            'surat_jalan.tgl_diterima AS tgldicetak',
            'k7sj.id',
            'k7sj.nospk',
            'k7sj.nm_pelanggan AS nampel',
            'k7sj.idpel',
            'k7sj.almt_pelanggan AS almtpel',
            'k7sj.trfdy_lama AS daylam',
            'k7sj.trfdy_baru AS daybar',
            'k7sj.penerima',
            'k7sj.kpl_gudang AS kplg',
            'k7.nmr_k7 AS nomor',
            'user.nama AS vendor',
            'ulp.nama AS ulp',
            'jenis_pekerjaan.pekerjaan AS nmpkrjn'
        )
        ->join('surat_jalan', 'k7sj.id_srtjln', '=', 'surat_jalan.id_surat_jalan')
        ->join('k7', 'k7.id_k7srtjln', '=', 'k7sj.id')
        ->join('user', 'k7sj.id_user', '=', 'user.id_user')
        ->join('ulp', 'k7sj.id_ulp', '=', 'ulp.id_ulp')
        ->join('jenis_pekerjaan', 'k7sj.id_jns_pekerjaan', '=', 'jenis_pekerjaan.id_jenis_pekerjaan')
        ->where('surat_jalan.id_surat_jalan', $id)
        ->get();

        $idk7sj = DB::table('k7_srtjln')
        ->select(
            'id'
        )
        ->where('id_srtjln', '=', $id);

        $material = DB::table('dftrmaterial_k7 AS dmk7')
        ->join('material_bekas AS mb', 'dmk7.id_mtrl_k7', '=', 'mb.id')
        ->select(
            'dmk7.jumlah_diminta',
            'dmk7.jumlah_diberi',
            'dmk7.id_mtrl_k7',
            'dmk7.id_k7srtjln',
            'mb.nama as nammat',
            'mb.normalisasi',
            'mb.satuan',
        )
        ->where('dmk7.id_k7srtjln', '=', $idk7sj)
        ->get();

        $dpbsrt = DB::table('k7_srtjln AS k7sj')
        ->select('id')
        ->where('id_srtjln', '=', $id)
        ->pluck('id');

        $jumlah = DB::table('dftrmaterial_k7')
        ->select('id_k7srtjln')
        ->where('id_k7srtjln', '=', $dpbsrt)
        ->count();

        $list = $jumlah+1;

        $riwayat = DB::table('riwayat_edit AS rd')
        ->join('material', 'material.id_material', '=', 'rd.id_material')
        ->select(
            'rd.tgl_diubah',
            'rd.jumlah_sebelumnya',
            'rd.jumlah_ditambah',
            'material.nama',
        )
        ->where('rd.id_suratjalan', $id)
        ->orderByDesc('rd.tgl_diubah')
        ->get();

        return view('printsuratjalank7', compact('suratjln', 'material', 'list', 'riwayat'));
    }

    public function printsjadmin(String $encryptedId): View {

        $id = Crypt::decryptString($encryptedId);

        // dd($id);

        $sja = DB::table('surat_jalan AS sj')
        ->join('surat_jalan_admin AS sja', 'sja.id_suratjalan', '=', 'sj.id_surat_jalan')        
        ->select(
            'sj.id_surat_jalan AS idsj',
            'sj.nomor_polisi AS nopol',
            'sj.pengemudi',
            'sj.tgl_diterima',
            'sj.nomor_suratjln AS nsj',
            'sja.id',   
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
            'material.id_material',
            'material.nama',
            'material.normalisasi',
            'material.satuan',
            'dmsja.jumlah_diminta',
            'dmsja.jumlah_diberi',
        )
        ->where('id_sja', '=', $idsjadmin)
        ->get();

        $jumlah = DB::table('daftar_material_sja AS dmsja')
        ->select('id_sja')
        ->where('id_sja', $idsjadmin)
        ->count();

        $list = $jumlah;


        $riwayat = DB::table('riwayat_edit AS rd')
        ->join('material', 'material.id_material', '=', 'rd.id_material')
        ->select(
            'rd.tgl_diubah',
            'rd.jumlah_sebelumnya',
            'rd.jumlah_ditambah',
            'material.nama',
        )
        ->where('rd.id_suratjalan', $id)
        ->orderByDesc('rd.tgl_diubah')
        ->get();

        return view('printsuratjalanadmin', compact('sja', 'dmsja', 'list', 'riwayat'));
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