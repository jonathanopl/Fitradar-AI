<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HealthData;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class IsiProfilController extends Controller
{
    public function showProfil()
    {
        $user = Auth::user();
        $healthData = HealthData::where('user_id', $user->id)->first();
        return view('halaman-profil', compact('user', 'healthData'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|in:male,female',
            'day' => 'required|numeric|min:1|max:31',
            'month' => 'required|numeric|min:1|max:12',
            'year' => 'required|numeric|min:1900|max:' . date('Y'),
            'height' => 'required|numeric|min:50|max:300',
            'weight' => 'required|numeric|min:20|max:300',
            'activity_level' => 'required|string|in:low,moderate,high'
        ]);

        $birthdate = sprintf('%04d-%02d-%02d', $validated['year'], $validated['month'], $validated['day']);
        $height = $validated['height'];
        $weight = $validated['weight'];
        $bmi = round($weight / pow($height / 100, 2), 2);

        HealthData::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'name' => $validated['name'],
                'gender' => $validated['gender'] == 'male' ? 'Male' : 'Female',
                'birthdate' => $birthdate,
                'height' => $height,
                'weight' => $weight,
                'bmi' => $bmi,
                'activity_level' => $validated['activity_level'],
            ]
        );

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->name = $validated['name'];
        $user->save();

        return redirect()->route('halaman-selanjutnya')->with('success', 'Profil berhasil disimpan');
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'gender' => 'required|string|in:male,female',
                'day' => 'required|numeric|min:1|max:31',
                'month' => 'required|numeric|min:1|max:12',
                'year' => 'required|numeric|min:1900|max:' . date('Y'),
                'height' => 'required|numeric|min:50|max:300',
                'weight' => 'required|numeric|min:20|max:300',
            ]);

            $birthdate = sprintf('%04d-%02d-%02d', $validated['year'], $validated['month'], $validated['day']);
            $height = $validated['height'];
            $weight = $validated['weight'];
            $bmi = round($weight / pow($height / 100, 2), 2);

            /** @var \App\Models\User $user */
            $user = Auth::user();

            /** @var \App\Models\HealthData $healthData */
            $healthData = HealthData::where('user_id', $user->id)->firstOrFail();

            DB::transaction(function () use ($validated, $birthdate, $height, $weight, $bmi, $user, $healthData) {
                $healthData->update([
                    'name' => $validated['name'],
                    'gender' => $validated['gender'] == 'male' ? 'Male' : 'Female',
                    'birthdate' => $birthdate,
                    'height' => $height,
                    'weight' => $weight,
                    'bmi' => $bmi,
                ]);

                $user->name = $validated['name'];
                $user->save();
            });

            return redirect()->back()->with('success', 'Profil berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error('Error updating profile: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat memperbarui profil. Silakan coba lagi.')
                ->withInput();
        }
    }
}
