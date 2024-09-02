<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DpmController extends Controller {

    public function index () {

        return view('dpm');
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
                        'id' => $material->id_material,
                        'nama' => $material->nama,
                        'normalisasi' => $material->normalisasi,
                        'satuan' => $material->satuan
                    ];
                }
            }
    
            return response()->json(['materials' => $results]);
        }
    }

    public function insertData(Request $request): RedirectResponse {

        

        return redirect()->route('')->with(['success' => 'Data berhasil disimpan']);
    }
}
