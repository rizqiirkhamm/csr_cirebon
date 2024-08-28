<x-app-layout>
    @if(auth()->user()->level === 'admin')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <x-slot name="slot">
            <div class="w-full">
                <div class="relative w-full h-[240px]">
                    <img
                        src="{{ asset('images/mitra-bg.png') }}"
                        alt="Background"
                        class="w-full h-full object-cover"
                    />
                    <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                        <h1 class="text-4xl font-bold mb-2">Selamat Datang di Admin CSR Kabupaten Cirebon</h1>
                        <p class="text-xl">Lapor dan ketahui program CSR Anda</p>
                    </div>
                </div>
                <div class="px-8 py-6">
                    <div class="my-6">
                        @include('components.filter-section')
                    </div>
                    <div class="w-full max-w-[1240px] mx-auto">
                        <h2 class="font-inter text-[28px] font-semibold leading-[44px] tracking-[-0.02em] text-left mb-6">Data Statistik</h2>
                        <div class="flex justify-center items-center">
                            <div class="w-full max-w-[1240px] gap-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                                @include('components.statistics-card', [
                                    'title' => 'Total Proyek CSR',
                                    'value' => '1000',
                                    'color' => 'bg-[#F95016]',
                                    'icon' => 'project'
                                ])
                                @include('components.statistics-card', [
                                    'title' => 'Proyek Terealisasi',
                                    'value' => '1000',
                                    'color' => 'bg-[#7A5AF8]',
                                    'icon' => 'check'
                                ])
                                @include('components.statistics-card', [
                                    'title' => 'Dana Realisasi CSR Mitra',
                                    'value' => '10,000,000',
                                    'color' => 'bg-[#1D9C53]',
                                    'icon' => 'money'
                                ])
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </x-slot>
    @elseif(auth()->user()->level === 'mitra')
        @php
            $summary = auth()->user()->summary;
            $isProfileComplete = $summary && $summary->nama && $summary->nama_mitra && $summary->email && $summary->no_telp && $summary->alamat && $summary->deskripsi;
        @endphp

        @if(!$isProfileComplete)
            <x-slot name="slot">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <h3 class="text-lg font-semibold mb-4">{{ __('Lengkapi Profil Anda') }}</h3>
                                <p class="mb-4">Silakan lengkapi profil Anda untuk mengakses dashboard.</p>
                                
                                @include('profile.summary-edit-form')
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
        @else
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot>

            <x-slot name="slot">
                <div class="w-full">
                    <div class="relative w-full h-[240px]">
                        <img
                            src="{{ asset('images/mitra-bg.png') }}"
                            alt="Background"
                            class="w-full h-full object-cover"
                        />
                        <div class="absolute inset-0 flex flex-col justify-center items-center text-white">
                            <h1 class="text-4xl font-bold mb-2">Selamat Datang di Dashboard CSR Kabupaten Cirebon</h1>
                            <p class="text-xl">Lapor dan ketahui program CSR Anda</p>
                        </div>
                    </div>
                    <div class="px-8 py-6">
                        <div class="my-6">
                            @include('components.filter-section')
                        </div>
                        <div class="w-full max-w-[1240px] mx-auto">
                            <h2 class="font-inter text-[28px] font-semibold leading-[44px] tracking-[-0.02em] text-left mb-6">Data Statistik</h2>
                            <div class="flex justify-center items-center">
                                <div class="w-full max-w-[1240px] gap-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                                    @include('components.statistics-card', [
                                        'title' => 'Total Proyek CSR',
                                        'value' => '1000',
                                        'color' => 'bg-[#F95016]',
                                        'icon' => 'project'
                                    ])
                                    @include('components.statistics-card', [
                                        'title' => 'Proyek Terealisasi',
                                        'value' => '1000',
                                        'color' => 'bg-[#7A5AF8]',
                                        'icon' => 'check'
                                    ])
                                    @include('components.statistics-card', [
                                        'title' => 'Dana Realisasi CSR Mitra',
                                        'value' => '10,000,000',
                                        'color' => 'bg-[#1D9C53]',
                                        'icon' => 'money'
                                    ])
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-[1240px] mx-auto mt-8">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-2xl font-bold">Laporan Mitra</h2>
                                @if(auth()->user()->level === 'mitra')
                                    <a href="{{ route('dashboard.laporan') }}" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                                     Laporan Mitra
                                    </a>
                                @endif
                            </div>

                            <div class="mb-4">
                                <label for="table-search" class="sr-only">Search</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" id="table-search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari">
                                </div>
                            </div>

                            @if(isset($laporans) && $laporans->count() > 0)
                                <table class="mt-4 w-full">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2">Judul</th>
                                            <th class="px-4 py-2">Lokasi</th>
                                            <th class="px-4 py-2">Realisasi</th>
                                            <th class="px-4 py-2">Tanggal Realisasi</th>
                                            <th class="px-4 py-2">Laporan Kirim</th>
                                            <th class="px-4 py-2">Status</th>
                                            <th class="px-4 py-2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($laporans as $laporan)
                                            <tr>
                                                <td class="border px-4 py-2">{{ $laporan->judul_laporan }}</td>
                                                <td class="border px-4 py-2">{{ $laporan->proyek->lokasi ?? 'Tidak ada lokasi' }}</td>
                                                <td class="border px-4 py-2">Rp {{ number_format($laporan->realisasi, 0, ',', '.') }}</td>
                                                <td class="border px-4 py-2">{{ $laporan->tanggal }} {{ $laporan->bulan }} {{ $laporan->tahun }}</td>
                                                <td class="border px-4 py-2">{{ $laporan->created_at->format('d M Y') }}</td>
                                                <td class="border px-4 py-2">{{ ucfirst($laporan->status) }}</td>
                                                <td class="border px-4 py-2">
                                                    <a href="{{ route('dashboard.laporan.detail', $laporan->id) }}" class="text-blue-500 hover:text-blue-700">Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <p>No reports available.</p>
                            @endif

                            <div class="flex justify-center mt-4">
                                <span class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                                    Muat Lebih Banyak
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </x-slot>
        @endif
    @else
        <x-slot name="slot">
            @include('404')
        </x-slot>
    @endif
</x-app-layout>