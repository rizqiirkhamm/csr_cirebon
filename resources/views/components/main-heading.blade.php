{{-- Heading --}}
<div class="w-screen h-screen flex max-md:flex-col justify-between items-center pt-20 bg-cover bg-center bg-responsive">
    <div class="w-1/2 max-md:w-full max-md:h-1/2 h-full flex flex-col justify-center items-start space-y-4">
        <h1 class=' font-black text-6xl text-white pl-60 max-md:px-5 max-md:text-5xl'>Selamat datang di portal CSR
            Kab. Cirebon</h1>
        <h1 class=' font-medium text-2xl text-white pl-60 max-md:px-5'>Ketahui dan kenali customer social
            responsibility terhadap Kabupaten Cirebon dari para Mitra.</h1>
    </div>
    <div class="w-1/2 max-md:w-full max-md:h-1/2 h-full flex flex-col justify-end items-center space-y-4">
        <div class="slider-container w-full max-w-lg mx-auto p-5 bg-gray-800 text-white relative overflow-hidden">
            <!-- Slider Wrapper -->
            <div id="laporan-slider" class="slider-wrapper relative w-full h-64">
        
                <!-- Data Laporan -->
                @foreach ($laporanTerbaru as $index => $item)
                    <div class="slide absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $loop->first ? 'active' : 'hidden' }}">
                        <div class="slide-content p-5">
                            <div class="date bg-red-600 inline-block px-3 py-1 text-xs font-bold uppercase">
                                {{ \Carbon\Carbon::parse($item->created_at)->format('D, d M Y') }}
                            </div>
                            <h2 class="mt-4 text-2xl font-bold">{{ $item->judul_laporan }}</h2>
                            <p class="mt-2 text-sm text-ellipsis overflow-hidden">{{ \Illuminate\Support\Str::limit($item->deskripsi, 150) }}</p>
                        </div>
                    </div>
                @endforeach
        
            </div>
        
            <!-- Slider Indicators -->
            <div class="indicators absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-2">
                @foreach ($laporanTerbaru as $index => $item)
                    <span class="indicator w-3 h-3 rounded-full cursor-pointer {{ $loop->first ? 'bg-red-600' : 'bg-gray-500' }}"></span>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .bg-responsive {
        background-image: url('/images/bg.png');
        background-size: cover;
        background-repeat: no-repeat;
    }

    @media (max-width: 768px) {
        /* For screens smaller than the md breakpoint */
        .bg-responsive {
            background-image: url('/images/bg-phone.png');
        }
    }

    .slide {
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .slide.active {
        opacity: 1;
    }

    .text-ellipsis {
        display: -webkit-box;
        -webkit-line-clamp: 3; /* number of lines to show */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<script>
    // Function to automatically cycle through slides
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const indicators = document.querySelectorAll('.indicator');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            indicators[i].classList.remove('bg-red-600');
            indicators[i].classList.add('bg-gray-500');
        });
        slides[index].classList.add('active');
        indicators[index].classList.add('bg-red-600');
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % slides.length;
        showSlide(currentIndex);
    }

    setInterval(nextSlide, 3000); // Change slide every 3 seconds

    // Jika Anda ingin mengganti data secara otomatis menggunakan AJAX
    setInterval(function() {
        fetch('/path-to-fetch-new-reports')
            .then(response => response.json())
            .then(data => {
                updateSliderContent(data);
            });
    }, 3000);

    function updateSliderContent(data) {
        slides.forEach((slide, i) => {
            slide.querySelector('.date').innerText = formatDate(data[i].created_at);
            slide.querySelector('h2').innerText = data[i].judul_laporan;
            slide.querySelector('p').innerText = data[i].deskripsi;
        });
    }

    function formatDate(dateString) {
        const date = new Date(dateString);
        return date.toLocaleDateString('id-ID', { weekday: 'short', day: '2-digit', month: 'short', year: 'numeric' });
    }

</script>
