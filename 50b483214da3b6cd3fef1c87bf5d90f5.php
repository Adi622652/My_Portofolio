@extends('layouts.admin')

@section('title', 'Tambah Pengguna')

@section('breadcrumb', 'Tambah Pengguna')

@section('content')
<div class="max-w-2xl mx-auto">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-green-dark">Tambah Pengguna</h1>
        <a href="{{ route('admin.pengguna.index') }}" class="text-gray-600 hover:text-green-medium transition-colors">
            &larr; Kembali
        </a>
    </div>
    
    <!-- Form -->
    <form action="{{ route('admin.pengguna.store') }}" method="POST" class="bg-white rounded-xl shadow-sm overflow-hidden">
        @csrf
        
        <div class="p-6 space-y-6">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-medium focus:ring-1 focus:ring-green-medium @error('name') border-red-500 @enderror">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-medium focus:ring-1 focus:ring-green-medium @error('email') border-red-500 @enderror">
                @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            
            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password <span class="text-red-500">*</span></label>
                <input type="password" name="password" id="password" required minlength="8" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-medium focus:ring-1 focus:ring-green-medium @error('password') border-red-500 @enderror">
                <p class="text-gray-500 text-xs mt-1">Minimal 8 karakter</p>
                @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            
            <!-- Password Confirmation -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password <span class="text-red-500">*</span></label>
                <input type="password" name="password_confirmation" id="password_confirmation" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-medium focus:ring-1 focus:ring-green-medium">
            </div>
            
            <!-- Role -->
            <div>
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select name="role" id="role" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-green-medium focus:ring-1 focus:ring-green-medium bg-gray-100" disabled>
                    <option value="admin" selected>Admin</option>
                </select>
                <p class="text-gray-500 text-xs mt-1">Hanya dapat menambahkan pengguna dengan role Admin</p>
            </div>
        </div>
        
        <!-- Buttons -->
        <div class="px-6 py-4 bg-gray-50 flex items-center justify-end space-x-4">
            <a href="{{ route('admin.pengguna.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-white transition-colors">
                Batal
            </a>
            <button type="submit" class="px-6 py-2 bg-green-medium text-white rounded-lg font-medium hover:bg-green-dark transition-colors">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
