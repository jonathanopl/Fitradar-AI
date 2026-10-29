<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HealthData;
use App\Models\User;

class ProfileController extends Controller
{
    // Menampilkan halaman edit profil Laravel
    public function edit()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $healthData = HealthData::where('user_id', $user->id)->first();

        return view('halaman-profil', compact('user', 'healthData'));
    }

    // Update nama user (form Laravel /profile)
    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->update($data);

        return back()->with('status', 'profile-updated');
    }

    // Hapus akun user
    public function destroy(Request $request)
    {
        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect('/')->with('status', 'Akun berhasil dihapus.');
    }

    // Fungsi redirect ke halaman selanjutnya (opsional)
    public function next()
    {
        return redirect()->route('halaman-selanjutnya');
    }

    // Menyimpan data dari halaman-profil (POST /halaman-profil)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'nullable|in:male,female',
            'day' => 'required|integer|min:1|max:31',
            'month' => 'required|integer|min:1|max:12',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'height' => 'required|numeric|min:0',
            'weight' => 'required|numeric|min:0',
        ]);

        // Update nama user
        $user = Auth::user();
        $user->update(['name' => $request->name]);

        // Hitung BMI
        $bmi = 0;
        if ($request->height > 0) {
            $bmi = $request->weight / pow(($request->height / 100), 2);
        }

        // Simpan ke HealthData
        HealthData::updateOrCreate(
            ['user_id' => $user->id],
            [
                'gender' => $request->gender,
                'birthdate' => sprintf('%04d-%02d-%02d', $request->year, $request->month, $request->day),
                'height' => $request->height,
                'weight' => $request->weight,
                'bmi' => $bmi,
                'name' => $request->name,
            ]
        );

        // Update data user di sesi agar nama langsung tampil
        Auth::setUser($user->fresh());

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
