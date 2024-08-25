<div class="w-screen h-[500px] max-md:h-[300px] flex max-md:flex-col justify-center items-center pt-20 bg-cover bg-center bg-responsive">
    <div class="w-full h-full flex flex-col justify-center items-start space-y-4 px-60 max-md:px-5">
        <h1 class=' font-light text-2xl text-white'><a href="{{url('/')}}">Beranda </a><a href="{{url('/laporan')}}">/ Laporan /</a> {{$laporan->judul_laporan}}</h1>
        <h1 class=' font-black text-7xl text-white max-md:text-5xl'>{{$laporan->judul_laporan}}</h1>
        <h1 class=' font-light text-2xl text-white'>Nama Mitra . {{$laporan->bulan}} {{$laporan->tanggal}},{{$laporan->tahun}}</h1>
    </div>
</div>

<style>
    .bg-responsive {
    background-image: url('/images/bg2.png');
    background-size: cover;
    background-repeat: no-repeat;
}

@media (max-width: 768px) {
    /* For screens smaller than the md breakpoint */
    .bg-responsive {
        background-image: url('/images/bg-phone.png');
    }
}
</style>