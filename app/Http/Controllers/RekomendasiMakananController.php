<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Models\RekomendasiMakanan;

class RekomendasiMakananController extends Controller
{
    public function tampilkanRekomendasi()
    {
        $user = Auth::user();
        $healthData = $user->healthdata;

        $usia = $healthData->usia ?? null;
        $preferensi = $user->preferensi_makan ?? 'bebas'; // default jika kosong
        $gender = $healthData->gender ?? 'tidak diketahui'; // default jika kosong

        // Log data yang dikirim ke FastAPI
        Log::info('Data yang dikirim ke FastAPI', [
            'usia' => $usia,
            'preferensi' => $preferensi,
            'gender' => $gender
        ]);

        // Panggil FastAPI
        $response = Http::post('http://127.0.0.1:5001/rekomendasi-makanan', [
            'usia' => $usia,
            'preferensi' => $preferensi,
            'gender' => $gender
        ]);

        // Menangani respon dari FastAPI
        if ($response->successful()) {
            $rekomendasi = $response->json('rekomendasi');
        } else {
            Log::error('Error dari FastAPI', [
                'status_code' => $response->status(),
                'body' => $response->body(),
            ]);
            $rekomendasi = $this->getDefaultRekomendasi();
        }

        return view('halaman-makanan', compact('rekomendasi'));
    }

    public function gantiMakanan(Request $request, $waktu)
    {
        Log::info('Ganti makanan dipanggil', ['waktu' => $waktu, 'user' => Auth::id()]);

        $user = Auth::user();
        $healthData = $user->healthdata;

        $usia = $healthData->usia ?? null;
        $preferensi = $user->preferensi_makan ?? 'bebas';
        $gender = $healthData->gender ?? 'tidak diketahui';

        // Log data yang dikirim ke FastAPI
        Log::info('Data yang dikirim ke FastAPI', [
            'usia' => $usia,
            'preferensi' => $preferensi,
            'gender' => $gender
        ]);

        $response = Http::post('http://127.0.0.1:5001/rekomendasi-makanan', [
            'usia' => $usia,
            'preferensi' => $preferensi,
            'gender' => $gender
        ]);

        if ($response->successful()) {
            $data = $response->json('rekomendasi');
            Log::info('Respon dari FastAPI:', ['response' => $data]);
            return response()->json($data[$waktu] ?? []);
        }

        Log::error('Error dari FastAPI', [
            'status_code' => $response->status(),
            'body' => $response->body(),
        ]);

        return response()->json([
            'nama' => 'Gagal Mengambil Data',
            'deskripsi' => 'API tidak merespon',
            'gambar' => 'default.jpeg',
            'gizi' => []
        ]);
    }

    private function getDefaultRekomendasi()
    {
        return [
            'sarapan' => [
                'nama' => 'Roti Panggang & Telur',
                'deskripsi' => 'Menu sarapan sehat dan praktis.',
                'gambar' => 'default_sarapan.jpeg',
                'gizi' => ['kalori' => 300, 'protein' => 10]
            ],
            'siang' => [
                'nama' => 'Nasi Ayam',
                'deskripsi' => 'Makan siang bergizi dengan protein.',
                'gambar' => 'default_siang.jpeg',
                'gizi' => ['kalori' => 500, 'protein' => 25]
            ],
            'malam' => [
                'nama' => 'Salad & Sup',
                'deskripsi' => 'Menu ringan untuk malam hari.',
                'gambar' => 'default_malam.jpeg',
                'gizi' => ['kalori' => 250, 'protein' => 8]
            ],
        ];
    }
}
