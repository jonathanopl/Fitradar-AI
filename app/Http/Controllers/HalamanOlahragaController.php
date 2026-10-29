<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\HealthData;
use App\Models\RekomendasiOlahraga;

class HalamanOlahragaController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        Log::info('Masuk ke HalamanOlahragaController@index dengan userId: ' . $userId);

        // Mengambil data kesehatan pengguna
        $healthData = Auth::user()->healthData;

        // Jika data kesehatan belum ada, arahkan ke halaman profil
        if (!$healthData) {
            Log::warning('Health data belum ditemukan untuk userId: ' . $userId);
            return redirect()->route('halaman-profil')->with('error', 'Lengkapi profil terlebih dahulu.');
        }

        $today = Carbon::today()->toDateString();

        // Cek apakah sudah ada rekomendasi untuk hari ini
        $rekomendasiHariIni = RekomendasiOlahraga::where('user_id', $userId)
            ->where('tanggal', $today)
            ->get();

        $lastUpdatedProfile = Carbon::parse($healthData->updated_at);
        $lastRecommendationCreated = Carbon::parse($rekomendasiHariIni->first()->created_at ?? '1970-01-01');

        // Jika profil diperbarui setelah rekomendasi dibuat, hapus rekomendasi lama dan buat yang baru
        if ($lastUpdatedProfile->gt($lastRecommendationCreated)) {
            // Hapus rekomendasi lama
            RekomendasiOlahraga::where('user_id', $userId)
                ->where('tanggal', $today)
                ->delete();

            // Generate rekomendasi baru
            return $this->generateRecommendations($healthData, $userId, $today);
        } else {
            // Tampilkan rekomendasi yang sudah ada
            return view('halaman-olahraga', ['rekomendasi' => $rekomendasiHariIni]);
        }
    }

    public function generateRecommendations($healthData, $userId, $today)
    {
        $gender = $healthData->gender ?? 'Laki-laki';
        $weight = $healthData->weight > 0 ? $healthData->weight : 60;
        $height = $healthData->height > 0 ? $healthData->height : 165;
        $birthdate = $healthData->birthdate ?? Carbon::now()->subYears(20)->toDateString();

        $payload = [
            'weight' => round((float) $weight, 2),
            'height' => round((float) $height, 2),
            'gender' => (string) $gender,
            'birthdate' => Carbon::parse($birthdate)->toDateString(),
        ];

        try {
            // Ganti URL ke port 5001
            $response = Http::post('http://127.0.0.1:5000/', $payload);

            if ($response->failed()) {
                return redirect()->back()->with('error', 'Gagal mendapatkan rekomendasi olahraga dari AI.');
            }

            $hasil = $response->json();

            // Simpan rekomendasi olahraga baru
            foreach ($hasil as $olahraga) {
                RekomendasiOlahraga::create([
                    'user_id' => $userId,
                    'tanggal' => $today,
                    'nama' => $olahraga['nama'],
                    'deskripsi' => $olahraga['deskripsi'],
                ]);
            }

            // Ambil rekomendasi baru yang telah disimpan
            $dataBaru = RekomendasiOlahraga::where('user_id', $userId)
                ->where('tanggal', $today)
                ->get();

            return view('halaman-olahraga', ['rekomendasi' => $dataBaru]);
        } catch (\Exception $e) {
            Log::error('Kesalahan API/DB: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mendapatkan rekomendasi olahraga.');
        }
    }
}
