@php
// Daftar notifikasi contoh
$notifications = [
['type' => 'revisi', 'title' => 'Laporan perlu direvisi!', 'description' => 'Laporan pengadaan perkakas masak untuk
desa', 'detail' => 'Foto tidak sesuai dengan judul dan sektor CSR laporan'],
['type' => 'terima', 'title' => 'Laporan telah diterima!', 'description' => 'Laporan pengadaan perkakas masak untuk
desa'],
['type' => 'tolak', 'title' => 'Laporan ditolak!', 'description' => 'Laporan pengadaan perkakas masak untuk desa',
'detail' => 'Foto tidak sesuai dengan judul dan sektor CSR laporan'],
['type' => 'terima', 'title' => 'Laporan telah diterima!', 'description' => 'Laporan pengadaan perkakas masak untuk
desa'],
['type' => 'terima', 'title' => 'Laporan telah diterima!', 'description' => 'Laporan pengadaan perkakas masak untuk
desa'],
];

// Array untuk menyimpan warna notifikasi berdasarkan tipe
$notificationColors = [
'revisi' => 'bg-red-50 border-l-4 border-orange-500',
'terima' => 'bg-green-50 border-l-4 border-green-500',
'tolak' => 'bg-red-50 border-l-4 border-red-500'
];
@endphp

<div x-data="{ isOpen: false }" class="relative flex items-start">
    <!-- Tombol untuk membuka/menutup notifikasi -->
    <button @click="isOpen = !isOpen" class="mr-2 text-gray-500 hover:text-gray-700 z-10">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.0201 20.5299C9.69011 20.5299 7.36011 20.1599 5.15011 19.4199C4.31011 19.1299 3.67011 18.5399 3.39011 17.7699C3.10011 16.9999 3.20011 16.1499 3.66011 15.3899L4.81011 13.4799C5.05011 13.0799 5.27011 12.2799 5.27011 11.8099V8.91992C5.27011 5.19992 8.30011 2.16992 12.0201 2.16992C15.7401 2.16992 18.7701 5.19992 18.7701 8.91992V11.8099C18.7701 12.2699 18.9901 13.0799 19.2301 13.4899L20.3701 15.3899C20.8001 16.1099 20.8801 16.9799 20.5901 17.7699C20.3001 18.5599 19.6701 19.1599 18.8801 19.4199C16.6801 20.1599 14.3501 20.5299 12.0201 20.5299ZM12.0201 3.66992C9.13011 3.66992 6.77011 6.01992 6.77011 8.91992V11.8099C6.77011 12.5399 6.47011 13.6199 6.10011 14.2499L4.95011 16.1599C4.73011 16.5299 4.67011 16.9199 4.80011 17.2499C4.92011 17.5899 5.22011 17.8499 5.63011 17.9899C9.81011 19.3899 14.2401 19.3899 18.4201 17.9899C18.7801 17.8699 19.0601 17.5999 19.1901 17.2399C19.3201 16.8799 19.2901 16.4899 19.0901 16.1599L17.9401 14.2499C17.5601 13.5999 17.2701 12.5299 17.2701 11.7999V8.91992C17.2701 6.01992 14.9201 3.66992 12.0201 3.66992Z" fill="#101828"/>
            <path d="M13.8801 3.93969C13.8101 3.93969 13.7401 3.92969 13.6701 3.90969C13.3801 3.82969 13.1001 3.76969 12.8301 3.72969C11.9801 3.61969 11.1601 3.67969 10.3901 3.90969C10.1101 3.99969 9.81011 3.90969 9.62011 3.69969C9.43011 3.48969 9.37011 3.18969 9.48011 2.91969C9.89011 1.86969 10.8901 1.17969 12.0301 1.17969C13.1701 1.17969 14.1701 1.85969 14.5801 2.91969C14.6801 3.18969 14.6301 3.48969 14.4401 3.69969C14.2901 3.85969 14.0801 3.93969 13.8801 3.93969Z" fill="#101828"/>
            <path d="M12.02 22.8105C11.03 22.8105 10.07 22.4105 9.37002 21.7105C8.67002 21.0105 8.27002 20.0505 8.27002 19.0605H9.77002C9.77002 19.6505 10.01 20.2305 10.43 20.6505C10.85 21.0705 11.43 21.3105 12.02 21.3105C13.26 21.3105 14.27 20.3005 14.27 19.0605H15.77C15.77 21.1305 14.09 22.8105 12.02 22.8105Z" fill="#101828"/>
            </svg>

    </button>

    <!-- Panel notifikasi -->
    <div x-show="isOpen" x-cloak @click.away="isOpen = false"
        class="fixed mt-4 w-[507px] h-[500px] top-[92px] left-[947px] bg-white rounded-[12px] shadow-lg border border-gray-200 overflow-hidden z-50"
        style="top: 4rem;">
        <!-- Header panel notifikasi -->
        <div class="flex items-center p-4">
            <h2 class="text-xl font-semibold flex-grow">Notifikasi</h2>
            <button @click="isOpen = false" class="text-gray-500 hover:text-gray-700 ml-2 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>
        <!-- Daftar notifikasi -->
        <div class="max-h-[calc(500px-64px)] overflow-y-auto px-5 pt-3 pb-4 gap-4">
            @foreach ($notifications as $notification)
            <!-- Item notifikasi -->
            <div class="p-4 mb-2 mx-2 rounded-lg {{ $notificationColors[$notification['type']] ?? 'bg-gray-50' }}">
                <p
                    class="font-semibold text-base {{ $notification['type'] === 'revisi' ? 'text-orange-600' : ($notification['type'] === 'terima' ? 'text-green-600' : 'text-red-600') }}">
                    {{ $notification['title'] }}
                </p>
                <p class="text-base font-medium mt-1">{{ $notification['description'] }}</p>
                @if(isset($notification['detail']))
                <p class="text-sm text-gray-600 mt-1">{{ $notification['detail'] }}</p>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Style untuk menyembunyikan elemen dengan x-cloak -->
<style>
    [x-cloak] {
        display: none !important;
    }

</style>
