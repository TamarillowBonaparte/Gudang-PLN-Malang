<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if($user){
            if($user->id_jenis_user == 101) {
                return redirect('home');
            } elseif($user->id_jenis_user == 103) {
                return redirect('gudangbawah');
            } elseif($user->id_jenis_user == 102) {
                return redirect('vendor');
            }
        }
        return view('loginpage');
    }

    public function proses_login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = $request->only('username', 'password');

        if(Auth::attempt($credential)){
            $user = Auth::user();

            // Set flash data untuk SweetAlert
            session()->flash('status', 'success');
            session()->flash('message', 'Login berhasil!');

            if($user->id_jenis_user == 101){
                return redirect('/home');
            } elseif($user->id_jenis_user == 103) {
                return redirect('/gudangbawah');
            } elseif($user->id_jenis_user == 102) {
                return redirect('/vendor');
            }
            return redirect('/');
        }

        // Set flash data untuk SweetAlert jika login gagal
        session()->flash('status', 'error');
        session()->flash('message', 'Username atau password salah.');

        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
