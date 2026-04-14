@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap');

@tailwind base;
@tailwind components;
@tailwind utilities;

@layer base {
    html {
        scroll-behavior: smooth;
    }
    
    body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.7;
    }
}

@layer components {
    .btn-primary {
        @apply bg-green-medium text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 hover:bg-green-dark;
    }
    
    .btn-outline {
        @apply border-2 border-white text-white px-6 py-3 rounded-full font-semibold transition-all duration-300 hover:bg-white hover:text-green-dark;
    }
    
    .card-hover {
        @apply transition-all duration-300 ease-in-out hover:shadow-lg hover:-translate-y-1;
    }
    
    .section-label {
        @apply text-xs font-semibold uppercase tracking-wider text-green-medium mb-2;
    }
    
    .page-header {
        @apply relative min-h-[280px] flex items-end pb-8;
    }
    
    .page-header-overlay {
        @apply absolute inset-0 bg-green-dark/75;
    }
    
    .badge-status-good {
        @apply bg-green-bg text-green-medium px-3 py-1 rounded-full text-xs font-medium;
    }
    
    .badge-status-warning {
        @apply bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs font-medium;
    }
    
    .badge-status-danger {
        @apply bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-medium;
    }
    
    .badge-status-info {
        @apply bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium;
    }
}

@layer utilities {
    .text-shadow {
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }
}

/* Navbar scroll effect */
.navbar-scrolled {
    @apply bg-green-dark shadow-lg;
}

.navbar-transparent {
    @apply bg-transparent;
}

/* Custom scrollbar */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: #2D5A27;
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: #1C3A1A;
}

/* Animation */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fadeInUp 0.6s ease-out;
}

/* Timeline */
.timeline-item::before {
    content: '';
    @apply absolute left-0 top-0 w-4 h-4 rounded-full bg-green-medium border-4 border-white shadow;
}

/* Pagination custom */
.pagination-custom .page-item.active .page-link {
    @apply bg-green-medium text-white border-green-medium;
}

.pagination-custom .page-link {
    @apply text-green-medium hover:bg-green-bg;
}
