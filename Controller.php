<?php

namespace App\Http\Controllers;

use App\Models\Subak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminSubakController extends Controller
{
    public function index(Request $request)
    {
        $kabupaten = $request->get('kabupaten');
        $search = $request->get('search');

        $subaks = Subak::query()
            ->when($kabupaten, fn($q) => $q->where('kabupaten', $kabupaten))
            ->when($search, fn($q) => $q->where('nama', 'like', "%$search%"))
            ->paginate(15)
            ->withQueryString();

        $kabupatens = [
            'Tabanan', 'Gianyar', 'Badung', 'Denpasar',
            'Buleleng', 'Karangasem', 'Klungkung', 'Bangli', 'Jembrana'
        ];

        return view('admin.subak.index', compact('subaks', 'kabupatens', 'kabupaten', 'search'));
    }

    public function create()
    {
        $kabupatens = [
            'Tabanan', 'Gianyar', 'Badung', 'Denpasar',
            'Buleleng', 'Karangasem', 'Klungkung', 'Bangli', 'Jembrana'
        ];
        
        $kondisiOptions = ['Baik', 'Cukup Baik', 'Rusak', '-'];
        $kecukupanOptions = ['Cukup', 'Kekurangan', 'Berlebih', 'Kelebihan', 'Baik tercukupi', 'Kurang', 'Melebihi'];

        return view('admin.subak.create', compact('kabupatens', 'kondisiOptions', 'kecukupanOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'desa' => 'required|string|max:100',
            'luas_subak' => 'required|string|max:50',
            'foto' => 'nullable|image|max:2048',
        ]);

        $subak = new Subak($request->except('foto'));

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . Str::slug($subak->nama) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('subak', $filename, 'public');
            $subak->foto = $path;
        }

        $subak->save();

        return redirect()->route('admin.subak.index')->with('success', 'Data Subak berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $subak = Subak::findOrFail($id);
        
        $kabupatens = [
            'Tabanan', 'Gianyar', 'Badung', 'Denpasar',
            'Buleleng', 'Karangasem', 'Klungkung', 'Bangli', 'Jembrana'
        ];
        
        $kondisiOptions = ['Baik', 'Cukup Baik', 'Rusak', '-'];
        $kecukupanOptions = ['Cukup', 'Kekurangan', 'Berlebih', 'Kelebihan', 'Baik tercukupi', 'Kurang', 'Melebihi'];

        return view('admin.subak.edit', compact('subak', 'kabupatens', 'kondisiOptions', 'kecukupanOptions'));
    }

    public function update(Request $request, $id)
    {
        $subak = Subak::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:100',
            'kecamatan' => 'required|string|max:100',
            'desa' => 'required|string|max:100',
            'luas_subak' => 'required|string|max:50',
            'foto' => 'nullable|image|max:2048',
        ]);

        $subak->fill($request->except('foto'));

        if ($request->hasFile('foto')) {
            if ($subak->foto) {
                Storage::disk('public')->delete($subak->foto);
            }
            
            $file = $request->file('foto');
            $filename = time() . '_' . Str::slug($subak->nama) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('subak', $filename, 'public');
            $subak->foto = $path;
        }

        $subak->save();

        return redirect()->route('admin.subak.index')->with('success', 'Data Subak berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $subak = Subak::findOrFail($id);
        
        if ($subak->foto) {
            Storage::disk('public')->delete($subak->foto);
        }
        
        $subak->delete();

        return redirect()->route('admin.subak.index')->with('success', 'Data Subak berhasil dihapus.');
    }
}
