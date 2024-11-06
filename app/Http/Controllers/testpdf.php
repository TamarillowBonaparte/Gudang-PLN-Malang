<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class testpdf extends Controller
{
    public function index () {

        $pdf = Pdf::loadView('testpdf');
 
        return $pdf->stream();
        // return view('testpdf');
    }
}
