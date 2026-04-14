import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

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
        },
    },

    plugins: [forms],
};
