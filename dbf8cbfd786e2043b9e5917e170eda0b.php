@extends('layouts.admin')

@section('title', 'Kelola Data Subak')

@section('breadcrumb', 'Data Subak')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <h1 class="text-2xl font-bold text-green-dark mb-4 md:mb-0">Kelola Data Subak</h1>
    <a href="{{ route('admin.subak.create') }}" class="bg-green-medium text-white px-6 py-2.5 rounded-xl font-bold hover:bg-green-dark transition-all shadow-md hover:shadow-lg inline-flex items-center group">
        <i class="fa-solid fa-plus mr-2 group-hover:rotate-90 transition-transform"></i>
        Tambah Subak
    </a>
</div>

<!-- Filter -->
<div class="bg-white rounded-xl shadow-sm p-4 mb-6">
    <form action="{{ route('admin.subak.index') }}" method="GET" class="flex flex-col md:flex-row gap-4">
        <div class="md:w-48">
            <select name="kabupaten" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-medium focus:ring-1 focus:ring-green-medium">
                <option value="">Semua Kabupaten</option>
                @foreach($kabupatens as $kab)
                    <option value="{{ $kab }}" {{ $kabupaten == $kab ? 'selected' : '' }}>{{ $kab }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-1 relative">
            <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama subak..." class="w-full border border-gray-300 rounded-lg px-4 py-2 pr-10 focus:outline-none focus:border-green-medium focus:ring-1 focus:ring-green-medium">
            <button type="submit" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-green-medium transition-colors">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </div>
    </form>
</div>

<!-- Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Subak</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kabupaten</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kecamatan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Luas</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse($subaks as $index => $subak)
                <tr class="hover:bg-cream transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ ($subaks->currentPage() - 1) * $subaks->perPage() + $index + 1 }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($subak->foto_url)
                            <img src="{{ $subak->foto_url }}" alt="{{ $subak->nama }}" class="w-14 h-14 rounded-lg object-cover">
                        @else
                            <div class="w-14 h-14 rounded-xl flex items-center justify-center">
                                <i class="fa-solid fa-image text-gray-300 text-xl"></i>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-dark">{{ $subak->nama }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $subak->kabupaten }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $subak->kecamatan }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $subak->luas_subak }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <div class="flex items-center space-x-2">
                             <a href="{{ route('admin.subak.edit', $subak->id) }}" class="bg-green-medium/10 text-green-medium p-2.5 rounded-xl hover:bg-green-medium hover:text-white transition-all group" title="Edit">
                                <i class="fa-solid fa-pen-to-square text-lg"></i>
                            </a>
                            <form action="{{ route('admin.subak.destroy', $subak->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus subak ini?')">
                                @csrf
                                @method('DELETE')
                                 <button type="submit" class="bg-red-50 text-red-600 p-2.5 rounded-xl hover:bg-red-600 hover:text-white transition-all" title="Hapus">
                                    <i class="fa-solid fa-trash-can text-lg"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-12 text-center text-gray-500">
                        <i class="fa-solid fa-face-frown-open text-6xl text-gray-200 mx-auto mb-4 block"></i>
                        <p class="text-lg font-medium">Tidak ada data subak</p>
                        <p class="text-sm">Silakan tambahkan data subak baru</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    @if($subaks->hasPages())
    <div class="px-6 py-4 border-t border-gray-100">
        {{ $subaks->links() }}
    </div>
    @endif
</div>
@endsection
