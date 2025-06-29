<!-- resources/views/alternatif/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Siswa: ') . $alternatif->nama_siswa }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="nama_siswa" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa', $alternatif->nama_siswa) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                        </div>
                        <hr class="my-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Edit Nilai Kriteria</h3>
                        
                        @foreach($kriterias as $kriteria)
                            <div class="mb-4">
                                <label for="kriteria_{{ $kriteria->id }}" class="block text-sm font-medium text-gray-700">{{ $kriteria->nama_kriteria }}</label>
                                <!-- Cari nilai pivot yang sudah ada, jika tidak ada, beri nilai default 0 -->
                                @php
                                    $nilaiPivot = $alternatif->kriteria->find($kriteria->id)->pivot->nilai ?? 0;
                                @endphp
                                <input type="number" step="any" name="kriteria_nilai[{{ $kriteria->id }}]" id="kriteria_{{ $kriteria->id }}" value="{{ old('kriteria_nilai.' . $kriteria->id, $nilaiPivot) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" required>
                            </div>
                        @endforeach

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('alternatif.index') }}" class="text-gray-600 hover:text-gray-900 mr-4">Batal</a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Update Siswa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>