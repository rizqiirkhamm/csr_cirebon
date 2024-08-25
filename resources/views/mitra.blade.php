<x-app-mitra-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

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
                    <button type="button" class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5">
                        + Buat Laporan Baru
                    </button>
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

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <span class="font-inter text-sm font-semibold leading-[18px] text-left">Judul</span>
                                        <svg class="w-4 h-4 ml-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 4.66602V11.3327M8 11.3327L11.3333 7.99935M8 11.3327L4.66667 7.99935" stroke="#101828" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <span class="font-inter text-sm font-semibold leading-[18px] text-left">Lokasi</span>
                                        <svg class="w-4 h-4 ml-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 4.66602V11.3327M8 11.3327L11.3333 7.99935M8 11.3327L4.66667 7.99935" stroke="#101828" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <span class="font-inter text-sm font-semibold leading-[18px] text-left">Realisasi</span>
                                        <svg class="w-4 h-4 ml-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 4.66602V11.3327M8 11.3327L11.3333 7.99935M8 11.3327L4.66667 7.99935" stroke="#101828" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <span class="font-inter text-sm font-semibold leading-[18px] text-left">Tgl Realisasi</span>
                                        <svg class="w-4 h-4 ml-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 4.66602V11.3327M8 11.3327L11.3333 7.99935M8 11.3327L4.66667 7.99935" stroke="#101828" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <span class="font-inter text-sm font-semibold leading-[18px] text-left">Laporan Dikirim</span>
                                        <svg class="w-4 h-4 ml-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 4.66602V11.3327M8 11.3327L11.3333 7.99935M8 11.3327L4.66667 7.99935" stroke="#101828" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <span class="font-inter text-sm font-semibold leading-[18px] text-left">Status</span>
                                        <svg class="w-4 h-4 ml-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 4.66602V11.3327M8 11.3327L11.3333 7.99935M8 11.3327L4.66667 7.99935" stroke="#101828" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flex items-center">
                                        <span class="font-inter text-sm font-semibold leading-[18px] text-left">Aksi</span>
                                        <svg class="w-4 h-4 ml-1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 4.66602V11.3327M8 11.3327L11.3333 7.99935M8 11.3327L4.66667 7.99935" stroke="#101828" stroke-width="1.33333" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">Pengadaan sarana keterampilan Olahan Pangan</td>
                                <td class="px-6 py-4">Kec. Karangwareng</td>
                                <td class="px-6 py-4">Rp.###,###,###</td>
                                <td class="px-6 py-4">1 Juli 2024</td>
                                <td class="px-6 py-4">16 July</td>
                                <td class="px-6 py-4"><span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Diterima</span></td>
                                <td class="px-6 py-4">
                                    <a href="#" class="font-medium text-blue-600 hover:underline">Lihat</a>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                <div class="flex justify-center mt-4">
                    <button type="button" class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200">
                        Muat Lebih Banyak
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-mitra-layout>