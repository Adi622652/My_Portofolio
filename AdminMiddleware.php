<?php

namespace App\Http\Controllers;

use App\Models\Subak;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestSubaks = Subak::latest()->take(6)->get();
        $totalSubaks = Subak::count();
        $totalKabupaten = Subak::distinct('kabupaten')->count('kabupaten');
        $totalLuas = Subak::sum('luas_subak');
        
        return view('pages.home', compact('latestSubaks', 'totalSubaks', 'totalKabupaten', 'totalLuas'));
    }
}
