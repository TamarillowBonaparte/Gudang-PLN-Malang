<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SessionController extends Controller
{

    function index(): View {

        $user = Auth::user();
        
        if($user) {
            if($user->level=='admin') {
                return redirect()->intended('home');
            }
            // jika user nya memiliki level gudangbawah
            else if($user->level =='gudangbawah') {
                // arahkan ke halaman gudangbawah
                return redirect()->intended('home');
            }
            // jika user nya memiliki level vendor
            else if($user->level =='vendor') {
                // arahkan ke halaman vendor
                return redirect()->intended('vendor');
            }
        }
        
        return view('loginpage');
    }

    function proses_login(Request $request) {

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
            if($user->level == 'admin'){
                // jika true sebagai admin maka diarahkan ke dashboard
                return redirect()->intended('home');
            } else if($user->level == 'gudangbawah'){
                
                return redirect()->intended('home');
            } else if($user->level == 'vendor'){

                return redirect()->intended('vendor');
            }
            // kembali ke login jika tidak ada role
            return redirect()->intended('/loginpage');
        }

        return redirect('loginpage')
            ->withInput()
            ->withErrors(['login_gagal'=>'These credentials does not match our records']);
    }
    
    public function logout(Request $request){
        // logout itu harus menghapus session nya 
        $request->session()->flush();
        // jalan kan juga fungsi logout pada auth 
        Auth::logout();
        // kembali kan ke halaman login
        return Redirect('login');
    }
}
