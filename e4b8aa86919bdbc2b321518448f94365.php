<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'Platform digital untuk mendata dan menyajikan informasi sistem irigasi tradisional Subak di Bali, Warisan Budaya UNESCO sejak 2012.')">
    <meta name="keywords" content="Subak, Bali, Irigasi, UNESCO, Warisan Budaya, Pertanian, Padi">
    <meta name="author" content="Subak Bali">
    
    <title>@yield('title', 'Subak Bali') - Platform Digital Pelestarian Subak</title>
    
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
        html { scroll-behavior: smooth; }
        body { font-family: 'Poppins', system-ui, sans-serif; line-height: 1.7; }
        .navbar-scrolled { background-color: #1C3A1A; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); }
        .navbar-transparent { background-color: transparent; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #2D5A27; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #1C3A1A; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up { animation: fadeInUp 0.6s ease-out; }
        .card-hover { transition: all 0.3s ease-in-out; }
        .card-hover:hover { box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); transform: translateY(-4px); }
    </style>
    
    @stack('styles')
</head>
<body class="bg-white text-gray-800">
    <!-- Navbar -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 navbar-transparent transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center space-x-2">
                    <i class="fa-solid fa-leaf text-2xl text-green-pale"></i>
                    <span class="text-white font-bold text-xl uppercase tracking-wider">Subak Bali</span>
                </a>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="text-white hover:text-green-pale transition-colors {{ request()->routeIs('home') ? 'text-green-pale font-semibold' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="text-white hover:text-green-pale transition-colors {{ request()->routeIs('about') ? 'text-green-pale font-semibold' : '' }}">Tentang</a>
                    <a href="{{ route('subak.index') }}" class="text-white hover:text-green-pale transition-colors {{ request()->routeIs('subak.*') ? 'text-green-pale font-semibold' : '' }}">Data Subak</a>
                    <a href="{{ route('contact') }}" class="text-white hover:text-green-pale transition-colors {{ request()->routeIs('contact') ? 'text-green-pale font-semibold' : '' }}">Kontak</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-white focus:outline-none">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-green-dark shadow-2xl">
            <div class="px-4 py-6 space-y-4">
                <a href="{{ route('home') }}" class="flex items-center space-x-3 text-white hover:text-green-pale py-2 {{ request()->routeIs('home') ? 'text-green-pale font-semibold' : '' }}">
                    <i class="fa-solid fa-house w-6"></i>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('about') }}" class="flex items-center space-x-3 text-white hover:text-green-pale py-2 {{ request()->routeIs('about') ? 'text-green-pale font-semibold' : '' }}">
                    <i class="fa-solid fa-info-circle w-6"></i>
                    <span>Tentang</span>
                </a>
                <a href="{{ route('subak.index') }}" class="flex items-center space-x-3 text-white hover:text-green-pale py-2 {{ request()->routeIs('subak.*') ? 'text-green-pale font-semibold' : '' }}">
                    <i class="fa-solid fa-database w-6"></i>
                    <span>Data Subak</span>
                </a>
                <a href="{{ route('contact') }}" class="flex items-center space-x-3 text-white hover:text-green-pale py-2 {{ request()->routeIs('contact') ? 'text-green-pale font-semibold' : '' }}">
                    <i class="fa-solid fa-envelope w-6"></i>
                    <span>Kontak</span>
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Flash Messages -->
    @if(session('success'))
        <div class="flash-message fixed top-24 right-4 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg animate-fade-in-up flex items-center space-x-3">
            <i class="fa-solid fa-check-circle text-xl"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif
    
    @if(session('error'))
        <div class="flash-message fixed top-24 right-4 z-50 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg animate-fade-in-up flex items-center space-x-3">
            <i class="fa-solid fa-exclamation-circle text-xl"></i>
            <span>{{ session('error') }}</span>
        </div>
    @endif
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>
    
    <!-- Footer -->
    <footer class="bg-green-dark text-white border-t border-green-medium/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Column 1: Logo & Description -->
                <div class="space-y-6">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-leaf text-3xl text-green-pale"></i>
                        <span class="font-bold text-2xl uppercase tracking-wider">Subak Bali</span>
                    </div>
                    <p class="text-gray-300 text-sm leading-relaxed max-w-sm">
                        Platform digital pelestarian sistem irigasi tradisional Subak Bali, Warisan Budaya UNESCO sejak 2012. Menghubungkan tradisi dengan teknologi untuk masa depan pertanian Bali.
                    </p>
                </div>
                
                <!-- Column 2: Quick Links -->
                <div>
                    <h3 class="font-bold text-lg mb-6 border-b border-green-medium/30 pb-2 inline-block">Navigasi Cepat</h3>
                    <ul class="space-y-4">
                        <li><a href="{{ route('home') }}" class="group flex items-center text-gray-300 hover:text-green-pale transition-colors text-sm">
                            <i class="fa-solid fa-chevron-right text-[10px] mr-2 group-hover:translate-x-1 transition-transform"></i>
                            Beranda
                        </a></li>
                        <li><a href="{{ route('about') }}" class="group flex items-center text-gray-300 hover:text-green-pale transition-colors text-sm">
                            <i class="fa-solid fa-chevron-right text-[10px] mr-2 group-hover:translate-x-1 transition-transform"></i>
                            Tentang Subak
                        </a></li>
                        <li><a href="{{ route('subak.index') }}" class="group flex items-center text-gray-300 hover:text-green-pale transition-colors text-sm">
                            <i class="fa-solid fa-chevron-right text-[10px] mr-2 group-hover:translate-x-1 transition-transform"></i>
                            Data Subak
                        </a></li>
                        <li><a href="{{ route('contact') }}" class="group flex items-center text-gray-300 hover:text-green-pale transition-colors text-sm">
                            <i class="fa-solid fa-chevron-right text-[10px] mr-2 group-hover:translate-x-1 transition-transform"></i>
                            Kontak
                        </a></li>
                    </ul>
                </div>
                
                <!-- Column 3: Contact -->
                <div>
                    <h3 class="font-bold text-lg mb-6 border-b border-green-medium/30 pb-2 inline-block">Hubungi Kami</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-4">
                            <div class="w-8 h-8 rounded-md flex items-center justify-center text-green-pale shrink-0 mt-0.5">
                                <i class="fa-solid fa-phone text-xs"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-widest text-green-light mb-1">Telepon / WA</p>
                                <p class="text-white font-medium">087759035322</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-8 h-8 rounded-md flex items-center justify-center text-green-pale shrink-0 mt-0.5">
                                <i class="fa-solid fa-envelope text-xs"></i>
                            </div>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-widest text-green-light mb-1">Email</p>
                                <p class="text-white font-medium text-xs">putra.2308561035@student.unud.ac.id</p>
                            </div>
                        </li>
                        <li class="flex items-start space-x-4">
                            <div class="w-8 h-8 rounded-md flex items-center justify-center text-green-pale shrink-0 mt-0.5">
                                <i class="fa-solid fa-location-dot text-xs"></i>
                            </div>
                            <div>
                                <p class="text-[10px] uppercase text-gray-500 font-bold mb-0.5">Alamat</p>
                                <p class="text-sm text-gray-300">Bali, Indonesia</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-green-medium/30 mt-12 pt-8 text-center">
                <p class="text-gray-500 text-xs">
                    &copy; 2026 Subak Bali. by <span class="text-green-medium font-bold">I Gusti Ketut Ngurah Adi Putra</span>
                </p>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script>
        // Navbar scroll effect
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.getElementById('navbar');
            
            if (navbar) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 50) {
                        navbar.classList.add('navbar-scrolled');
                        navbar.classList.remove('navbar-transparent');
                    } else {
                        navbar.classList.add('navbar-transparent');
                        navbar.classList.remove('navbar-scrolled');
                    }
                });
            }
            
            // Mobile menu toggle
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', function() {
                    mobileMenu.classList.toggle('hidden');
                });
            }
            
            // Flash message auto dismiss
            const flashMessages = document.querySelectorAll('.flash-message');
            flashMessages.forEach(function(message) {
                setTimeout(function() {
                    message.style.opacity = '0';
                    setTimeout(function() {
                        message.remove();
                    }, 300);
                }, 3000);
            });
        });
    </script>
    
    @stack('scripts')
</body>
</html>
