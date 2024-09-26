<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class DaftarAkunController extends Controller
{
    public function index()
{
        $users = JenisUser::join('user', 'user.id_jenis_user', '=', 'jenis_user.id_jenis_user')
                    ->get(['user.nama', 'user.alamat', 'user.username', 'jenis_user.tipe']);
        $userInformation = Auth::user();

        return view('daftarakun', compact('users', 'userInformation'));
    }

    public function store(Request $request) {

        $hashedPassword = Hash::make($request->input('passwordInput'));

        $jenisUser = $request->input('jenis_user');

        try {
            switch ($jenisUser) {
                case 101:
                    $this->validate($request, [
                        'nama'      => 'required',
                        'username'  => 'required',
                        'passwordInput'  => 'required',
                        'jenis_user'=> 'required|in:101,102,103'
                    ]);

                    User::create([
                        'nama'          => $request->input('nama'),
                        'alamat'        => '',
                        'username'      => $request->input('username'),
                        'password'      => $hashedPassword,
                        'id_jenis_user' => 101
                    ]);
                break;

                case 102:
                    $this->validate($request, [
                        'nama'      => 'required',
                        'username'  => 'required',
                        'password'  => 'required',
                        'jenis_user'=> 'required|in:101,102,103',
                        'alamat'    => 'required'
                    ]);

                    User::create([
                        'nama'          => $request->input('nama'),
                        'alamat'        => $request->input('alamat'),
                        'username'      => $request->input('username'),
                        'password'      => $hashedPassword,
                        'id_jenis_user' => 102
                    ]);
                break;

                case 103:
                    $this->validate($request, [
                        'nama'          => 'required',
                        'username'      => 'required',
                        'passwordInput' => 'required',
                        'jenis_user'    => 'required|in:101,102,103'
                    ]);

                    User::create([
                        'nama'          => $request->input('nama'),
                        'alamat'        => '',
                        'username'      => $request->input('username'),
                        'password'      => $hashedPassword,
                        'id_jenis_user' => 103
                    ]);
                break;
            }

            return redirect()->back()->with(['success' => 'Berhasil', 'jenisUser' => $jenisUser]);
        } catch (\Exception $e) {
            Log::error('Error:', ['message' => $e->getMessage()]);
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan, silakan coba lagi.', 'jenisUser' => $jenisUser]);
        }

    }
}
