<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Subak Bali</title>
    
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
    
    <style>
        body { font-family: 'Poppins', system-ui, sans-serif; }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center relative">
    <!-- Background Image -->
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1518548419970-58e3b4079ab2?w=1920" alt="Sawah Bali" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-green-dark/80"></div>
    </div>
    
    <!-- Login Card -->
    <div class="relative z-10 w-full max-w-md px-4">
        <div class="bg-white rounded-2xl shadow-xl p-8 border border-white/20">
            <!-- Logo -->
            <div class="text-center mb-8">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <i class="fa-solid fa-leaf text-4xl text-green-medium"></i>
                    <span class="text-2xl font-bold text-green-dark">Subak Admin</span>
                </div>
                <p class="text-gray-500 text-sm">Masuk untuk mengelola data Subak</p>
            </div>
            
            <!-- Error Messages -->
            @if($errors->any())
                <div class="bg-red-50 border border-red-100 text-red-600 px-4 py-3 rounded-lg mb-6">
                    <ul class="list-disc list-inside text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!-- Login Form -->
            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                
                <div class="mb-5">
                    <label for="email" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 px-1">Email Address</label>
                    <div class="relative">
                        <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="email" name="email" id="email" required value="{{ old('email') }}" class="w-full border border-gray-200 rounded-xl px-11 py-3.5 focus:outline-none focus:border-green-medium focus:ring-4 focus:ring-green-medium/10 transition-all text-sm" placeholder="admin@subakbali.com">
                    </div>
                </div>
                
                <div class="mb-8">
                    <label for="password" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2 px-1">Password</label>
                    <div class="relative">
                        <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                        <input type="password" name="password" id="password" required class="w-full border border-gray-200 rounded-xl px-11 py-3.5 pr-11 focus:outline-none focus:border-green-medium focus:ring-4 focus:ring-green-medium/10 transition-all text-sm" placeholder="••••••••">
                        <button type="button" onclick="togglePassword()" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-green-medium transition-colors">
                            <i id="eye-icon" class="fa-solid fa-eye text-sm"></i>
                        </button>
                    </div>
                </div>
                
                <button type="submit" class="w-full bg-green-medium text-white py-4 rounded-xl font-bold hover:bg-green-dark hover:-translate-y-0.5 transition-all shadow-lg shadow-green-medium/20">
                    Sign In
                </button>
            </form>
            
            <!-- Back to Home -->
            <div class="mt-8 text-center pt-6 border-t border-gray-100">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-green-medium text-sm font-medium transition-colors">
                    <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
    
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
