<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();

        $MaterialMasuk = DB::table('material_masuk')
        ->select(
            'material.nama as nammat',
            'material_masuk.tgl'
        )
        ->join('material', 'material_masuk.id_material', '=', 'material.id_material')
        ->orderByDesc('tgl')
        ->get();

        $detailMat = DB::table('material')
        ->select(
            '*'
        )
        ->get();

        return view ('material', ['materials' => $materials, 'MaterialMasuk' => $MaterialMasuk, 'detailMat' => $detailMat ]);

    }

    public function materialBaru(Request $request) {

        date_default_timezone_set('Asia/Jakarta');



        $mat = Material::create([
            'normalisasi' =>   trim($request->input('normalisasi')),
            'nama' => trim($request->input('namaMat')),
            'deskripsi' => trim($request->input('deskripsi')),
            'satuan' => trim($request->input('satuan')),
            'bagian' => trim($request->input('bagian')),
            'jumlah_sap' => trim($request->input('jumlah_sap')),
        ]);

        $idMat = $mat->id_material;

        MaterialMasuk::create([
            'tgl' => date('Y-m-d'),
            'id_material' => $idMat
        ]);



        return redirect()->back()->with('success', 'Material baru berhasil ditambahkan.');

    }

    public function detailMaterial($id) {

        $material = DB::table('material')
        ->select('*')
        ->where('id_material', '=', $id)
        ->get();

        return response()->json($material);
    }

    public function tambahMaterial() {
        
    }
}
