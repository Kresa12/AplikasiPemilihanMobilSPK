<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pabrikan;
use App\Models\Penilaian;
use App\Models\Pembobotan;
use Illuminate\Support\Facades\Auth;

class SpkController extends Controller
{
    public function hitungDanTampilkanHasil()
    {
        $user = Auth::user();

        // 1. Ambil Bobot dari User yang Sedang Login
        $pembobotan = $user->pembobotan;

        if (!$pembobotan) {
            return redirect()->back()->with('error', 'Anda belum mengatur bobot kriteria. Silakan atur bobot terlebih dahulu.');
        }

        // Bobot kriteria sesuai urutan:
        // w1: harga_beli (Cost)
        // w2: fitur (Benefit)
        // w3: model (Benefit)
        // w4: harga_jual (Benefit)
        // w5: nilai_pabrikan (Benefit)
        $bobot = [
            'harga_beli' => $pembobotan->w1,
            'fitur' => $pembobotan->w2,
            'model' => $pembobotan->w3,
            'harga_jual' => $pembobotan->w4,
            'nilai_pabrikan' => $pembobotan->w5,
        ];

        // 2. Normalisasi Bobot
        $totalBobot = array_sum($bobot);
        if ($totalBobot == 0) {
            return redirect()->back()->with('error', 'Total bobot kriteria tidak boleh nol.');
        }

        $normalisasiBobot = [];
        foreach ($bobot as $kriteria => $b) {
            $normalisasiBobot[$kriteria] = $b / $totalBobot;
        }

        // Identifikasi kriteria Cost (harga_beli)
        $kriteriaCost = ['harga_beli'];

        // 3. Ambil Semua Penilaian yang Dilakukan oleh User Ini
        // Eager load mobil dan pabrikan terkait untuk efisiensi
        $penilaians = Penilaian::where('user_id', $user->id)
                                ->with('mobil') // Load data mobil
                                ->get();

        if ($penilaians->isEmpty()) {
            return redirect()->back()->with('error', 'Anda belum melakukan penilaian mobil apapun. Silakan lakukan penilaian terlebih dahulu.');
        }

        $alternatif = []; // Menyimpan data mobil dan nilai WP-nya

        foreach ($penilaians as $penilaian) {
            $mobil = $penilaian->mobil;
            $pabrikan = Pabrikan::find($mobil->pabrikan_id); // Asumsi mobil punya pabrikan_id FK ke tabel pabrikan

            // Pastikan mobil punya relasi ke pabrikan atau ambil nilai pabrikan secara terpisah
            // Jika mobil tidak punya FK pabrikan_id, Anda perlu cara lain untuk mendapatkan nilai pabrikan
            // Saat ini, skema mobil yang Anda berikan tidak ada pabrikan_id
            // JIKA mobil tidak punya pabrikan_id, maka Anda harus:
            // 1. Tambah foreign key pabrikan_id di tabel mobils, ATAU
            // 2. Jika penilaian pabrikan adalah berdasarkan nama mobil/pabrikan, Anda perlu mapping manual

            // Sesuai diskusi sebelumnya, nilai pabrikan diambil dari tabel Pabrikan.
            // AGAR ini bekerja, tabel 'mobils' perlu memiliki foreign key 'pabrikan_id'.
            // Atau Anda perlu cara lain untuk menghubungkan mobil ke pabrikan untuk mendapatkan nilai.
            // Untuk sementara, saya ASUMSIKAN ada `pabrikan_id` di tabel `mobils`.
            // JIKA BELUM, Anda harus menambahkan kolom 'pabrikan_id' di migrasi 'mobils'.
            // Saya akan anggap Anda akan menambahkannya atau menyesuaikan cara pengambilan nilai pabrikan.

            // Ambil nilai kriteria
            $nilaiKriteria = [
                'harga_beli' => $penilaian->harga_beli,
                'fitur' => $penilaian->fitur,
                'model' => $penilaian->model,
                'harga_jual' => $penilaian->harga_jual,
                'nilai_pabrikan' => $pabrikan ? $pabrikan->nilai : 1, // Default 1 jika tidak ditemukan pabrikan
            ];

            // 4. Hitung Vektor S (Product of ratings raised to the power of weights)
            $vectorS = 1;
            foreach ($normalisasiBobot as $kriteria => $bobot_norm) {
                $nilai = $nilaiKriteria[$kriteria];

                // Jika kriteria Cost, bobotnya negatif
                $pangkat = in_array($kriteria, $kriteriaCost) ? -$bobot_norm : $bobot_norm;

                // Pastikan nilai tidak nol untuk menghindari log(0) atau pangkat negatif dari nol
                if ($nilai <= 0) {
                    // Anda bisa memilih untuk mengabaikan, memberikan nilai default kecil, atau throw error
                    // Untuk perhitungan WP, nilai harus > 0.
                    // Jika nilai 0 pada kriteria benefit, berarti sangat buruk. Jika 0 pada cost, sangat baik.
                    // Ini perlu penanganan khusus sesuai kebijakan Anda. Untuk contoh, kita akan abaikan.
                    continue;
                }

                $vectorS *= pow($nilai, $pangkat);
            }

            $alternatif[] = [
                'mobil' => $mobil,
                'vector_s' => $vectorS,
            ];
        }

        // 5. Hitung Vektor V (Relative weights for each alternative) dan Ranking
        $totalVectorS = array_sum(array_column($alternatif, 'vector_s'));

        if ($totalVectorS == 0) {
             return redirect()->back()->with('error', 'Total nilai preferensi (Vector S) adalah nol. Pastikan semua penilaian memiliki nilai yang valid dan bobot kriteria sudah benar.');
        }

        $hasilWP = [];
        foreach ($alternatif as $alt) {
            $vectorV = $alt['vector_s'] / $totalVectorS;
            $hasilWP[] = [
                'mobil' => $alt['mobil'],
                'vector_s' => $alt['vector_s'],
                'vector_v' => $vectorV,
            ];
        }

        // Urutkan berdasarkan vector_v (atau vector_s) dari terbesar ke terkecil
        usort($hasilWP, function ($a, $b) {
            return $b['vector_v'] <=> $a['vector_v'];
        });

        return view('spk.hasil', compact('hasilWP', 'user', 'pembobotan'));
    }
}