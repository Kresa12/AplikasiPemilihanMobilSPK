<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Penilaian Mobil: ') . $penilaian->mobil->nama_mobil }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Form Edit Penilaian</h3>

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

                    <form action="{{ route('penilaians.update', $penilaian->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="mobil_id" class="block text-sm font-medium text-gray-700">Pilih Mobil</label>
                            <select name="mobil_id" id="mobil_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required disabled>
                                {{-- Disabled karena tidak boleh ganti mobil untuk penilaian yang sudah ada --}}
                                @foreach ($mobils as $mobil)
                                    <option value="{{ $mobil->id }}" {{ old('mobil_id', $penilaian->mobil_id) == $mobil->id ? 'selected' : '' }}>{{ $mobil->nama_mobil }}</option>
                                @endforeach
                            </select>
                            {{-- Hidden input agar mobil_id tetap terkirim meskipun select disabled --}}
                            <input type="hidden" name="mobil_id" value="{{ $penilaian->mobil_id }}">
                        </div>

                        <div class="mb-4">
                            <label for="harga_beli" class="block text-sm font-medium text-gray-700">Harga Beli</label>
                            <input type="number" name="harga_beli" id="harga_beli" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('harga_beli', $penilaian->harga_beli) }}" required min="0" step="any">
                        </div>
                        <div class="mb-4">
                            <label for="fitur" class="block text-sm font-medium text-gray-700">Fitur</label>
                            <input type="number" name="fitur" id="fitur" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('fitur', $penilaian->fitur) }}" required min="0" step="any">
                        </div>
                        <div class="mb-4">
                            <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                            <input type="number" name="model" id="model" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('model', $penilaian->model) }}" required min="0" step="any">
                        </div>
                        <div class="mb-4">
                            <label for="harga_jual" class="block text-sm font-medium text-gray-700">Harga Jual</label>
                            <input type="number" name="harga_jual" id="harga_jual" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('harga_jual', $penilaian->harga_jual) }}" required min="0" step="any">
                        </div>
                        <div class="mb-4">
                            <label for="tanggal_penilaian" class="block text-sm font-medium text-gray-700">Tanggal Penilaian</label>
                            <input type="date" name="tanggal_penilaian" id="tanggal_penilaian" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ old('tanggal_penilaian', \Carbon\Carbon::parse($penilaian->tanggal_penilaian)->toDateString()) }}">
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Perbarui Penilaian
                            </button>
                            <a href="{{ route('penilaians.index') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>