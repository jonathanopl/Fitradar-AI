<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\HealthData;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        // Ambil histori berat badan berdasarkan waktu
        $healthData = HealthData::where('user_id', $userId)
            ->orderBy('updated_at', 'asc')
            ->get(['weight', 'updated_at']);

        // Format tanggal untuk chart label
        $labels = $healthData->map(function ($item) {
            return $item->updated_at->format('d M Y H:i');
        });

        // Ambil data berat
        $weights = $healthData->pluck('weight');

        return view('halaman-dashboard', [
            'labels' => $labels,
            'weights' => $weights
        ]);
    }
}
