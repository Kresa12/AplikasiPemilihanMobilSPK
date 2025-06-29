<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atur Bobot Kriteria') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Pengaturan Bobot Kriteria Anda</h3>
                    <p class="text-sm text-gray-600 mb-6">Total bobot harus sama dengan 1.0</p>

                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Berhasil!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <strong class="font-bold">Whoops!</strong>
                            <span class="block sm:inline">Ada beberapa masalah dengan input Anda.</span>
                            <ul class="mt-3 list-disc list-inside text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pembobotans.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="w1" class="block text-sm font-medium text-gray-700">W1 (Harga Beli - Cost)</label>
                            <input type="number" name="w1" id="w1" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('w1', $pembobotan->w1) }}" min="0" max="1" step="0.01" required>
                        </div>
                        <div class="mb-4">
                            <label for="w2" class="block text-sm font-medium text-gray-700">W2 (Fitur - Benefit)</label>
                            <input type="number" name="w2" id="w2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('w2', $pembobotan->w2) }}" min="0" max="1" step="0.01" required>
                        </div>
                        <div class="mb-4">
                            <label for="w3" class="block text-sm font-medium text-gray-700">W3 (Model - Benefit)</label>
                            <input type="number" name="w3" id="w3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('w3', $pembobotan->w3) }}" min="0" max="1" step="0.01" required>
                        </div>
                        <div class="mb-4">
                            <label for="w4" class="block text-sm font-medium text-gray-700">W4 (Harga Jual - Benefit)</label>
                            <input type="number" name="w4" id="w4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('w4', $pembobotan->w4) }}" min="0" max="1" step="0.01" required>
                        </div>
                        <div class="mb-4">
                            <label for="w5" class="block text-sm font-medium text-gray-700">W5 (Nilai Pabrikan - Benefit)</label>
                            <input type="number" name="w5" id="w5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('w5', $pembobotan->w5) }}" min="0" max="1" step="0.01" required>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Simpan Bobot
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>