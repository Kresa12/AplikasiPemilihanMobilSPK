/** @type {import('tailwindcss').Config} */
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'beige-light': '#f5efe6',      // Latar belakang section layanan
                'beige-dark': '#d1bfae',       // Latar belakang section fitur
                'brown-dark': '#4a3f35',       // Warna teks dan ikon utama
            },
        },
    },

    plugins: [forms],
};
