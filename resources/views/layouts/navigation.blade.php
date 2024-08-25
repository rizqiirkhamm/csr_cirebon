<nav x-data="{ open: false }" class="bg-white border-b border-gray-100 fixed w-full z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ url('/') }}">
                    <x-application-logo class="block h-3 w-auto fill-current text-gray-800" />
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                @if(auth()->check())
                    @if(auth()->user()->level === 'admin')
                        @if(request()->routeIs('dashboard') || request()->routeIs('summary.show') || request()->routeIs('summary.edit'))
                            <!-- Admin navigation links for dashboard and profile pages -->
                            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="'#'" :active="request()->routeIs('users.index')">
                                {{ __('kegiatan') }}
                            </x-nav-link>
                            <x-nav-link :href="'#'" :active="request()->routeIs('reports.index')">
                                {{ __('proyek') }}
                            </x-nav-link>
                            <x-nav-link :href="'#'" :active="request()->routeIs('products.index')">
                                {{ __('proyek') }}
                            </x-nav-link>
                            <x-nav-link :href="'#'" :active="request()->routeIs('sales.index')">
                                {{ __('sektor') }}
                            </x-nav-link>
                            <x-nav-link :href="'#'" :active="request()->routeIs('sales.index')">
                                {{ __('laporan') }}
                            </x-nav-link>
                            <x-nav-link :href="'#'" :active="request()->routeIs('sales.index')">
                                {{ __('mitra') }}
                            </x-nav-link>
                        @else
                            <!-- Admin navigation links for other pages -->
                            <x-nav-link :href="url('/')" :active="request()->is('/')">
                                {{ __('Beranda') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/tentang')" :active="request()->is('tentang')">
                                {{ __('Tentang') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/kegiatan')" :active="request()->is('kegiatan')">
                                {{ __('Kegiatan') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/statistik')" :active="request()->is('statistik')">
                                {{ __('Statistik') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/sektor')" :active="request()->is('sektor')">
                                {{ __('Sektor') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/laporan')" :active="request()->is('laporan')">
                                {{ __('Laporan') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/mitra-list')" :active="request()->is('mitra-list')">
                                {{ __('Mitra') }}
                            </x-nav-link>
                        @endif
                    @elseif(auth()->user()->level === 'mitra')
                        @if(request()->routeIs('home'))
                            <!-- Mitra navigation links for home page -->
                            <x-nav-link :href="url('/')" :active="request()->is('/')">
                                {{ __('Beranda') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/tentang')" :active="request()->is('tentang')">
                                {{ __('Tentang') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/kegiatan')" :active="request()->is('kegiatan')">
                                {{ __('Kegiatan') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/statistik')" :active="request()->is('statistik')">
                                {{ __('Statistik') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/sektor')" :active="request()->is('sektor')">
                                {{ __('Sektor') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/laporan')" :active="request()->is('laporan')">
                                {{ __('Laporan') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/mitra-list')" :active="request()->is('mitra-list')">
                                {{ __('Mitra') }}
                            </x-nav-link>
                        @elseif(request()->routeIs('dashboard') || request()->routeIs('summary.show') || request()->routeIs('summary.edit'))
                            <!-- Empty navbar for mitra on dashboard, summary, and summary-edit pages -->
                        @else
                            <!-- Mitra navigation links for other pages -->
                            <x-nav-link :href="url('/')" :active="request()->is('/')">
                                {{ __('Beranda') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/tentang')" :active="request()->is('tentang')">
                                {{ __('Tentang') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/kegiatan')" :active="request()->is('kegiatan')">
                                {{ __('Kegiatan') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/statistik')" :active="request()->is('statistik')">
                                {{ __('Statistik') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/sektor')" :active="request()->is('sektor')">
                                {{ __('Sektor') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/laporan')" :active="request()->is('laporan')">
                                {{ __('Laporan') }}
                            </x-nav-link>
                            <x-nav-link :href="url('/mitra-list')" :active="request()->is('mitra-list')">
                                {{ __('Mitra') }}
                            </x-nav-link>
                        @endif
                    @endif
                @else
                    <!-- Navigation links for non-logged in users -->
                    <x-nav-link :href="url('/')" :active="request()->is('/')">
                        {{ __('Beranda') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/tentang')" :active="request()->is('tentang')">
                        {{ __('Tentang') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/kegiatan')" :active="request()->is('kegiatan')">
                        {{ __('Kegiatan') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/statistik')" :active="request()->is('statistik')">
                        {{ __('Statistik') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/sektor')" :active="request()->is('sektor')">
                        {{ __('Sektor') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/laporan')" :active="request()->is('laporan')">
                        {{ __('Laporan') }}
                    </x-nav-link>
                    <x-nav-link :href="url('/mitra-list')" :active="request()->is('mitra-list')">
                        {{ __('Mitra') }}
                    </x-nav-link>
                @endif
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth    
                    

                    @if((Auth::user()->level === 'admin' || Auth::user()->level === 'mitra' || Auth::user()->level === 'guest') && request()->routeIs('home'))
                        <a href="{{ route('dashboard') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md mr-3 hover:bg-blue-700 transition duration-150 ease-in-out">
                            Dashboard
                        </a>
                    @endif
                    
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                @php
                                    $summary = Auth::user()->summary;
                                    $isProfileComplete = $summary && $summary->nama && $summary->nama_mitra && $summary->email && $summary->no_telp && $summary->alamat && $summary->deskripsi;
                                @endphp
                                
                                @if(Auth::user()->level === 'admin' || $isProfileComplete)
                                    <div class="flex items-center space-x-4">
                                        <div class="flex flex-col items-start">
                                            <span class="font-semibold" style=" font-size: 16px; font-weight: 500; line-height: 24px; color: #101828;">{{ Auth::user()->name }}</span>
                                            <span class="text-sm ml-auto" style="font-size: 16px; font-weight: 400; line-height: 20px; color: {{ Auth::user()->level === 'guest' ? '#EF4444' : '#667085' }};">
                                                @if(Auth::user()->level === 'guest')
                                                    Mitra (non-activated)
                                                @else
                                                    {{ ucfirst(Auth::user()->level) }}
                                                @endif
                                            </span>
                                        </div>
                                        <div class="flex-shrink-0">
                                            @if(Auth::user()->summary && Auth::user()->summary->foto_pp)
                                                <img class="h-10 w-10 rounded-full object-cover" src="{{ Storage::url('images/profile/' . Auth::user()->summary->foto_pp) }}" alt="{{ Auth::user()->name }}">
                                            @else
                                                <img class="h-10 w-10 rounded-full" src="{{ Storage::url('images/profile/profile.png') }}" alt="{{ Auth::user()->name }}">
                                            @endif
                                        </div>
                                    </div>
                                @else
                                    <span>{{ __('Menu') }}</span>
                                @endif
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            @if(Auth::user()->level === 'admin' || Auth::user()->level === 'mitra' || Auth::user()->level === 'guest')
                                <x-dropdown-link :href="route('dashboard')">
                                    {{ __('Dashboard') }}
                                </x-dropdown-link>
                            @endif

                            @if(Auth::user()->level === 'admin' || $isProfileComplete)
                                <x-dropdown-link :href="route('summary.show')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="/register" class="px-4 py-2 bg-red-800 text-white rounded-md">Pengajuan</a>
                @endauth
                @if(!request()->routeIs('home') && (Auth::user()->level === 'admin' || Auth::user()->level === 'mitra'))
                <!-- Notifikasi -->
                <div class="mr-3">
                    <x-notification />
                </div>
            @endif
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @if(auth()->check())
                @if(auth()->user()->level === 'admin')
                    @if(request()->routeIs('dashboard') || request()->routeIs('summary.show') || request()->routeIs('summary.edit'))
                        <!-- Admin responsive navigation links for dashboard and profile pages -->
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="'#'" :active="request()->routeIs('users.index')">
                            {{ __('kegiatan') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="'#'" :active="request()->routeIs('reports.index')">
                            {{ __('proyek') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="'#'" :active="request()->routeIs('products.index')">
                            {{ __('proyek') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="'#'" :active="request()->routeIs('sales.index')">
                            {{ __('sektor') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="'#'" :active="request()->routeIs('sales.index')">
                            {{ __('laporan') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="'#'" :active="request()->routeIs('sales.index')">
                            {{ __('mitra') }}
                        </x-responsive-nav-link>
                    @else
                        <!-- Admin responsive navigation links for other pages -->
                        <x-responsive-nav-link :href="url('/')" :active="request()->is('/')">
                            {{ __('Beranda') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/tentang')" :active="request()->is('tentang')">
                            {{ __('Tentang') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/kegiatan')" :active="request()->is('kegiatan')">
                            {{ __('Kegiatan') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/statistik')" :active="request()->is('statistik')">
                            {{ __('Statistik') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/sektor')" :active="request()->is('sektor')">
                            {{ __('Sektor') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/laporan')" :active="request()->is('laporan')">
                            {{ __('Laporan') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/mitra-list')" :active="request()->is('mitra-list')">
                            {{ __('Mitra') }}
                        </x-responsive-nav-link>
                    @endif
                @elseif(auth()->user()->level === 'mitra')
                    @if(request()->routeIs('home'))
                        <!-- Mitra responsive navigation links for home page -->
                        <x-responsive-nav-link :href="url('/')" :active="request()->is('/')">
                            {{ __('Beranda') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/tentang')" :active="request()->is('tentang')">
                            {{ __('Tentang') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/kegiatan')" :active="request()->is('kegiatan')">
                            {{ __('Kegiatan') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/statistik')" :active="request()->is('statistik')">
                            {{ __('Statistik') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/sektor')" :active="request()->is('sektor')">
                            {{ __('Sektor') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/laporan')" :active="request()->is('laporan')">
                            {{ __('Laporan') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/mitra-list')" :active="request()->is('mitra-list')">
                            {{ __('Mitra') }}
                        </x-responsive-nav-link>
                    @elseif(request()->routeIs('dashboard') || request()->routeIs('summary.show') || request()->routeIs('summary.edit'))
                        <!-- Empty responsive navbar for mitra on dashboard, summary, and summary-edit pages -->
                    @else
                        <!-- Mitra responsive navigation links for other pages -->
                        <x-responsive-nav-link :href="url('/')" :active="request()->is('/')">
                            {{ __('Beranda') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/tentang')" :active="request()->is('tentang')">
                            {{ __('Tentang') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/kegiatan')" :active="request()->is('kegiatan')">
                            {{ __('Kegiatan') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/statistik')" :active="request()->is('statistik')">
                            {{ __('Statistik') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/sektor')" :active="request()->is('sektor')">
                            {{ __('Sektor') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/laporan')" :active="request()->is('laporan')">
                            {{ __('Laporan') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="url('/mitra-list')" :active="request()->is('mitra-list')">
                            {{ __('Mitra') }}
                        </x-responsive-nav-link>
                    @endif
                @endif
            @else
                <!-- Responsive navigation links for non-logged in users -->
                <x-responsive-nav-link :href="url('/')" :active="request()->is('/')">
                    {{ __('Beranda') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('/tentang')" :active="request()->is('tentang')">
                    {{ __('Tentang') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('/kegiatan')" :active="request()->is('kegiatan')">
                    {{ __('Kegiatan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('/statistik')" :active="request()->is('statistik')">
                    {{ __('Statistik') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('/sektor')" :active="request()->is('sektor')">
                    {{ __('Sektor') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('/laporan')" :active="request()->is('laporan')">
                    {{ __('Laporan') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="url('/mitra-list')" :active="request()->is('mitra-list')">
                    {{ __('Mitra') }}
                </x-responsive-nav-link>
            @endif
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                @if(Auth::user() && (Auth::user()->level === 'admin' || $isProfileComplete))
                    <x-responsive-nav-link :href="route('summary.show')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                @endif
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>