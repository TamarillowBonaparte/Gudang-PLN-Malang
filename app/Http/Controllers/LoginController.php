<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index ()
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

    public function proses_login(Request $request) {

        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        // ambil data username dan password
        $credential = $request->only('username','password');

        if(Auth::attempt($credential)){
            // kalau berhasil simpan data user ya di variabel $user
            $user =  Auth::user();
            
            // cek lagi jika level user
            if($user->id_jenis_user == 101 || $user->id_jenis_user == 103){
                // jika true sebagai admin maka diarahkan ke dashboard
                return redirect('home');
            } else if($user->id_jenis_user == 102) {

                return redirect('/vendor');
            }                        
            // kembali ke login jika tidak ada role
            return redirect('/loginpage');
        }

        return redirect('/loginpage')
            ->withInput()
            ->withErrors(['login_gagal'=>'These credentials does not match our records']);
    }
    
    public function logout(Request $request){
        // logout itu harus menghapus session nya 
        $request->session()->flush();
        // jalan kan juga fungsi logout pada auth 
        Auth::logout();
        // kembali kan ke halaman login
        return Redirect('loginpage');
    }
}
