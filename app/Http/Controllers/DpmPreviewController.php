<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DpmPreviewController extends Controller
{
    public function index() {

        return view('dpmpreview');
    }
}
