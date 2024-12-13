<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    // Simpan catatan ke database
    public function store(Request $request) {
        $validated = $request->validate([
            'judul_catatan' => 'required|string|max:255',
            'isicatatan' => 'required|string',
        ]);

        DB::table('catatan')->insert([
            'judul_catatan' => $validated['judul_catatan'],
            'isicatatan' => $validated['isicatatan'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true, 'message' => 'Catatan berhasil disimpan.']);
    }

    // Ambil semua catatan dari database
    public function index() {
        $notes = DB::table('catatan')->orderBy('created_at', 'desc')->get();
        return response()->json($notes);
    }
}

