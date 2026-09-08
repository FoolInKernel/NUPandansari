<nav x-data="{ open: false }" class="bg-emerald-900 border-b border-emerald-800 text-yellow-400 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center space-x-8">
                <!-- Logo / Nama Brand -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="font-extrabold text-lg tracking-wide text-yellow-400 flex items-center gap-2">
                        <span>🌐 NU Pandansari</span>
                    </a>
                </div>

                <!-- Navigation Links (Menu Utama Admin) -->
                <div class="hidden space-x-4 sm:flex items-center">
                    <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->routeIs('dashboard') ? 'bg-emerald-800 text-yellow-400' : 'text-emerald-100 hover:bg-emerald-800 hover:text-white' }} transition">
                        Dashboard
                    </a>
                    <a href="{{ route('berita.index') }}" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->routeIs('berita.*') ? 'bg-emerald-800 text-yellow-400' : 'text-emerald-100 hover:bg-emerald-800 hover:text-white' }} transition">
                        Berita
                    </a>
                    <a href="{{ route('galeri-admin.index') }}" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->routeIs('galeri-admin.*') ? 'bg-emerald-800 text-yellow-400' : 'text-emerald-100 hover:bg-emerald-800 hover:text-white' }} transition">
                        Galeri
                    </a>
                    <a href="{{ route('pengurus.index') }}" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->routeIs('pengurus.*') ? 'bg-emerald-800 text-yellow-400' : 'text-emerald-100 hover:bg-emerald-800 hover:text-white' }} transition">
                        Pengurus
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown (Profil Admin di Kanan) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-emerald-700 text-sm leading-4 font-bold rounded-md text-yellow-300 bg-emerald-800 hover:bg-emerald-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-yellow-400 hover:text-white hover:bg-emerald-800 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu (Mobile) -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-emerald-950 border-t border-emerald-800">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-bold text-emerald-100 hover:bg-emerald-800">Dashboard</a>
            <a href="{{ route('berita.index') }}" class="block px-3 py-2 rounded-md text-base font-bold text-emerald-100 hover:bg-emerald-800">Kelola Berita</a>
            <a href="{{ route('galeri-admin.index') }}" class="block px-3 py-2 rounded-md text-base font-bold text-emerald-100 hover:bg-emerald-800">Kelola Galeri</a>
            <a href="{{ route('pengurus.index') }}" class="block px-3 py-2 rounded-md text-base font-bold text-emerald-100 hover:bg-emerald-800">Kelola Pengurus</a>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-4 border-t border-emerald-800 px-4">
            <div class="font-medium text-base text-yellow-300">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-emerald-300 mb-3">{{ Auth::user()->email }}</div>

            <div class="space-y-1">
                <a href="{{ route('profile.edit') }}" class="block text-sm font-medium text-emerald-100 hover:text-white py-1">Profile</a>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm font-medium text-red-300 hover:text-red-100 py-1 text-left w-full">
                        Log Out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>