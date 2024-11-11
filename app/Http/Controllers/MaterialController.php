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
            'material_masuk.tgl',
            'material_masuk.jumlah'
        )
        ->join('material', 'material_masuk.id_material', '=', 'material.id_material')
        ->orderByDesc('tgl')
        ->get();

        $detailMat = DB::table('material')
        ->select(
            '*'
        )
        ->get();
        
        $materialKeluar = DB::table('daftar_material')
        ->join('material', 'daftar_material.id_material', '=', 'material.id_material')
        ->select(
            'daftar_material.jumlah',
            'daftar_material.tgl_keluar',
            'material.nama'
        )
        ->orderByDesc('tgl_keluar')
        ->get();

        return view ('material', ['materials' => $materials, 'MaterialMasuk' => $MaterialMasuk, 'detailMat' => $detailMat, 'materialKeluar' => $materialKeluar]);
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
            'tgl'           => date('Y-m-d'),
            'jumlah'        => trim($request->input('jumlah_sap')),
            'id_material'   => $idMat
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

    public function tambahMaterial(Request $request) {

        date_default_timezone_set('Asia/Jakarta');

        $idMat = $request->input('idmaterial');

        // Data yang akan di-update
        $dataToUpdate = [
            'nama' => $request->input('modalNama'),
            'normalisasi' => $request->input('modalNormalisasi'),
            'deskripsi' => $request->input('modalDeskripsi'),
            'satuan' => $request->input('modalSatuan'),
            'bagian' => $request->input('modalBagian'),
            'jumlah_sap' => $retVal = ($request->input('modalJumlah') == null) ? 0 : $request->input('modalJumlah')
        ];

        // Hapus nilai null untuk hanya memperbarui kolom yang berubah
        $dataToUpdate = array_filter($dataToUpdate, function ($value) {
            return !is_null($value);
        });

        // Update data material
        DB::table('material')->where('id_material', $idMat)->update($dataToUpdate);

        if ($request->input('tambahmaterial') != null) {

            MaterialMasuk::create([
                'tgl'           => date('Y-m-d'),
                'jumlah'        => $request->input('tambahmaterial'),
                'id_material'   => $idMat
            ]);

            $addMaterial = Material::find($idMat);
            $addMaterial->jumlah_sap = $request->input('tambahmaterial');
            $addMaterial->save();
        }

        return redirect()->back()->with('success', 'Material berhasil ditambahkan.');
    }
}
