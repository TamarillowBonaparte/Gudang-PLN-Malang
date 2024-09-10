<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GudangDPMController extends Controller
{
    public function index()
    {
        return view('gudangdpm');
    }
}