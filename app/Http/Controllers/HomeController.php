<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $monthlySales = [120, 190, 80, 150, 100, 90];
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'];

        return view('welcome', [
            'monthlySales' => json_encode($monthlySales),
            'months' => json_encode($months),
        ]);
    }
}