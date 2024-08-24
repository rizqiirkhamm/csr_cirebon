<div class="w-screen h-auto py-24 px-60 flex flex-col justify-start items-start max-md:px-5 max-md:py-10 space-y-5 bg-white">
    <div class='w-16 h-1 bg-orange-500'></div>
    <img class="w-full h-96 object-cover" src="https://www.bersamabumn.com/wp-content/uploads/2023/11/Lowongan-Kerja-BUMN-PT-Pertamina-Maintenance-Construction-PertaMC.webp " alt="">
    <div class="w-full h-auto py-10 flex flex-col justify-start items-start max-md:px-5 max-md:py-10 space-y-4">
        <div class="w-20 h-1 bg-orange-500 my-3"></div>
        <h1 class="font-extrabold text-5xl max-md:mb-5 max-md:text-4xl">Gallery</h1>
    </div>
    <div class="grid grid-cols-5 gap-4 pb-5 max-md:grid-cols-2">
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
        </div>
        <div>
            <img class="h-auto max-w-full rounded-lg" src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
        </div>
    </div>
    <div class="w-full h-auto py-10 grid grid-cols-3 gap-3 max-md:grid-cols-1">
        <div class="w-full h-28 bg-gray-100 rounded-lg p-6">
            <h1 class="text-xl font-thin text-gray-600">Realisasi</h1>
            <h1 class="text-2xl font-bold text-gray-800">Rp.10,000,000</h1>
        </div>
        <div class="w-full h-28 bg-gray-100 rounded-lg p-6">
            <h1 class="text-xl font-thin text-gray-600">Nama Proyek</h1>
            <h1 class="text-2xl font-bold text-gray-800">{{$laporan->proyek->nama_proyek}}</h1>
        </div>
        <div class="w-full h-28 bg-gray-100 rounded-lg p-6">
            <h1 class="text-xl font-thin text-gray-600">Kecamatan</h1>
            <h1 class="text-2xl font-bold text-gray-800">Kec. Sawangan</h1>
        </div>
    </div>
    <div class="w-full pb-10 flex justify-center items-start flex-col">
        <h1 class="text-2xl font-bold">Rincian Laporan</h1>
        <h1 class="text-xl font-thin">{{$laporan->deskripsi}}</h1>
    </div>
</div>