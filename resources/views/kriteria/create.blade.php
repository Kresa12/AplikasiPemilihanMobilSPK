<x-app-layout>
    <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Tambah Kriteria Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- PERBAIKAN DI SINI: ganti max-w-3xl menjadi max-w-7xl atau sesuai kebutuhan -->
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 md:p-8">

                    <!-- Menampilkan Error Validasi -->
                    @if ($errors->any())
                        <div class="mb-6 bg-red-500/10 border border-red-500/20 text-red-500 px-4 py-3 rounded-lg" role="alert">
                            <strong class="font-bold">Oops! Terjadi kesalahan.</strong>
                            <ul class="mt-2 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kriteria.store') }}" method="POST">
                        @csrf
                        
                        <!-- Form dalam grid agar lebih rapi -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Input: Kode Kriteria -->
                            <div class="mb-4">
                                <label for="kode_kriteria" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Kode Kriteria</label>
                                <input type="text" name="kode_kriteria" id="kode_kriteria" value="{{ old('kode_kriteria') }}"
                                       placeholder="Contoh: C1"
                                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       required>
                            </div>

                            <!-- Input: Nama Kriteria -->
                            <div class="mb-4">
                                <label for="nama_kriteria" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama Kriteria</label>
                                <input type="text" name="nama_kriteria" id="nama_kriteria" value="{{ old('nama_kriteria') }}"
                                       placeholder="Contoh: Nilai Akademik"
                                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       required>
                            </div>
                        
                            <!-- Input: Bobot -->
                            <div class="mb-4">
                                <label for="bobot" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Bobot</label>
                                <input type="number" step="0.01" name="bobot" id="bobot" value="{{ old('bobot') }}"
                                       placeholder="Contoh: 0.25 (Gunakan titik untuk desimal)"
                                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                       required>
                            </div>
                        
                            <!-- Input: Tipe Kriteria -->
                            <div class="mb-4">
                                <label for="tipe" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Tipe Kriteria</label>
                                <select name="tipe" id="tipe" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                                    <option value="" disabled {{ old('tipe') ? '' : 'selected' }}>-- Pilih Tipe --</option>
                                    <option value="benefit" {{ old('tipe') == 'benefit' ? 'selected' : '' }}>Benefit (Semakin besar nilainya, semakin baik)</option>
                                    <option value="cost" {{ old('tipe') == 'cost' ? 'selected' : '' }}>Cost (Semakin kecil nilainya, semakin baik)</option>
                                </select>
                            </div>
                        </div>

                        <!-- Tombol Aksi: Batal dan Simpan -->
                        <div class="flex items-center justify-end mt-8 border-t border-gray-200 dark:border-gray-700 pt-6">
                            <a href="{{ route('kriteria.index') }}" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white mr-4">
                                Batal
                            </a>
                            <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                                Simpan Kriteria
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>