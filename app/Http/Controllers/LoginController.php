<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('home');
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

        if (Auth::attempt($credential)) {
            $user = Auth::user();

            if ($user->id_jenis_user == 101 || $user->id_jenis_user == 103) {
                return response()->json(['success' => true, 'redirect' => url('home')]);
            } elseif ($user->id_jenis_user == 102) {
                return response()->json(['success' => true, 'redirect' => url('vendor')]);
            }
        }

        return response()->json(['success' => false, 'message' => 'Username atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('loginpage');
    }
}

