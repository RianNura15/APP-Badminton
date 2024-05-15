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
                <div class="card">
                            <div class="card-header">
                                <div class="col-12 col-md-6 order-md-1 order-last">
                                    <h3>Data Jadwal</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>No Transaksi</th>
                                            <th>Nama Lapangan</th>
                                            <th>Nama Penyewa</th>
                                            <th>Nama PB/Klub</th>
                                            <th>Tanggal Main</th>
                                            <th>Jam Main</th>
                                            <th>Lama Sewa</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $nul=0; ?>
                                        <?php $no=1; ?>
                                        @foreach($data as $dt)
                                        <?php date_default_timezone_set('Asia/Jakarta');
                                        $mulai=strtotime($dt->jam_mulai);
                                        $selesai=strtotime($dt->jam_selesai);

                                        $dif=$selesai-$mulai;

                                        $jam=floor($dif/(60*60));
                                        $menit=$dif-$jam*(60*60);
                                        $menit2=floor($menit/60);
                                        if ($menit2>=30) {
                                            $jam+=1;
                                        }
                                        ?>
                                        <tr>
                                            <td>{{$no}}. </td>
                                            <td>TRS-{{$dt->id_datasewa}}</td>
                                            <td>{{$dt->data_sewa->nama_lap}}</td>
                                            <td>{{$dt->data_sewa->name}}</td>
                                            <td>{{$dt->data_sewa->namapb}}</td>
                                            <td>{{$dt->tanggalmain}}</td>
                                            <td>{{ \Carbon\Carbon::parse($dt->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($dt->jam_selesai)->format('H:i') }}</td>
                                            <td>
                                                {{$jam}} Jam
                                            </td>
                                            <td>{{$dt->keterangan}}</td>
                                        </tr>
                                        <?php $no++ ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
@endsection