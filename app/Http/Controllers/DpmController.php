<?php

namespace App\Http\Controllers;

use App\Models\DaftarMaterial;
use App\Models\DpmSuratJalan;
use App\Models\KepalaGudang;
use App\Models\Pemeriksa;
use App\Models\Setuju;
use App\Models\SuratJalan;
use App\Models\Ulp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DpmController extends Controller {

    public function index () {

        $ulps = Ulp::all();
        $kepalaGdng = KepalaGudang::all();
        $setuju = Setuju::all();
        $pemeriksa = Pemeriksa::all();

        return view('dpm', compact('ulps', 'kepalaGdng', 'setuju'));
    }

    public function search(Request $request) {
        if($request->ajax()) {
    
            $materials = DB::table('material')
                ->where('nama','LIKE','%'.$request->search."%")
                ->get();
    
            $results = [];
    
            if($materials) {
                foreach ($materials as $material) {
                    $results[] = [
                        'id'            => $material->id_material,
                        'nama'          => $material->nama,
                        'normalisasi'   => $material->normalisasi,
                        'satuan'        => $material->satuan
                    ];
                }
            }
    
            return response()->json(['materials' => $results]);
        }
    }

    public function store(Request $request) {

        $idUser = Auth::user()->id_user;

        $this->validator($request->all(), [
            'pbpd' => 'required|in:1,2'
        ]);

        $pbpd = $request->input('pbpd');

        switch ($pbpd) {
            case 1:
                $this->validator($request->all(), [
                    'nospk'             => 'required',
                    'jenispekerjaan'    => 'required|in:1,2,3,4,5,6,7,8,9',
                    'idpel'             => 'required',
                    'nama_pel'          => 'required',
                    'alamat_pel'        => 'required',
                    'pbpd'              => 'required|in:1,2',
                    'dayabaru'          => 'required',
                ]);

                $dpmSuratJalan = DpmSuratJalan::create([
                    'kepala_gudang' => $request->input('kepalagudang'),
                    'no_spk' => $request->input('nospk'),
                    'id_jenis_pekerjaan' => $request->input('jenispekerjaan'),
                    'idpel' => $request->input('idpel'),
                    'nama_pelanggan' => $request->input('nama_pel'),
                    'alamat_pelanggan' => $request->input('alamat_pel'),
                    'id_ulp' => $request->input('ulp'),
                    'id_pb_pd' => $request->input('pbpd'),
                    'tarif_daya_lama' => $request->input(''),
                    'tarif_daya_baru' => $request->input('dayabaru'),
                    'id_user' => $idUser
                ]);

                DaftarMaterial::create([
                    'id_dpb_suratjalan' => $dpmSuratJalan->id_dpb_suratjalan,
                    'id_material' => $request->table_data,
                    'jumlah' => $request->jumlah
                ]);

                SuratJalan::create([
                    'id_dpb_suratjalan' => $dpmSuratJalan->id_dpb_suratjalan,
                    'tgl_diterima'      => '',
                    'nomor_polisi'      => '',
                    'pengemudi'         => ''
                ]);

                break;

            case 2:
                $this->validator($request->all(), [
                    'nospk'             => 'required',
                    'jenispekerjaan'    => 'required|in:1,2,3,4,5,6,7,8,9',
                    'idpel'             => 'required',
                    'nama_pel'          => 'required',
                    'alamat_pel'        => 'required',
                    'pbpd'              => 'required|in:1,2',
                    'dayalama'          => 'required',
                    'dayabaru'          => 'required',
                ]);

                break;
        }

        return redirect('/dpm-preview');
    }
}