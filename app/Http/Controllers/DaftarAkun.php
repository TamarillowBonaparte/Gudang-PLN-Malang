<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DaftarAkun extends Controller
{
    public function index()
    {
        $users = User::with('jenisUser')->get();

        return view('daftarakun', ['users' => $users]);
    }
}
