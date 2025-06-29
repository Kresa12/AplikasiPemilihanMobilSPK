<div class="w-64 flex-shrink-0 bg-gray-800 text-white min-h-screen p-4 flex flex-col">
    <div class="flex-shrink-0 mb-10">
        <a href="{{ route('dashboard') }}" class="text-white text-2xl font-bold">
            SPK Rekomendasi Mobil
        </a>
    </div>

    <nav class="flex-grow">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li>
                <h3 class="px-2 pt-4 pb-2 text-xs text-gray-400 uppercase font-bold tracking-wider">Manajemen Data</h3>
            </li>

            <li>
                <a href="{{ route('mobils.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('mobils.*') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Data Mobil</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pabrikans.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('pabrikans.*') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Data Pabrikan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('penilaians.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('penilaians.*') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Penilaian Saya</span>
                </a>
            </li>

            <li>
                <h3 class="px-2 pt-4 pb-2 text-xs text-gray-400 uppercase font-bold tracking-wider">Sistem WP</h3>
            </li>

            <li>
                <a href="{{ route('pembobotans.edit') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('pembobotans.edit') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Atur Bobot Kriteria</span>
                </a>
            </li>
            <li>
                <a href="{{ route('spk.hasil') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('spk.hasil') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Hasil Rekomendasi</span>
                </a>
            </li>

            <li>
                <h3 class="px-2 pt-4 pb-2 text-xs text-gray-400 uppercase font-bold tracking-wider">Akun</h3>
            </li>

            <li>
                 <a href="{{ route('profile.edit') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('profile.edit') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Profile</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"
                            class="flex items-center w-full p-2 rounded-lg hover:bg-gray-700">
                        <span class="ms-3">Log Out</span>
                    </a>
                </form>
            </li>
        </ul>
    </nav>

    <div class="flex-shrink-0 pt-4 border-t border-gray-700">
        <p class="text-xs text-gray-400 text-center">
            SPK Rekomendasi Mobil © {{ date('Y') }}
        </p>
    </div>
</div>