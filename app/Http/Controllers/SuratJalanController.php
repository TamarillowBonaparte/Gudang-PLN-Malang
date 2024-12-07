<?php

namespace App\Http\Controllers;

use App\Models\DaftarMaterialSJA;
use App\Models\Material;
use App\Models\SuratJalan;
use App\Models\SuratJalanAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratJalanController extends Controller
{
    public function index()
    {

        setlocale(LC_TIME, 'id_ID');

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

        $sj = DB::table('surat_jalan AS sj')
        // ->join('surat_jalan_admin AS sja', 'sj.id_surat_jalan', '=', 'sja.id_suratjalan')
        ->join('dpb_suratjalan AS dsj', 'sj.id_surat_jalan', '=', 'dsj.id_suratjalan')
        ->join('daftar_permintaan_material AS dpm', 'dpm.id_dpb', '=', 'dsj.id_dpb_suratjalan')
        ->join('k7_srtjln AS k7sj', 'sj.id_surat_jalan', '=', 'k7sj.id_srtjln')
        ->join('k7', 'k7sj.id', 'k7.id_k7srtjln')
        ->whereNotNull('nomor_polisi')
        ->select(
            'sj.nomor_suratjln AS sjno',
            'sj.tgl_diterima',
            'sj.pengemudi',
            'sj.nomor_polisi',
            'dpm.nomor_dpb AS ndpb',
        )
        ->orderByDesc('nomor_suratjln')
        ->get();

        return view('surat_jalan', compact('suratjalan', 'sj'));
    }

    public function store(Request $request) {

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

        $sJln = SuratJalan::create([
            'nomor_suratjln'    => $nomorSuratJalan,
            'tgl_diterima'      => date('Y-m-d H:i:s'),
            'nomor_polisi'      => ($request->input('nopol') != null) ? $request->input('nopol') : null,
            'pengemudi'         => ($request->input('pengemudi') != null) ? $request->input('pengemudi') : null
        ]);

        $lastSurJalId = $sJln->id_surat_jalan;

        $sja = SuratJalanAdmin::create([
            "kepada"            => ($request->input('kepada') != null) ? $request->input('kepada') : null,
            "alamat"            => ($request->input('alamat') != null) ? $request->input('alamat') : null,
            'no_permintaan'     => $request->input('nopermintaan'),
            'penerima'          => ($request->input('penerima') != null) ? $request->input('penerima') : null,
            'yang_menyerahkan'  => ($request->input('menyerahkan') != null) ? $request->input('menyerahkan') : null,
            'keterangan'        => ($request->input('keterangan') != null) ? $request->input('keterangan') : null,
            'id_suratjalan'     => $lastSurJalId,
        ]);

        $sjaId = $sja->id;

        // Looping untuk insert daftar material dan update stok
        foreach ($request->input('idmaterial') as $index => $idMaterial) {
            $banyakDiminta = $request->input('banyakdiminta')[$index];
            $material = Material::find($idMaterial);
            $material->decrement('jumlah_sap', $banyakDiminta);

            DaftarMaterialSJA::create([
                'id_material'       => $idMaterial,
                'jumlah_diminta'    => $banyakDiminta,
                'jumlah_diberi'    => null,
                'tgl_keluar'        => date('Y-m-d'),
                'id_sja'            => $sjaId
            ]);
        }
    
        return redirect()->back();
    }
}
