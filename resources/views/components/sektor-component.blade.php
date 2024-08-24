{{-- Sektor CSR --}}
<div class="w-screen h-screen py-24 px-60 flex max-md:flex-col justify-center items-center space-y-9 max-md:space-y-4 bg-slate-900 max-md:px-5 max-md:py-10 max-md:h-auto">
    <div class="w-1/2 max-md:w-full h-full flex justify-center items-start flex-col space-y-2 max-md:space-y-0">
        <h1 class="font-extrabold text-white text-4xl">Sektor CSR</h1>
        <h1 class="font-normal text-white text-xl">Bidang sektor CSR Kabupaten Cirebon yang tersedia</h1>
        <div class="w-full h-full flex justify-start items-start flex-col">
            @foreach ($sektor as $item)
                <button onclick="showDetail({{ $item->id }})" 
                    class="sector-button w-4/5 px-10 py-7 text-white bg-white bg-opacity-10 mt-4 flex justify-start items-center rounded-md text-xl font-bold hover:bg-opacity-30 transition max-md:w-full"
                    data-sektor-id="{{ $item->id }}">
                    {{$item->nama_sektor}}
                </button>
            @endforeach
        </div>
    </div>
    <div id="sektor-detail" class="w-1/2 max-md:w-full h-full flex flex-col bg-gray-800 p-5 rounded-md text-white">
        <!-- Detail sektor akan muncul di sini -->
        <p>Pilih salah satu sektor untuk melihat detailnya.</p>
    </div>
</div>

<style>
    #sektor-detail {
        max-height: 80%; /* Atur sesuai kebutuhan */
        overflow: hidden; /* Cegah overflow jika ada konten yang sangat panjang */
        display: flex;
        flex-direction: column;
        padding: 16px;
        box-sizing: border-box;
    }

    #sektor-detail > div {
        flex-grow: 1; /* Allow content to grow and fill available space */
        overflow: hidden; /* Cegah konten meluber dari div */
        text-overflow: ellipsis; /* Tambahkan ellipsis jika teks terlalu panjang */
        word-wrap: break-word; /* Membungkus kata jika terlalu panjang */
        word-break: break-word; /* Memecah kata jika terlalu panjang */
    }
</style>

<script>
    // Mendapatkan data sektor dari PHP ke JavaScript
    const sektorDetails = @json($sektor);

    function showDetail(sektorId) {
        // Cari detail sektor yang cocok berdasarkan sektorId
        const selectedSektor = sektorDetails.find(sektor => sektor.id === sektorId);
        
        // Periksa jika sektor ditemukan
        const detailContainer = document.getElementById('sektor-detail');
        if (selectedSektor) {
            // Update konten detail sektor
            detailContainer.innerHTML = `
                <div class="space-y-3 w-full">
                    <img class="h-80 rounded-lg" src="${selectedSektor.foto_thumbnail}" alt="">
                    <p>${selectedSektor.deskripsi}</p>
                </div>
            `;
        } else {
            // Jika sektor tidak ditemukan
            detailContainer.innerHTML = `<p>Detail sektor tidak ditemukan.</p>`;
        }

        // Update gaya tombol
        const buttons = document.querySelectorAll('.sector-button');
        buttons.forEach(button => {
            button.classList.remove('active');
            if (parseInt(button.getAttribute('data-sektor-id')) === sektorId) {
                button.classList.add('active');
            }
        });
    }
</script>