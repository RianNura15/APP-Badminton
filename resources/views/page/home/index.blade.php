@extends('page/layout/app')
@section('title', 'Dashboard')
@section('content')
<div class="page-heading">
    <h3>Selamat Datang {{auth()->user()->name}}</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon yellow">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Belum Bayar</h6>
                                    <h6 class="font-extrabold mb-0">{{$pending}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Aktif</h6>
                                    <h6 class="font-extrabold mb-0">{{$aktif}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Bayar DP</h6>
                                    <h6 class="font-extrabold mb-0">{{$dp}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Laporan</h6>
                                    <h6 class="font-extrabold mb-0">{{$sewa}}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>    
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="{{asset('template/dist/assets/images/faces/2.jpg')}}" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold">{{Auth::user()->name}}</h5>
                            <h6 class="text-muted mb-0">{{Auth::user()->level}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <section id="multiple-column-form">
                                <div class="row match-height">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <h4 class="card-title">Jadwal</h4>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <input type="date" id="search" class="form-control" name="search">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-12">
                                                            <div class="form-group">
                                                                <a class="btn btn-primary form-control" id="searchButton">Cari</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid text-center" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); grid-gap: 10px; margin-top: -30px;">
                                    <span class="badge bg-success" style="padding: 5px; font-size: 18px;"></span>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <div id="lapanganContainer"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('search');
        searchInput.value = new Date().toISOString().slice(0, 10);
        fetchData();

        document.getElementById('searchButton').addEventListener('click', function() {
            fetchData();
        });
    });

    function fetchData() {
        const search = document.getElementById('search').value || new Date().toISOString().slice(0, 10);

        fetch(`/adminjadwal?search=${search}`)
            .then(response => response.json())
            .then(data => {
                const lapanganContainer = document.getElementById('lapanganContainer');
                lapanganContainer.innerHTML = '';

                Object.keys(data).forEach(id_lapangan => {
                    const lapangan = data[id_lapangan];
                    const penandaJam = lapangan.penanda_jam;

                    const lapanganSection = document.createElement('section');
                    lapanganSection.classList.add('row');
                    lapanganSection.innerHTML = `
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <section id="multiple-column-form">
                                            <div class="row match-height">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <h4 class="card-title">${lapangan.nama_lapangan}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <div class="grid text-center" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); grid-gap: 10px; margin-top: -30px;"> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;

                    const gridDiv = lapanganSection.querySelector('.grid');

                    Object.keys(penandaJam).forEach(jam => {
                        const info = penandaJam[jam];
                        const span = document.createElement('span');
                        span.classList.add('badge');
                        span.classList.add(getBadgeClass(info.color));
                        span.innerHTML = `<strong>${jam.slice(0, 5)}</strong><br>${info.namapb}`;
                        gridDiv.appendChild(span);
                    });

                    lapanganContainer.appendChild(lapanganSection);
                });
            });
    }

    function getBadgeClass(color) {
        switch (color) {
            case 'LimeGreen': return 'bg-success';
            case 'red': return 'bg-danger';
            case 'yellow': return 'bg-warning';
            case '#0078D7': return 'bg-primary';
            case '#383838': return 'bg-secondary';
            default: return 'bg-secondary';
        }
    }
</script>
@endsection