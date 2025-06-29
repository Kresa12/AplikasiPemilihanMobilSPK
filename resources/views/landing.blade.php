<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoPilot Drive - Rekomendasi Mobil Terbaik Anda</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .bg-hero-gradient {
            background: linear-gradient(to right, rgba(29, 78, 216, 0.8), rgba(6, 182, 212, 0.6)), url('{{ asset('images/hero-car.jpg') }}') no-repeat center center;
            background-size: cover;
        }
        .text-gradient-primary {
            background: linear-gradient(to right, #FFA726, #FFCA28); /* Orange to Yellow */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            color: transparent;
        }
        .btn-primary {
            background-image: linear-gradient(to right, #FFA726, #FFCA28);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-image: linear-gradient(to right, #FFB74D, #FFE082);
            box-shadow: 0 4px 15px rgba(255, 167, 38, 0.4);
        }
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100">

    <div id="home" class="relative bg-hero-gradient min-h-screen flex flex-col">
        <header class="fixed w-full z-50 bg-gray-900 bg-opacity-80 backdrop-blur-md shadow-lg">
            <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                <a href="{{ route('landing') }}" class="text-3xl font-extrabold text-white tracking-wider">
                    Auto<span class="text-gradient-primary">Drive</span>
                </a>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-gray-200 hover:text-white transition-colors duration-300">Beranda</a>
                    <a href="#features" class="text-gray-200 hover:text-white transition-colors duration-300">Fitur</a>
                    <a href="#how-it-works" class="text-gray-200 hover:text-white transition-colors duration-300">Cara Kerja</a>
                    <a href="#contact" class="text-gray-200 hover:text-white transition-colors duration-300">Kontak</a>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-5 py-2 border border-white text-white rounded-full hover:bg-white hover:text-gray-900 transition-all duration-300 font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2 text-white hover:text-gray-200 transition-colors duration-300 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="btn-primary text-gray-900 px-6 py-2 rounded-full font-semibold shadow-lg">Daftar</a>
                    @endauth
                </div>
                <button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </nav>
            <div id="mobile-menu" class="hidden md:hidden bg-gray-800 bg-opacity-90 py-4 text-center">
                <a href="#home" class="block py-2 text-gray-200 hover:text-white transition-colors duration-300">Beranda</a>
                <a href="#features" class="block py-2 text-gray-200 hover:text-white transition-colors duration-300">Fitur</a>
                <a href="#how-it-works" class="block py-2 text-gray-200 hover:text-white transition-colors duration-300">Cara Kerja</a>
                <a href="#contact" class="block py-2 text-gray-200 hover:text-white transition-colors duration-300">Kontak</a>
                <div class="mt-4 flex flex-col space-y-2 px-4">
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-5 py-2 border border-white text-white rounded-full hover:bg-white hover:text-gray-900 transition-all duration-300 font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2 text-white hover:text-gray-200 transition-colors duration-300 font-medium">Login</a>
                        <a href="{{ route('register') }}" class="btn-primary text-gray-900 px-6 py-2 rounded-full font-semibold shadow-lg">Daftar</a>
                    @endauth
                </div>
            </div>
        </header>

        <main class="flex-grow flex items-center justify-center text-center px-6 py-20">
            <div class="max-w-4xl">
                <h1 class="text-5xl md:text-7xl font-extrabold leading-tight text-white drop-shadow-xl">
                    Temukan Rekomendasi Mobil <span class="text-gradient-primary">Sesuai Gaya Anda</span>
                </h1>
                <p class="mt-6 text-lg md:text-xl text-gray-200 drop-shadow-lg">
                    Sistem Pendukung Keputusan berbasis Weighted Product membantu Anda memilih mobil idaman dari ribuan pilihan, berdasarkan preferensi pribadi Anda.
                </p>
                <div class="mt-10">
                    <a href="{{ route('mobils.index') }}" class="btn-primary inline-block px-10 py-4 text-gray-900 font-bold text-lg rounded-full shadow-2xl hover:scale-105 transform duration-300">
                        Mulai Cari Sekarang!
                    </a>
                </div>
            </div>
        </main>
    </div>

    <section id="features" class="py-20 bg-gray-50 text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold mb-4">Mengapa AutoDrive?</h2>
            <p class="text-gray-600 mb-16 max-w-3xl mx-auto text-lg">
                Kami mengubah kerumitan mencari mobil menjadi pengalaman yang mudah dan menyenangkan dengan fitur-fitur unggulan kami.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                <div class="feature-card bg-white p-8 rounded-xl shadow-lg border border-gray-200">
                    <div class="flex justify-center mb-6">
                        <svg class="w-20 h-20 text-blue-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.525.322 1.018.847 1.25 1.724z"></path><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Bobot Kriteria Fleksibel</h3>
                    <p class="text-gray-700">Sesuaikan bobot untuk harga, performa, fitur, dan lainnya. Hasil rekomendasi akan disesuaikan dengan prioritas unik Anda.</p>
                </div>
                <div class="feature-card bg-white p-8 rounded-xl shadow-lg border border-gray-200">
                    <div class="flex justify-center mb-6">
                        <svg class="w-20 h-20 text-green-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125l5.25 4.5 9.75-8.25m-14.25-3V11.25m0-4.5h.008v.008H3v-.008Zm0 0h.008v.008H3v-.008Zm0 0h.008v.008H3v-.008Z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Perhitungan Akurat WP</h3>
                    <p class="text-gray-700">Manfaatkan metode Weighted Product untuk perbandingan yang objektif dan hasil yang dapat dipertanggungjawabkan.</p>
                </div>
                <div class="feature-card bg-white p-8 rounded-xl shadow-lg border border-gray-200">
                    <div class="flex justify-center mb-6">
                        <svg class="w-20 h-20 text-yellow-600" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.079 0-2.157.17-3.203.515A11.968 11.968 0 0 0 2.5 12c0 2.854.664 5.54 1.853 7.945a.5.5 0 0 0 .58.115 12.025 12.025 0 0 0 7.182-1.9m10.5-1.875a9 9 0 1 0-18 0m18 0v.385A11.968 11.968 0 0 1 18 12c0 2.97-.942 5.727-2.614 7.5a.5.5 0 0 0 .094.619A12.003 12.003 0 0 0 21.5 12h-1.875c-.34-.962-.596-1.986-.723-3.048Z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-bold mb-3">Interface Intuitif</h3>
                    <p class="text-gray-700">Desain yang bersih dan navigasi yang mudah membuat proses pencarian mobil Anda menjadi pengalaman yang mulus.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="how-it-works" class="py-20 bg-blue-700 text-white text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold mb-4">Bagaimana Cara Kerjanya?</h2>
            <p class="text-blue-100 mb-16 max-w-3xl mx-auto text-lg">
                Hanya dalam beberapa langkah sederhana, Anda akan mendapatkan rekomendasi mobil yang paling sesuai.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="flex flex-col items-center p-8 bg-blue-800 rounded-xl shadow-lg">
                    <div class="text-5xl font-extrabold text-gradient-primary mb-4">1</div>
                    <h3 class="text-2xl font-bold mb-3">Atur Preferensi Anda</h3>
                    <p class="text-blue-200">Login dan sesuaikan bobot untuk setiap kriteria seperti harga, performa, dan fitur.</p>
                </div>
                <div class="flex flex-col items-center p-8 bg-blue-800 rounded-xl shadow-lg">
                    <div class="text-5xl font-extrabold text-gradient-primary mb-4">2</div>
                    <h3 class="text-2xl font-bold mb-3">Lihat Perbandingan</h3>
                    <p class="text-blue-200">Sistem akan secara otomatis memproses data mobil dan kriteria Anda.</p>
                </div>
                <div class="flex flex-col items-center p-8 bg-blue-800 rounded-xl shadow-lg">
                    <div class="text-5xl font-extrabold text-gradient-primary mb-4">3</div>
                    <h3 class="text-2xl font-bold mb-3">Dapatkan Rekomendasi</h3>
                    <p class="text-blue-200">Lihat daftar mobil yang direkomendasikan, diurutkan berdasarkan kesesuaian dengan Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gray-900 text-white text-center">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold mb-4">Siap Temukan Mobil Impian Anda?</h2>
            <p class="text-gray-300 mb-8 max-w-2xl mx-auto text-lg">
                Bergabunglah dengan ribuan pengguna yang telah menemukan mobil sempurna mereka. Proses mudah, hasil akurat.
            </p>
            <a href="{{ route('register') }}" class="btn-primary inline-block px-10 py-4 text-gray-900 font-bold text-xl rounded-full shadow-2xl hover:scale-105 transform duration-300">
                Daftar Gratis Sekarang!
            </a>
        </div>
    </section>

    <footer id="contact" class="bg-gray-950 text-gray-300 py-12">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="text-center md:text-left">
                <h3 class="text-2xl font-bold text-white mb-4">Auto<span class="text-gradient-primary">Drive</span></h3>
                <p class="text-sm leading-relaxed">Platform terdepan untuk rekomendasi mobil berbasis Sistem Pendukung Keputusan yang objektif dan personal.</p>
            </div>
            <div class="text-center md:text-left">
                <h4 class="text-xl font-semibold text-white mb-4">Navigasi Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="#home" class="hover:text-white transition-colors duration-300">Beranda</a></li>
                    <li><a href="#features" class="hover:text-white transition-colors duration-300">Fitur</a></li>
                    <li><a href="#how-it-works" class="hover:text-white transition-colors duration-300">Cara Kerja</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-white transition-colors duration-300">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-white transition-colors duration-300">Daftar</a></li>
                </ul>
            </div>
            <div class="text-center md:text-left">
                <h4 class="text-xl font-semibold text-white mb-4">Hubungi Kami</h4>
                <p class="text-sm">Email: <a href="mailto:support@autodrive.com" class="hover:text-white transition-colors duration-300">support@autodrive.com</a></p>
                <p class="text-sm mt-2">Alamat: Jl. Contoh No. 123, Kota Anda, Kode Pos 12345</p>
                <div class="mt-4 flex justify-center md:justify-start space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33V22C17.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg></a>
                    <a href="#" class="text-gray-400 hover:text-white"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.459 3.093l2.84 2.842a.75.75 0 0 1-.53 1.28H9.231a.75.75 0 0 1-.53-1.28l2.84-2.842a.75.75 0 0 1 1.06 0ZM12 6.5a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-1.5 0V7.25a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" /></svg></a>
                </div>
            </div>
        </div>
        <div class="text-center mt-10 border-t border-gray-700 pt-6">
            <p class="text-sm text-gray-500">© {{ date('Y') }} AutoDrive. All rights reserved.</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function () {
                mobileMenu.classList.toggle('hidden');
            });

            // Close mobile menu when a link is clicked
            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });
        });
    </script>
</body>
</html>