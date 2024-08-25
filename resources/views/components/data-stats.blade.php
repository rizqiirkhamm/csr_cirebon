{{-- Data Stats --}}
<div class="w-screen h-auto py-24 px-60 flex flex-col justify-center items-center space-y-9 max-md:px-5 bg-white">
    <div class='w-full flex justify-center items-center flex-col space-y-4'>
        <div class='w-16 h-1 bg-orange-500'></div>
        <h1 class='font-black text-4xl'>Data Statistik</h1>
    </div>

    <div class='w-full flex justify-between items-center space-x-2'>

        <!-- Select Tahun -->
        <div class="w-96 h-14 flex items-center border rounded-lg p-2 bg-white max-md:w-1/4 max-md:h-12">
            <select class="border-none bg-transparent w-full max-md:text-sm">
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <!-- Tambahkan lebih banyak opsi jika diperlukan -->
            </select>
        </div>

        <!-- Select Kuartal -->
        <div class="w-96 h-14 flex items-center border rounded-lg p-2 bg-white max-md:w-1/4 max-md:h-12">
            <select class="border-none bg-transparent w-full max-md:text-sm">
                <option value="Q1">Kuartal 1 (Jan, Feb, Mar)</option>
                <option value="Q2">Kuartal 2 (Apr, Mei, Jun)</option>
                <option value="Q3">Kuartal 3 (Jul, Agu, Sep)</option>
                <option value="Q4">Kuartal 4 (Okt, Nov, Des)</option>
            </select>
        </div>

        <!-- Tombol Unduh .csv -->
        <a href="path/to/csv"
            class="flex h-14 items-center border rounded-lg p-2 px-3 space-x-3 bg-white hover:bg-gray-100 max-md:w-1/4 max-md:h-12">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                    clip-rule="evenodd" />
            </svg>
            <span class="mr-2 max-md:text-sm">Unduh .csv</span>
        </a>

        <!-- Tombol Unduh .pdf -->
        <a href="path/to/pdf"
            class="flex h-14 items-center border rounded-lg p-2 px-3 space-x-3 bg-white hover:bg-gray-100 max-md:w-1/4 max-md:h-12">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd"
                    d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                    clip-rule="evenodd" />
            </svg>
            <span class="mr-2 max-md:text-sm">Unduh .pdf</span>
        </a>
    </div>


    {{-- Data Statistik --}}
    <div class="w-screen h-auto py-24 px-60 flex flex-col justify-center items-center space-y-9 max-md:px-5">
        <div class='w-full flex justify-center items-center flex-col space-y-4'>
            <div class='w-16 h-1 bg-orange-500'></div>
            <h1 class='font-black text-4xl'>Data Statistik</h1>
        </div>
        <div class='w-full h-auto grid grid-cols-4 max-md:grid-cols-2 max-md:gap-y-4'>
            <div class='w-full h-full border-l-2 border-orange-500 p-5 flex justify-center items-start flex-col'>
                <h1 class='font-black text-5xl max-md:text-4xl'>{{ $jumlahProyek }}</h1>
                <h1>Total Proyek CSR</h1>
            </div>
            <div class='w-full h-full border-l-2 border-orange-500 p-5 flex justify-center items-start flex-col'>
                <h1 class='font-black text-5xl max-md:text-4xl'>{{ $jumlahProyekTerealisasi }}</h1>
                <h1>Proyek Terealisasi</h1>
            </div>
            <div class='w-full h-full border-l-2 border-orange-500 p-5 flex justify-center items-start flex-col'>
                <h1 class='font-black text-5xl max-md:text-4xl'>{{ $jumlahMitra }}</h1>
                <h1>Mitra Bergabung</h1>
            </div>
            <div class='w-full h-full border-l-2 border-orange-500 p-5 flex justify-center items-start flex-col'>
                <h1 class='font-black text-4xl max-md:text-3xl'>{{ $formattedDanaRealisasi }}</h1>
                <h1>Dana Realisasi CSR</h1>
            </div>
        </div>
    </div>


    {{-- Stats --}}
    <div class="w-screen h-auto pt-24 px-60 flex flex-col justify-center items-center space-y-9 max-md:px-5">
        <div class='w-full flex justify-center items-start flex-col space-y-4'>
            <div class='w-16 h-1 bg-orange-500'></div>
            <h1 class='font-black text-4xl'>Realisasi proyek CSR</h1>
        </div>
        <div class='w-full flex justify-between items-center bg-slate-100 rounded-md max-md:flex-col'>
            <div class="w-1/2 h-[450px] max-md:w-full">
                <h1 class='font-black text-2xl p-5'>Persentase jumlah realisasi proyek per sektor</h1>
                <div id="pie-chart"></div>
            </div>
            <div class="w-1/2 h-[450px] max-md:w-full">
                <h1 class='font-black text-2xl p-5'>Total realisasi proyek per sektor</h1>
                <div id="bar-chart-1"></div>
            </div>
        </div>
        <div class='w-full flex justify-between items-center bg-slate-100 rounded-md max-md:flex-col'>
            <div class="w-1/2 h-[450px] max-md:w-full">
                <h1 class='font-black text-2xl p-5'>Jumlah realisasi terbanyak berdasarkan mitra</h1>
                <div id="bar-chart-2"></div>
            </div>
            <div class="w-1/2 h-[450px] max-md:w-full">
                <h1 class='font-black text-2xl p-5'>Jumlah realisasi terbanyak berdasarkan kecamatan</h1>
                <div id="bar-chart-3"></div>
            </div>
        </div>
    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {

    var categories = @json($categories);
    var data = @json($data);

    var barOptions1 = {
        series: [{
            data: data
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                borderRadiusApplication: 'end',
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        xaxis: {
            categories: categories,
        }
    }

        var barChart1 = new ApexCharts(document.querySelector("#bar-chart-1"),
            barOptions1);
        barChart1.render();

        var barOptions2 = {
            series: [{
                data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France',
                    'Japan',
                    'United States', 'China', 'Germany'
                ],
            }
        }

        var barChart2 = new ApexCharts(document.querySelector("#bar-chart-2"),
            barOptions2);
        barChart2.render();

        var barOptions3 = {
            series: [{
                data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    borderRadius: 4,
                    borderRadiusApplication: 'end',
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France',
                    'Japan',
                    'United States', 'China', 'Germany'
                ],
            }
        }

        var barChart3 = new ApexCharts(document.querySelector("#bar-chart-3"),
            barOptions3);
        barChart3.render();

        // Pie Chart
        var pieOptions = {
            chart: {
                type: 'pie',
                height: 350
            },
            series: [44, 55, 13, 43, 22],
            labels: ['Team A', 'Team B', 'Team C', 'Team D', 'Team E']
        }

        var pieChart = new ApexCharts(document.querySelector("#pie-chart"), pieOptions);
        pieChart.render();
    });

</script>
