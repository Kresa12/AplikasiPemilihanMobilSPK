<!-- resources/views/alternatif/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Siswa (Alternatif)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('alternatif.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mb-4">Tambah Siswa</a>
                    
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Siswa</th>
                                <!-- Kolom kriteria dinamis -->
                                @foreach($kriterias as $kriteria)
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ $kriteria->nama_kriteria }}</th>
                                @endforeach
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($alternatifs as $alternatif)
                                <tr>
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4 font-medium">{{ $alternatif->nama_siswa }}</td>
                                    @foreach($kriterias as $kriteria)
                                        <td class="px-6 py-4">
                                            {{ $alternatif->kriteria->find($kriteria->id)->pivot->nilai ?? 'N/A' }}
                                        </td>
                                    @endforeach
                                    <td class="px-6 py-4 flex items-center space-x-2">
                                        <a href="{{ route('alternatif.edit', $alternatif->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form action="{{ route('alternatif.destroy', $alternatif->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus siswa ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="{{ 3 + $kriterias->count() }}" class="px-6 py-4 text-center text-gray-500">
                                        Belum ada data siswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>