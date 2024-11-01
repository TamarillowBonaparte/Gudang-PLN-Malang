<?php

namespace App\Http\Controllers;

use App\Models\DetailPage;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;

class DetailPageController extends Controller
{

    public function index()
    {
        return view('detailpage');
    }

    public function screenshotDetailsurat($id_dpb)
    {
        // Ambil data surat berdasarkan ID
        $surat = DetailPage::findOrFail($id_dpb);

        // URL atau path ke halaman yang akan di-screenshot
        $url = route('detailsurat', ['id' => $id_dpb]);

        // Nama file gambar untuk disimpan
        $fileName = 'screenshot_surat_' . $id_dpb . '.png';

        // Simpan screenshot dari halaman detailsurat
        Browsershot::url($url)
            ->setScreenshotType('png', 100)
            ->save(storage_path("app/public/{$fileName}"));

        // Kembalikan path file gambar ke view detailpage
        return view('detailpage', [
            'surat' => $surat,
            'imagePath' => Storage::url($fileName)
        ]);
    }

    public function showDetailsurat($id_dpb)
    {
        $surat = DetailPage::findOrFail($id_dpb);
        return view('detailsurat', compact('surat'));
    }
}
