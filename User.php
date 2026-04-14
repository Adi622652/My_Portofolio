<?php

namespace App\Http\Controllers;

use App\Models\Subak;
use Illuminate\Http\Request;

class SubakController extends Controller
{
    public function index(Request $request)
    {
        $kabupaten = $request->get('kabupaten');
        $search = $request->get('search');

        $subaks = Subak::query()
            ->when($kabupaten, fn($q) => $q->where('kabupaten', $kabupaten))
            ->when($search, fn($q) => $q->where('nama', 'like', "%$search%"))
            ->paginate(12)
            ->withQueryString();

        $kabupatens = [
            'Tabanan', 'Gianyar', 'Badung', 'Denpasar',
            'Buleleng', 'Karangasem', 'Klungkung', 'Bangli', 'Jembrana'
        ];

        return view('pages.subak.index', compact('subaks', 'kabupatens', 'kabupaten', 'search'));
    }

    public function show($slug)
    {
        $subak = Subak::where('slug', $slug)->firstOrFail();
        
        $prevSubak = Subak::where('id', '<', $subak->id)->orderBy('id', 'desc')->first();
        $nextSubak = Subak::where('id', '>', $subak->id)->orderBy('id', 'asc')->first();

        return view('pages.subak.show', compact('subak', 'prevSubak', 'nextSubak'));
    }
}
