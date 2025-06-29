<!-- resources/views/kriteria/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Kriteria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('kriteria.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 mb-4">Tambah Kriteria</a>
                    
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">{{ session('success') }}</div>
                    @endif

                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kode</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Kriteria</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Bobot</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipe</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($kriterias as $kriteria)
                                <tr>
                                    <td class="px-6 py-4">{{ $kriteria->kode_kriteria }}</td>
                                    <td class="px-6 py-4">{{ $kriteria->nama_kriteria }}</td>
                                    <td class="px-6 py-4">{{ $kriteria->bobot }}</td>
                                    <td class="px-6 py-4 capitalize">{{ $kriteria->tipe }}</td>
                                    <td class="px-6 py-4 flex items-center space-x-2">
                                        <!-- Tombol Edit -->
                                        <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        
                                        <!-- Tombol Hapus dengan Konfirmasi JS -->
                                        <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>