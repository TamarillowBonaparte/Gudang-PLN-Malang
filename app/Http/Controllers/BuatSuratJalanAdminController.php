<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuatSuratJalanAdminController extends Controller
{
    public function index() {

        return view('buatsuratjalanadmin');
    }

    public function store(Request $id) {

        return redirect();
    }
}
