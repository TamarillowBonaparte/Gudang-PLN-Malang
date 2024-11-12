<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;

class testpdf extends Controller
{
    public function index () {

        $pdf = FacadePdf::loadView('testprint');
        
        // Set additional PDF options if needed
        $pdf->setOptions([
            'fontDir' => public_path('/fonts'),
            'fontCache' => public_path('/fonts'),
            'defaultFont' => 'RobotoMono-Regular'
        ]);

        return $pdf->stream();
        // return view('testprint');
    }
}