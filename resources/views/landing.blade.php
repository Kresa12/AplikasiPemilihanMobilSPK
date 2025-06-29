<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SPK Siswa Teladan - uhuuuy</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600,700,800&display=swap" rel="stylesheet" />

    <!-- Styles and Scripts via Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">

    <!-- ==================== HERO SECTION ==================== -->
    <div id="beranda" class="relative w-full h-screen">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/background-haji-sobirin.jpg') }}" alt="Background Siswa Teladan" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>

        <div class="relative z-10 flex flex-col h-full text-white">
            <header class="bg-gray-900 bg-opacity-70 shadow-md backdrop-blur-sm fixed top-0 left-0 right-0 z-50">
                <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                    <a href="{{ route('landing') }}" class="text-2xl font-bold text-white tracking-wide hover:text-yellow-400 transition">SiswaTeladan</a>
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="#beranda" class="text-gray-200 hover:text-white transition">Beranda</a>
                        <a href="#layanan" class="text-gray-200 hover:text-white transition">Layanan</a>
                        <a href="#fitur" class="text-gray-200 hover:text-white transition">Fitur</a>
                        <a href="#kontak" class="text-gray-200 hover:text-white transition">Kontak</a>
                    </div>
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="{{ route('login') }}" class="px-4 py-2 text-white hover:text-gray-200">Login</a>
                        <a href="{{ route('register') }}" class="bg-yellow-400 text-gray-900 px-4 py-2 rounded-md hover:bg-yellow-500 font-semibold transition">Daftar</a>
                    </div>
                </nav>
            </header>

            <main class="flex-grow flex items-center justify-center text-center px-6">
                <div class="max-w-3xl">
                    <h1 class="text-4xl md:text-6xl font-extrabold leading-tight" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
                        Menentukan Siswa Teladan<br>dengan Sistem Pendukung Keputusan
                    </h1>
                    <p class="mt-6 text-lg text-gray-200" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.5);">
                        SPK ini membantu sekolah dalam memilih siswa teladan terbaik secara objektif menggunakan metode SAW berdasarkan kriteria seperti nilai, keaktifan, sikap, dan lainnya.
                    </p>
                    <div class="mt-10">
                        <a href="{{ route('dashboard') }}" class="inline-block px-8 py-4 bg-yellow-400 text-gray-900 font-bold text-lg rounded-lg shadow-xl hover:bg-yellow-500 transition transform hover:scale-105 duration-300">
                            Mulai Seleksi
                        </a>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- ==================== LAYANAN ==================== -->
    <section id="layanan" class="bg-beige-light text-brown-dark py-20">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-2">Layanan Utama Kami</h2>
            <p class="text-gray-600 mb-16 max-w-2xl mx-auto">Sistem Pendukung Keputusan kami hadir untuk menjadi solusi objektif dan transparan dalam proses pemilihan siswa teladan di sekolah Anda.</p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Item Layanan 1 -->
                <div class="flex flex-col items-center p-6">
                    <svg class="w-12 h-12 text-brown-dark opacity-80 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                    <h3 class="text-xl font-semibold mb-2">Penilaian Objektif</h3>
                    <p class="text-gray-600">Peringkat siswa berdasarkan kriteria yang telah ditetapkan membantu memilih siswa terbaik secara objektif.</p>
                </div>
                <!-- Item Layanan 2 -->
                <div class="flex flex-col items-center p-6">
                    <svg class="w-12 h-12 text-brown-dark opacity-80 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h12" /></svg>
                    <h3 class="text-xl font-semibold mb-2">Analisis Data</h3>
                    <p class="text-gray-600">Sistem mengolah berbagai data dari akademik, kehadiran, hingga sikap untuk memberikan gambaran lengkap performa siswa.</p>
                </div>
                <!-- Item Layanan 3 -->
                <div class="flex flex-col items-center p-6">
                    <svg class="w-12 h-12 text-brown-dark opacity-80 mb-4" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25" /></svg>
                    <h3 class="text-xl font-semibold mb-2">Rekomendasi Terbaik</h3>
                    <p class="text-gray-600">Sistem memberikan rekomendasi siswa terbaik menggunakan metode SAW berdasarkan bobot kriteria yang telah ditentukan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ==================== FITUR ==================== -->
    <section id="fitur" class="bg-beige-dark text-brown-dark py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-2">Fitur di SPK Siswa Teladan</h2>
            <p class="text-gray-700 max-w-2xl mx-auto">Fitur lengkap untuk membantu proses seleksi siswa secara efisien dan akurat.</p>
        </div>
    </section>

    <!-- ==================== FOOTER ==================== -->
    <footer id="kontak" class="bg-gray-800 text-white py-10">
        <div class="container mx-auto px-6 text-center">
            <h3 class="text-2xl font-bold mb-4">Hubungi Kami</h3>
            <p class="text-gray-400 mb-4">Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi kami.</p>
            <a href="mailto:info@sekolah.com" class="inline-block px-6 py-2 bg-yellow-400 text-gray-900 font-semibold rounded-md hover:bg-yellow-500 transition">info@sekolah.com</a>
            <div class="mt-8 border-t border-gray-700 pt-6">
                <p class="text-sm text-gray-500">© 2025 SiswaTeladan. All rights reserved.</p>
            </div>
        </div>
    </footer>

</body>
</html>
