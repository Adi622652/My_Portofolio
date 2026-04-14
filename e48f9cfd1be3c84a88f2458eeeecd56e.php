<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Subak Bali Admin</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'green-dark': '#1C3A1A',
                        'green-medium': '#2D5A27',
                        'green-light': '#4A7C40',
                        'green-pale': '#C0DD97',
                        'green-bg': '#EAF3DE',
                        'cream': '#F5F0E8',
                        'brown': '#6B4226',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- Custom Styles -->
    <style>
        body { font-family: 'Poppins', system-ui, sans-serif; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #2D5A27; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #1C3A1A; }
    </style>
    
    @stack('styles')
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-green-dark text-white flex flex-col fixed h-full z-20">
            <!-- Logo -->
            <div class="p-6 border-b border-green-medium">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <i class="fa-solid fa-leaf text-2xl text-green-pale"></i>
                    <span class="font-bold text-lg uppercase tracking-wider">Subak Admin</span>
                </a>
            </div>
            
            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-green-medium text-green-pale shadow-inner' : 'text-white hover:bg-green-medium hover:pl-5' }}">
                    <i class="fa-solid fa-gauge-high w-5 text-center"></i>
                    <span>Dashboard</span>
                </a>
                
                <a href="{{ route('admin.subak.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.subak.*') ? 'bg-green-medium text-green-pale shadow-inner' : 'text-white hover:bg-green-medium hover:pl-5' }}">
                    <i class="fa-solid fa-database w-5 text-center"></i>
                    <span>Data Subak</span>
                </a>
                
                @if(auth()->user()->isSuperAdmin())
                <a href="{{ route('admin.pengguna.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg transition-all {{ request()->routeIs('admin.pengguna.*') ? 'bg-green-medium text-green-pale shadow-inner' : 'text-white hover:bg-green-medium hover:pl-5' }}">
                    <i class="fa-solid fa-users-gear w-5 text-center"></i>
                    <span>Kelola Pengguna</span>
                </a>
                @endif
            </nav>
            
            <!-- User Info & Logout -->
            <div class="p-4 border-t border-green-medium">
                <div class="flex items-center space-x-3 mb-6 px-2">
                    <div class="w-10 h-10 rounded-lg bg-green-medium flex items-center justify-center text-white font-bold shadow-md">
                        {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-bold truncate">{{ auth()->user()->name }}</p>
                        <p class="text-[10px] uppercase text-green-pale font-bold tracking-widest">{{ auth()->user()->role }}</p>
                    </div>
                </div>
                
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-red-300 hover:text-white hover:bg-red-500/20 transition-all w-full text-left">
                        <i class="fa-solid fa-right-from-bracket w-5 text-center"></i>
                        <span class="text-sm font-semibold">Logout</span>
                    </button>
                </form>
            </div>
        </aside>
        
        <!-- Main Content -->
        <div class="flex-1 ml-64">
            <!-- Topbar -->
            <header class="bg-white shadow-sm sticky top-0 z-10 border-b border-gray-100">
                <div class="flex justify-between items-center px-8 py-4">
                    <div class="flex items-center space-x-4">
                        <button id="sidebar-toggle" class="lg:hidden text-gray-600">
                            <i class="fa-solid fa-bars text-xl"></i>
                        </button>
                        <nav id="breadcrumb" class="text-xs font-semibold uppercase tracking-widest text-gray-400 flex items-center space-x-2">
                            <i class="fa-solid fa-house-chimney text-[10px]"></i>
                            <span class="text-gray-300">/</span>
                            @yield('breadcrumb', 'Dashboard')
                        </nav>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2 text-sm font-medium text-gray-600 bg-gray-50 px-3 py-1.5 rounded-full">
                            <i class="fa-solid fa-circle-user text-green-medium"></i>
                            <span>Halo, {{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Flash Messages -->
            @if(session('success'))
                <div class="flash-message mx-8 mt-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="flash-message mx-8 mt-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
                    {{ session('error') }}
                </div>
            @endif
            
            <!-- Page Content -->
            <main class="p-8">
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- Scripts -->
    <script>
        // Flash message auto dismiss
        document.addEventListener('DOMContentLoaded', function() {
            const flashMessages = document.querySelectorAll('.flash-message');
            flashMessages.forEach(function(message) {
                setTimeout(function() {
                    message.style.opacity = '0';
                    message.style.transition = 'opacity 0.3s';
                    setTimeout(function() {
                        message.remove();
                    }, 300);
                }, 3000);
            });
        });
        
        // Confirm delete
        function confirmDelete(message) {
            return confirm(message || 'Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>
    
    @stack('scripts')
</body>
</html>
