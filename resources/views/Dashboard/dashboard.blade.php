@extends('Dashboard.layouts.main')


@section('content')
<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
            <div class="row">
                    <div class="col-6">
                        <h5>Selamat Datang !</h5>
                        <p class="text-muted">{{ Auth::user()->name }}</p>

                        <div class="mt-4">
                            <a href="/dashboard/user" class="btn btn-primary btn-sm">Lihat Daftar Seller <i class="mdi mdi-arrow-right ml-1"></i></a>
                        </div>
                    </div>

                    <div class="col-5 ml-auto">
                        <div>
                            <img src="/dashboard/assets/images/widget-img.png" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="header-title mb-4">Laporan Penghasilan Bulan ini</h5>
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted mb-2">Hasil Penjualan bulan ini</p>
                        <h4 class="text-primary">+ @currency($currentMonthSales)</h4>
                    </div>
                    <div>
                        <img width="80" src="/dashboard/assets/images/widget-loan.png" alt="" class="img-fluid">
                    </div>


                </div>
                <hr>
                <div class="media">
                    <div class="media-body">
                        <p class="text-muted">Status Penjualan</p>
                        @if ($currentMonthSales > $previousMonthSales)
                            <h5 class="mb-0 text-primary"> + {{ number_format($percentageChange, 2) }}%<span class="font-size-14 text-muted ml-1">Dari bulan kemarin</span></h5>
                        @else
                            <h5 class="mb-0 text-danger"> {{ number_format($percentageChange, 2) }}%<span class="font-size-14 text-muted ml-1">Dari bulan kemarin</span></h5>
                        @endif
                    </div>

                    <div class="align-self-end ml-2">
                        <a href="/dashboard/sale" class="btn btn-primary btn-sm ml-3">Lihat Data Penjualan <i class="mdi mdi-arrow-right ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Chart Penghasilan</h4>
                <p class="card-title-desc">Berikut adalah Chart Penghasilan berdasarkan bulan</p>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title">5 Data Penjualan Terakhir</h4>
                <p class="card-title-desc">Berikut adalah 5 daftar data penjualan terakhir yang mencakup informasi tentang produk yang terjual, 
                    jumlah penjualan dan informasi lainnya yang relevan.
                </p>

                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Jumlah Terjual</th>
                        <th>Total Pendapatan</th>
                        <th>Tanggal</th>
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $sale->product->name }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td data-sort="{{ $sale->total_price }}">@currency($sale->total_price)</td>
                                <td data-sort="{{ $sale->date }}">{{ \Carbon\Carbon::parse($sale->date)->locale('id')->translatedFormat('l, d F Y') }}</td>
                            </tr>
                        @endforeach

                    
                    </tbody>
                </table>
            </div>
        </div>
    </div> 

    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-transparent p-3">
                <h5 class="header-title mb-0">5 Produk Terlaris</h5>
            </div>
            <ul class="list-group list-group-flush">
                @foreach ($topProducts as $topProduct)
                <li class="list-group-item">
                    <div class="media my-2">
                        <div class="media-body">
                            <p class="text-muted mb-2">{{ $topProduct->product->name }}</p>
                            <h5 class="mb-0">{{ $topProduct->total_quantity }} Terjual</h5>
                        </div>
                        <div class="icons-lg ml-2 align-self-center">
                            <img width="80" src="{{ asset('storage/' . $topProduct->product->image) }}" alt="">
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>
        </div>
    </div>
</div> 

@endsection


@section('script')
    <script>
        !(function (d) {
    "use strict";
    d(function () {
        if (
            ((Chart.defaults.global.defaultFontColor = "#7b919e"),
            (Chart.defaults.scale.gridLines.color = "rgba(123, 145, 158,0.1)"),
            d("#lineChart").length)
        ) {
            var e = d("#lineChart").get(0).getContext("2d");
            new Chart(e, {
                type: "line",
                data: {
                    labels: [
                        "Januari",
                        "Februari",
                        "Maret",
                        "April",
                        "Mei",
                        "Juni",
                        "Juli",
                        "Agustus",
                        "September",
                        "Oktober",
                        "November",
                        "Desember",
                    ],
                    datasets: [
                        {
                            label: "Penghasilan",
                            data: @json(array_values($monthlySales)),
                            borderColor: ["#3ddc97"],
                            borderWidth: 3,
                            fill: !1,
                            pointBackgroundColor: "#ffffff",
                            pointBorderColor: "#3ddc97",
                        },
                        {
                            label: "Total Transaksi",
                            data: @json(array_values($monthlyTransactions)),
                            borderColor: ["#4a8bad"],
                            borderWidth: 3,
                            fill: !1,
                            pointBackgroundColor: "#ffffff",
                            pointBorderColor: "#7c8a96",
                        },
                    ],
                },
                options: {
                    scales: {
                        yAxes: [
                            {
                                gridLines: {
                                    drawBorder: !1,
                                    borderDash: [3, 3],
                                    zeroLineColor: "#7b919e",
                                },
                                ticks: { min: 0, color: "#7b919e" },
                            },
                        ],
                        xAxes: [
                            {
                                gridLines: {
                                    display: !1,
                                    drawBorder: !1,
                                    color: "#ffffff",
                                },
                            },
                        ],
                    },
                    elements: { line: { tension: 0.2 }, point: { radius: 4 } },
                    stepsize: 1,
                },
            });
        }
        if (d("#barChart").length) {
            var a = d("#barChart").get(0).getContext("2d");
            new Chart(a, {
                type: "bar",
                data: {
                    labels: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                    ],
                    datasets: [
                        {
                            label: "Apple",
                            data: [46, 57, 59, 54, 62, 58, 64, 60, 66],
                            backgroundColor: "#eff2f7",
                        },
                        {
                            label: "Samsung",
                            data: [74, 83, 102, 97, 86, 106, 93, 114, 94],
                            backgroundColor: "#3051d3",
                        },
                        {
                            label: "Oppo",
                            data: [37, 42, 38, 26, 47, 50, 54, 55, 43],
                            backgroundColor: "#00a7e1",
                        },
                    ],
                },
                options: {
                    responsive: !0,
                    maintainAspectRatio: !0,
                    scales: {
                        yAxes: [
                            {
                                display: !1,
                                gridLines: { drawBorder: !1 },
                                ticks: { fontColor: "#686868" },
                            },
                        ],
                        xAxes: [
                            {
                                barPercentage: 0.7,
                                categoryPercentage: 0.5,
                                ticks: { fontColor: "#7b919e" },
                                gridLines: { display: !1, drawBorder: !1 },
                            },
                        ],
                    },
                    elements: { point: { radius: 0 } },
                },
            });
        }
        if (d("#areaChart").length) {
            var r = d("#areaChart").get(0).getContext("2d");
            new Chart(r, {
                type: "line",
                data: {
                    labels: [
                        "Jan",
                        "Feb",
                        "Mar",
                        "Apr",
                        "May",
                        "Jun",
                        "Jul",
                        "Aug",
                        "Sep",
                        "Oct",
                        "Nov",
                        "Dec",
                    ],
                    datasets: [
                        {
                            data: [
                                22, 23, 28, 20, 27, 20, 20, 24, 10, 35, 20, 25,
                            ],
                            backgroundColor: ["#3ddc97"],
                            borderColor: ["#3ddc97"],
                            borderWidth: 2,
                            fill: "origin",
                            label: "Upcube",
                        },
                        {
                            data: [
                                50, 40, 48, 70, 50, 63, 63, 42, 42, 51, 35, 35,
                            ],
                            backgroundColor: ["rgba(0, 167, 225, 0.3)"],
                            borderColor: ["#00a7e1"],
                            borderWidth: 1,
                            fill: "origin",
                            label: "Zinzer",
                        },
                        {
                            data: [
                                95, 75, 90, 105, 95, 95, 95, 100, 75, 95, 90,
                                105,
                            ],
                            backgroundColor: ["rgba(223, 227, 233, 0.2)"],
                            borderColor: ["#dfe3e9"],
                            borderWidth: 1,
                            fill: "origin",
                            label: "Drixo",
                        },
                    ],
                },
                options: {
                    responsive: !0,
                    maintainAspectRatio: !0,
                    plugins: { filler: { propagate: !1 } },
                    scales: {
                        xAxes: [
                            {
                                gridLines: {
                                    display: !1,
                                    drawBorder: !1,
                                    color: "transparent",
                                    zeroLineColor: "#eeeeee",
                                },
                            },
                        ],
                        yAxes: [
                            {
                                gridLines: {
                                    drawBorder: !1,
                                    borderDash: [3, 3],
                                },
                            },
                        ],
                    },
                    legend: { display: !1 },
                    tooltips: { enabled: !0 },
                    elements: { line: { tension: 0 }, point: { radius: 0 } },
                },
            });
        }
        if ((areaChart, d("#pieChart").length)) {
            var o = d("#pieChart").get(0).getContext("2d");
            new Chart(o, {
                type: "pie",
                data: {
                    datasets: [
                        {
                            data: [21, 16, 48, 31],
                            backgroundColor: [
                                "#3ddc97",
                                "#3051d3",
                                "#00a7e1",
                                "#e4cc37",
                            ],
                            borderColor: [
                                "#3ddc97",
                                "#3051d3",
                                "#00a7e1",
                                "#e4cc37",
                            ],
                        },
                    ],
                    labels: ["Drixo", "Upcube", "Vakavia", "Devazo"],
                },
                options: {
                    responsive: !0,
                    animation: { animateScale: !0, animateRotate: !0 },
                },
            });
        }
        if (d("#donut-chart").length)
            (o = d("#donut-chart").get(0).getContext("2d")),
                new Chart(o, {
                    type: "pie",
                    data: {
                        datasets: [
                            {
                                data: [21, 16, 48, 31],
                                backgroundColor: [
                                    "#3051d3",
                                    "#00a7e1",
                                    "#3ddc97",
                                    "#e4cc37",
                                ],
                                borderColor: [
                                    "#3051d3",
                                    "#00a7e1",
                                    "#3ddc97",
                                    "#e4cc37",
                                ],
                            },
                        ],
                        labels: ["Drixo", "Upcube", "Vakavia", "Devazo"],
                    },
                    options: {
                        responsive: !0,
                        cutoutPercentage: 70,
                        animation: { animateScale: !0, animateRotate: !0 },
                    },
                });
        if (d("#radar-chart").length) {
            var t = d("#radar-chart").get(0).getContext("2d");
            new Chart(t, {
                type: "radar",
                data: {
                    datasets: [
                        {
                            label: "Unhealthy",
                            backgroundColor: "rgba(223, 227, 233, 0.2)",
                            borderColor: "#dfe3e9",
                            borderWidth: 1,
                            pointBackgroundColor: "#dfe3e9",
                            pointBorderColor: "#fff",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: "#dfe3e9",
                            data: [65, 59, 90, 81, 56, 55, 40],
                        },
                        {
                            label: "Healthy",
                            backgroundColor: "rgba(48, 81, 211, 0.2)",
                            borderColor: "#3051d3",
                            borderWidth: 1,
                            pointBackgroundColor: "#3051d3",
                            pointBorderColor: "#fff",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: "#3051d3",
                            data: [28, 48, 40, 19, 96, 27, 100],
                        },
                    ],
                    labels: [
                        "Eating",
                        "Drinking",
                        "Sleeping",
                        "Designing",
                        "Coding",
                        "Cycling",
                        "Running",
                    ],
                },
                options: {
                    responsive: !0,
                    cutoutPercentage: 70,
                    animation: { animateScale: !0, animateRotate: !0 },
                },
            });
        }
    });
})(jQuery);

    </script>
@endsection