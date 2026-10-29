<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PreferensiMakanController extends Controller
{
    public function simpanPreferensiMakan(Request $request)
    {
        // Validasi input preferensi makan
        $request->validate([
            'preferensi_makan' => 'required|in:vegan,vegetarian,pescatarian,bebas_gluten,bebas',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Menyimpan preferensi makan ke database
        $user->preferensi_makan = $request->preferensi_makan;
        $user->save();

        // Redirect dengan pesan sukses setelah berhasil menyimpan data
        return redirect()->route('halaman5')->with('success', 'Preferensi makan disimpan.');
    }
}
    /*
    public function rekomendasiMakanan()
    {
        $user = Auth::user();
        $preferensi = $user->preferensi_makan;

        $rekomendasi = match ($preferensi) {
            'vegan' => ['Salad quinoa', 'Tumis tahu brokoli', 'Smoothie buah', 'Sup lentil'],
            'vegetarian' => ['Omelet sayur', 'Smoothie yogurt & buah', 'Pasta tomat', 'Capcay'],
            'pescatarian' => ['Salmon panggang', 'Tuna salad', 'Sup ikan', 'Nasi merah dan sayur'],
            'bebas_gluten' => ['Ayam panggang & sayuran', 'Nasi merah', 'Salad kentang rebus', 'Sup ayam'],
            'bebas' => ['Nasi ayam', 'Bakso sayur', 'Soto ayam', 'Telur dadar dan nasi'],
            default => ['Silakan pilih preferensi makan terlebih dahulu.'],
        };

        return view('halaman-makanan', compact('rekomendasi'));
    }
    */
