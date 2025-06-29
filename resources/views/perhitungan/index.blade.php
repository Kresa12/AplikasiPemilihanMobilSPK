<x-app-layout>
    <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hasil Perhitungan Metode SAW') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(isset($error) || $kriterias->isEmpty())
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center text-red-500 font-medium">
                        {{ $error ?? 'Data kriteria atau alternatif belum lengkap untuk perhitungan.' }}
                    </div>
                </div>
            @else

                <!-- Card 1: Matriks Awal -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">1. Matriks Awal (X)</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700/50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Alternatif</th>
                                        @foreach($kriterias as $kriteria)
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">{{ $kriteria->kode_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($alternatifs as $alternatif)
                                        <tr>
                                            <!-- PERBAIKAN DI SINI: Tambahkan kelas dark:text-gray-200 -->
                                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-gray-200">{{ $alternatif->nama_siswa }}</td>
                                            @foreach($kriterias as $kriteria)
                                                <!-- PERBAIKAN DI SINI: Tambahkan kelas dark:text-gray-200 -->
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800 dark:text-gray-200">{{ $matriks_x[$alternatif->id][$kriteria->id] }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Bobot Kriteria (W) -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">2. Bobot Kriteria (W)</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700/50">
                                    <tr>
                                        @foreach($kriterias as $kriteria)
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ $kriteria->nama_kriteria }} ({{ $kriteria->kode_kriteria }})</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    <tr>
                                        @foreach($kriterias as $kriteria)
                                            <!-- PERBAIKAN DI SINI: Tambahkan kelas dark:text-gray-200 -->
                                            <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800 dark:text-gray-200 font-medium">{{ $kriteria->bobot }}</td>
                                        @endforeach
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Card 3: Matriks Normalisasi -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">3. Matriks Normalisasi (R)</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700/50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Alternatif</th>
                                        @foreach($kriterias as $kriteria)
                                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">{{ $kriteria->kode_kriteria }}</th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($alternatifs as $alternatif)
                                        <tr>
                                            <!-- PERBAIKAN DI SINI: Tambahkan kelas dark:text-gray-200 -->
                                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-gray-200">{{ $alternatif->nama_siswa }}</td>
                                            @foreach($kriterias as $kriteria)
                                                <!-- PERBAIKAN DI SINI: Tambahkan kelas dark:text-gray-200 -->
                                                <td class="px-6 py-4 whitespace-nowrap text-center text-gray-800 dark:text-gray-200">{{ number_format($normalized_matrix[$alternatif->id][$kriteria->id], 4) }}</td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Hasil Akhir (Ranking) -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">4. Hasil Akhir (Ranking)</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700/50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Ranking</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Nama Siswa</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Nilai Akhir (V)</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach($rankings as $index => $rank)
                                        <tr class="{{ $index === 0 ? 'bg-green-500/10' : '' }}">
                                            <!-- PERBAIKAN DI SINI: Tambahkan kelas dark:text-gray-200 -->
                                            <td class="px-6 py-4 whitespace-nowrap font-bold text-lg {{ $index === 0 ? 'text-green-500' : 'text-gray-800 dark:text-gray-200' }}">{{ $index + 1 }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900 dark:text-gray-200">{{ $rank['nama_siswa'] }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900 dark:text-gray-200">{{ number_format($rank['nilai_saw'], 4) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
</x-app-layout>