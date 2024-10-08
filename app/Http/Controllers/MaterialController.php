<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\MaterialMasuk;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        
        return view ('material', ['materials' => $materials]);
    }

    public function materialBaru(Request $request) {

        date_default_timezone_set('Asia/Jakarta');

        $mat = Material::create([
            'normalisasi' => $request->input('normalisasi'),
            'nama' => $request->input(''),
            'deskripsi' => $request->input(),
            'satuan' => $request->input(),
            'bagian' => $request->input(),
            'jumlah_sap' => $request->input(),
        ]);

        $idMat = $mat->id_material;

        MaterialMasuk::create([
            'tgl' => date('Y-m-d'),
            'id_material' => $idMat
        ]);

        return redirect()->back();
    }
}
