<?php

namespace App\Http\Controllers;

use App\Models\DetailPage;
use Barryvdh\Snappy\Facades\SnappyImage;
use Illuminate\Http\Request;

class DetailPageController extends Controller
{
    public function convertToImage($id_dpb)
    {
        // Mengambil data surat berdasarkan ID dari tabel 'surat'
        $surat = DetailPage::findOrFail($id_dpb);

        // Mengonversi detailsurat.blade.php menjadi gambar
        $image = SnappyImage::loadView('detail.surat', compact('surat'));

        return $image->inline(); // Menampilkan gambar langsung di browser
    }
}