@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Reports Hewan Masuk & Keluar</h3>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row">
        <!-- Chart Hewan Masuk -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hewan Masuk</h5>
                    <div id="hewanMasukChart"></div>
                </div>
            </div>
        </div>

        <!-- Chart Hewan Keluar -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Hewan Keluar</h5>
                    <div id="hewanKeluarChart"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(isset($hewanMasukData) && isset($hewanKeluarData))
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hewanMasukData = @json($hewanMasukData);
        const hewanKeluarData = @json($hewanKeluarData);

        // Pastikan data tersedia sebelum menampilkan chart
        if (hewanMasukData.counts.length > 0) {
            var optionsMasuk = {
                chart: {
                    type: 'line',
                    height: 300,
                    toolbar: { show: false }
                },
                colors: ['#28a745'], // Warna hijau
                series: [{
                    name: 'Hewan Masuk',
                    data: hewanMasukData.counts
                }],
                xaxis: {
                    categories: hewanMasukData.dates,
                    title: { text: 'Tanggal' }
                },
                yaxis: {
                    title: { text: 'Jumlah' }
                },
                stroke: {
                    curve: 'smooth'
                }
            };
            new ApexCharts(document.querySelector("#hewanMasukChart"), optionsMasuk).render();
        } else {
            document.querySelector("#hewanMasukChart").innerHTML = "<p class='text-muted'>Tidak ada data</p>";
        }

        if (hewanKeluarData.counts.length > 0) {
            var optionsKeluar = {
                chart: {
                    type: 'line',
                    height: 300,
                    toolbar: { show: false }
                },
                colors: ['#dc3545'], // Warna merah
                series: [{
                    name: 'Hewan Keluar',
                    data: hewanKeluarData.counts
                }],
                xaxis: {
                    categories: hewanKeluarData.dates,
                    title: { text: 'Tanggal' }
                },
                yaxis: {
                    title: { text: 'Jumlah' }
                },
                stroke: {
                    curve: 'smooth'
                }
            };
            new ApexCharts(document.querySelector("#hewanKeluarChart"), optionsKeluar).render();
        } else {
            document.querySelector("#hewanKeluarChart").innerHTML = "<p class='text-muted'>Tidak ada data</p>";
        }
    });
</script>
@endif

@endsection
