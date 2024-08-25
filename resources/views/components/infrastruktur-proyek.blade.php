{{-- Program & Proyek CSR --}}
<div class="w-screen h-auto pb-10 px-60 flex flex-col justify-center items-start max-md:px-5 ">
    <div class="w-36 h-1 bg-orange-500"></div>
    <h1 class="font-black text-4xl mt-2">Program CSR</h1>
    <h1 class="text-gray-500 text-xl mt-2">Bidang program CSR Kabupaten Cirebon yang tersedia</h1>
</div>
<div
    class="w-screen pb-20 px-60 flex max-md:flex-col justify-center items-center max-md:space-y-2 max-md:px-5 max-md:py-10">
    <div class="w-2/5 max-md:w-full h-full flex justify-start items-start flex-col space-y-2 max-md:space-y-0">
        <div class="w-full h-full flex justify-start items-start flex-col">
            @foreach ($program as $item)
            @if ($item->id_sektor == '5')
            <button onclick="showDetail({{ $item->id }})"
                class="sector-button flex-col w-4/5 px-10 py-4 border-l-4 bg-white mt-4 flex justify-center items-start text-xl font-bold hover:bg-opacity-30 transition max-md:w-full"
                data-program-id="{{ $item->id }}">
                <h1 class="text-2xl">{{$item->nama_program}}</h1>
                <h1 class="text-xl font-normal text-gray-500">9 Proyek</h1>
            </button>                
            @endif
            @endforeach
        </div>
    </div>
    <div class="w-3/5 max-md:w-full h-full flex justify-start items-start space-y-2 max-md:space-y-0">
        <div id="project-container" class="w-full h-[80px] flex justify-start items-start bg-white border">
            <!-- Proyek akan ditampilkan di sini -->
        </div>
    </div>
</div>

<script>
    function showDetail(programId) {
    fetch(`api/getProjects/${programId}`)
        .then(response => response.json())
        .then(data => {
            const projectContainer = document.getElementById('project-container');
            projectContainer.innerHTML = ''; // Clear previous content

            data.proyek.forEach(project => { 
                if (project.id_sektor == 5) { // Menambahkan kondisi untuk memfilter proyek dengan id sektor 1
                    const projectElement = `
                    <div class="w-full h-[80px] flex justify-start items-start bg-white border">
                        <div class="w-2/5 h-full flex justify-start items-center p-3 text-gray-500">
                            <h1>${project.nama_proyek}</h1>
                        </div>
                        <div class="w-2/5 h-full flex justify-start items-center p-3 text-gray-500">
                            <h1>${project.lokasi}</h1>
                        </div>
                        <div class="w-1/5 h-full flex justify-center items-center p-3 text-gray-500">
                            <a class="w-full px-2 py-3 bg-red-800 rounded-md text-white flex text-sm space-x-1 justify-center items-center" href="/proyek/${project.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <span>Lihat Detail</span>
                            </a>
                        </div>
                     </div>
                    `;
                    projectContainer.innerHTML += projectElement;
                }
            });
        })
        .catch(error => console.error('Error fetching projects:', error));
}
    // Memanggil fungsi showDetail dengan ID program default
    showDetail(5);

</script>


</script>
