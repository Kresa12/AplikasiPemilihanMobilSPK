<!-- resources/views/layouts/sidebar.blade.php -->
<div class="w-64 flex-shrink-0 bg-gray-800 text-white min-h-screen p-4 flex flex-col">
    <!-- Logo / Judul Aplikasi -->
    <div class="flex-shrink-0 mb-10">
        <a href="{{ route('dashboard') }}" class="text-white text-2xl font-bold">
            SPK Siswa Teladan
        </a>
    </div>

    <!-- Menu Navigasi -->
    <nav class="flex-grow">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <!-- Judul Grup Menu -->
            <li>
                <h3 class="px-2 pt-4 pb-2 text-xs text-gray-400 uppercase font-bold tracking-wider">Metode SAW</h3>
            </li>

            <li>
                <a href="{{ route('kriteria.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('kriteria.*') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Data Kriteria</span>
                </a>
            </li>
            <li>
                <a href="{{ route('alternatif.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('alternatif.*') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Data Siswa</span>
                </a>
            </li>
            <li>
                <a href="{{ route('perhitungan.index') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('perhitungan.index') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Perhitungan SAW</span>
                </a>
            </li>

            <!-- Judul Grup Menu -->
            <li>
                <h3 class="px-2 pt-4 pb-2 text-xs text-gray-400 uppercase font-bold tracking-wider">Akun</h3>
            </li>

            <li>
                 <a href="{{ route('profile.edit') }}" class="flex items-center p-2 rounded-lg hover:bg-gray-700 {{ request()->routeIs('profile.edit') ? 'bg-gray-900 ring-2 ring-blue-400' : '' }}">
                    <span class="ms-3">Profile</span>
                </a>
            </li>
            <li>
                <!-- Form Logout -->
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

    <!-- Footer Sidebar -->
    <div class="flex-shrink-0 pt-4 border-t border-gray-700">
        <p class="text-xs text-gray-400 text-center">
            SPK Siswa Teladan © {{ date('Y') }}
        </p>
    </div>
</div>