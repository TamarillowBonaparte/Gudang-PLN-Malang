<?php

namespace App\Http\Controllers;

use App\Models\DaftarMaterialK3;
use App\Models\Gudang;
use App\Models\K3;
use App\Models\KepalaGudang;
use App\Models\Pemeriksa;
use App\Models\Pengembali;
use App\Models\Setuju;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class K3Controller extends Controller
{
    public function index () {

        $user = Auth::user();

        $gudang = Gudang::where('id', '!=', '3')->get();
        $jnspkrjn = DB::table('jnspekerjaan_k3')->get();
        $kepalaGdng = KepalaGudang::all();
        $setuju = Setuju::all();
        $pemeriksa = Pemeriksa::where('id_user', $user->id_user)->get();
        $pengembali = Pengembali::where('id_user', $user->id_user)->get();

        return view('k3', compact('gudang', 'jnspkrjn', 'setuju', 'kepalaGdng', 'pengembali', 'pemeriksa'));
    }

    public function store(Request $request) {

        $idUser = Auth::user()->id_user;

        $noK3 = DB::table('k3')
        ->orderBy('nmr_k3', 'desc')
        ->first();
        $nomorK3String = $noK3 ? ($noK3->nmr_k3 ?? 0) : 0;
        $parts = explode('-', $nomorK3String);
        $lastPart = end($parts); // Mengambil bagian terakhir
        if ($lastPart !== null) {
            // Menghapus angka nol di depan
            $filteredPart = (int)ltrim($lastPart, '0');
        }
        $lastK3Num = $filteredPart + 1;
        $nomorBon = "MLG" . date("y") . "-" . str_pad($lastK3Num, 4, '0', STR_PAD_LEFT);
        $noK3 = "TUG 10." . $nomorBon;

        $kepalaGudang = strtoupper($request->input('kepalagudang'));
        $pengembali = strtoupper($request->input('pengembali'));

        $this->createIfNotExists(KepalaGudang::class, 'nama', $kepalaGudang);
        $this->createIfNotExists(Pengembali::class, 'nama', $pengembali);

        $k3 = K3::create([
            'nmr_k3' => $noK3,
            'tgl_diminta' => date('Y-m-d'),
            'setuju' => $request->input('setuju'),
            'pemeriksa' => $request->input('pemeriksa'),
            'kpl_gdng' => $kepalaGudang,
            'pengembali' => $pengembali,
            'id_jnssurat' => 3,
            'nospk' => $request->input('nospk'),
            'jnspekerjaan' => $request->input('jenispkrjn'),
            'idpel' => $request->input('idpel'),
            'nm_pelanggan' => $request->input('nama_pel'),
            'almt_pelanggan' => $request->input('alamat_pel'),
            'nmr_seri' => ($request->input('noseri') == null) ? null : $request->input('noseri'),
            'nodpb_buktipotong' => ($request->input('dpbbukti') == null) ? null : $request->input('dpbbukti'),
            'id_kondisi' => $request->input('kondisi'),
            'id_gdngpengembalian' => $request->input('gudang'),
            'lokasi_pengembalian' => $request->input('lokpenem'),
            'keterangan' => ($request->input('keterangan') == null) ? null : $request->input('keterangan'),
            'id_user' => $idUser,
        ]);

        $lastInsertedId = $k3->id;

        foreach ($request->input('idmaterial') as $index => $idMaterial) {
            $namaMat = $request->input('namamaterial')[$index];
            $normalisasi = $request->input('normalisasi')[$index];
            $satuan = $request->input('satuan')[$index];
            $banyakDikembalikan = $request->input('banyakDikembalikan')[$index];

            DaftarMaterialK3::create([
                "nama" => $namaMat,
                "normalisasi" => $normalisasi,
                "jumlah" => $banyakDikembalikan,
                "satuan" => $satuan,
                "id_k3" => $lastInsertedId
            ]);

            
        }        
        
        return redirect();
    }

    private function createIfNotExists($model, $field, $value) {

        $idUser = Auth::user()->id_user;

        if ($model == KepalaGudang::class || $model == Setuju::class) {
            if (!$model::where($field, $value)->exists()) {
                $model::create([$field => $value]);
            }
        }
        else if (!$model::where('id_user', $idUser)->exists() || !$model::where($field, $value)->exists()) {
            $model::create([$field => $value, 'id_user' => $idUser]);
        }
    }

    public function angkaKeHuruf($angka) {
        // Array untuk mendefinisikan angka 0-9 dalam bentuk teks
        foreach ($angka as $key) {

            $angkaHuruf = [
                '0' => 'Nol',
                '1' => 'Satu',
                '2' => 'Dua',
                '3' => 'Tiga',
                '4' => 'Empat',
                '5' => 'Lima',
                '6' => 'Enam',
                '7' => 'Tujuh',
                '8' => 'Delapan',
                '9' => 'Sembilan'
            ];

            // Konversi angka menjadi string agar bisa dipecah per digit
            $angkaStr = strval($key);

            // Inisialisasi array kosong untuk menampung hasil konversi
            $konversi = [];

            // Loop setiap digit dalam angka
            foreach (str_split($angkaStr) as $digit) {
                // Masukkan teks yang sesuai dengan digit ke dalam array hasil
                $konversi[] = $angkaHuruf[$digit];
            }

            // Gabungkan hasil menjadi string dengan spasi antar kata
            $hasil[] = implode(' ', $konversi);
        }

        return $hasil;
    }

    public function searchK3(Request $request) {
        if($request->ajax()) {

            $user = Auth::user();

            $materials = DB::table('dpb_suratjalan')
                ->join('daftar_material', 'dpb_suratjalan.id_dpb_suratjalan', '=', 'daftar_material.id_dpb_suratjalan')
                ->join('material', 'daftar_material.id_material', '=', 'material.id_material')
                ->join('user', 'user.id_user', '=', 'dpb_suratjalan.id_user')
                ->where('user.id_user', $user->id_user)
                ->where('material.nama','LIKE','%'.$request->search."%")
                ->select(
                    'material.id_material',
                    'material.nama',
                    'material.normalisasi',
                    'material.satuan'
                )
                ->get();

            $results = [];

            if($materials) {
                foreach ($materials as $material) {
                    $results[] = [
                        'id'            => $material->id_material,
                        'nama'          => $material->nama,
                        'normalisasi'   => $material->normalisasi,
                        'satuan'        => $material->satuan
                    ];
                }
            }

            return response()->json(['materials' => $results]);
        }
    }
}
