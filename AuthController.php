<?php

namespace App\Http\Controllers;

use App\Models\Subak;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalSubaks = Subak::count();
        $totalKabupaten = Subak::distinct('kabupaten')->count('kabupaten');
        $subakWithFoto = Subak::whereNotNull('foto')->count();
        $subakWithoutFoto = Subak::whereNull('foto')->count();
        
        $latestSubaks = Subak::latest()->take(10)->get();

        return view('admin.dashboard', compact(
            'totalSubaks',
            'totalKabupaten',
            'subakWithFoto',
            'subakWithoutFoto',
            'latestSubaks'
        ));
    }
}
