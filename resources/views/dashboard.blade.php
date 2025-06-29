<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium">Selamat Datang, {{ Auth::user()->name }}! 👋</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        Anda telah masuk ke dalam Sistem Pendukung Keputusan Penentuan **Rekomendasi Mobil**.
                        {{-- Catatan: Jika ingin ini benar-benar untuk Siswa Teladan, Anda perlu menyesuaikan Model, Migrasi, dan Controller. --}}
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                {{-- Kartu 1: Manajemen Mobil (yang akan dinilai) --}}
                <a href="{{ route('mobils.index') }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition ease-in-out duration-150">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-500/10 text-blue-500 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19v-2m-3 2h6m-6 0H5a2 2 0 01-2-2v-3a2 2 0 012-2h14a2 2 0 012 2v3a2 2 0 01-2 2h-3m-6 0h6"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">Daftar Mobil</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Lihat & nilai mobil yang tersedia.</p>
                        </div>
                    </div>
                </a>

                {{-- Kartu 2: Penilaian Saya (yang sudah user lakukan) --}}
                <a href="{{ route('penilaians.index') }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition ease-in-out duration-150">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-500/10 text-green-500 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">Penilaian Saya</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Lihat & kelola penilaian mobil Anda.</p>
                        </div>
                    </div>
                </a>

                {{-- Kartu 3: Atur Bobot Kriteria --}}
                <a href="{{ route('pembobotans.edit') }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition ease-in-out duration-150">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-purple-500/10 text-purple-500 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.525.322 1.018.847 1.25 1.724z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">Atur Bobot Kriteria</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Sesuaikan prioritas kriteria penilaian.</p>
                        </div>
                    </div>
                </a>

                {{-- Kartu 4: Hasil Perhitungan SPK --}}
                <a href="{{ route('spk.hasil') }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition ease-in-out duration-150">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-500/10 text-yellow-500 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 3m0 0l-3 3m3-3h12a6 6 0 010 12H7a6 6 0 01-6-6v-1m6-9l3-3m0 0l-3-3m3 3h12a6 6 0 000-12H7a6 6 0 00-6 6v1"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">Hasil Rekomendasi Mobil</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Lihat perankingan mobil terbaik.</p>
                        </div>
                    </div>
                </a>

                {{-- Kartu 5: Manajemen Pabrikan (Opsional, untuk Admin/Pengelola Data Master) --}}
                {{-- Anda bisa un-comment ini jika ingin ada link langsung ke manajemen pabrikan --}}
                {{-- <a href="{{ route('pabrikans.index') }}" class="block p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700/50 transition ease-in-out duration-150">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-red-500/10 text-red-500 p-3 rounded-lg">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m-1 4h1m8-10h1m-1 4h1m-1 4h1M4 21h16a2 2 0 002-2V5a2 2 0 00-2-2H4a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-gray-900 dark:text-gray-100">Manajemen Pabrikan</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Kelola daftar merk pabrikan.</p>
                        </div>
                    </div>
                </a> --}}

            </div>

        </div>
    </div>
</x-app-layout>