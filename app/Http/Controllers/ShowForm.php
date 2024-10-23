<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowForm extends Controller
{
    public function index() {
        return view('form_k7');
    }
}
