<x-app-layout>
    @if(auth()->user()->level === 'admin')
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <x-slot name="slot">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h3 class="text-lg font-semibold mb-4">{{ __('Admin Dashboard') }}</h3>
                            <p>Selamat datang, Admin {{ auth()->user()->name }}!</p>
                            <ul class="mt-4">
                                <li>Manajemen Pengguna</li>
                                <li>Laporan Sistem</li>
                                <li>Konfigurasi Aplikasi</li>
                            </ul>
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
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <h3 class="text-lg font-semibold mb-4">{{ __('Mitra Dashboard') }}</h3>
                                <p>Selamat datang, Mitra {{ auth()->user()->name }}!</p>
                                <ul class="mt-4">
                                    <li>Profil Mitra</li>
                                    <li>Manajemen Produk</li>
                                    <li>Laporan Penjualan</li>
                                </ul>
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