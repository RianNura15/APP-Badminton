@extends('page/layout/app')
@section('title', 'Data Sewa User')
@section('content')
<div class="page-heading">
    <div class="page-heading">
    <a href="{{route('user')}}" class="btn btn-info">Kembali</a>
    </div>
    @foreach($user as $dt)
        <div class="">
            <div class="row">
                <div class="col-md-6 col-offset-md-4">
                    <div class="card">
                        <h5 class="card-header">Menyetujui Akun Untuk Menjadi Member</h5>
                        <div class="card-body">
                            <form action="{{route('gantilevel',$dt->id)}}" method="GET" enctype="multipart/form-data">
                                @csrf
                                <div class="">
                                    <div class="row">
                                        <h4 class="card-title">Nama : {{$dt->name}}</h4>
                                        <h4 class="card-title">Email : {{$dt->email}}</h4>
                                        <h4 class="card-title">Level : {{$dt->level}}</h4>
                                        @if($dt->member == '0')
                                        <h4 class="card-title">Member : <span class="badge bg-danger">Bukan Member</span></h4>
                                        @endif
                                        @if($dt->member == '1')
                                        <h4 class="card-title">Level : <span class="badge bg-success">Member</span></h4>
                                        @endif
                                    </div>
                                </div>
                                @if($dt->member == '0' && $dt->pengajuan_member == '1')
                                <button class="btn btn-sm btn-outline-primary form-control rounded-pill mt-4" onclick="return confirm('Yakin Menyetujui?')"> <i class="icon dripicons-document-edit"></i> Setujui</button>
                                @endif
                            </form>
                        </div>
                        <!-- <div class="card-body">
                            <div class="form-group">
                                <form class="form form-vertical" method="GET" action="{{route('bataluser',$dt->id)}}">
                                    @csrf
                                    @if($dt->cek=='1')
                                    <button class="btn btn-sm btn-outline-danger form-control rounded-pill mt-4" onclick="return confirm('Yakin Akan Dibatalkan?')"> <i class="icon dripicons-document-edit"></i> Batalkan</button>
                                    @endif
                                </form>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <section class="section">
        <div class="card">
            @foreach($user as $dt)
            <div class="card-header">
                Data Transaksi <b>{{$dt->name}}</b>
            </div>
            @endforeach
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>No. Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Tanggal Main</th>
                            <th>Jam Main</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($data as $dt)
                            @if($dt->data_jadwal->keterangan == 'Selesai')
                                <tr>
                                    <td>{{$no}}. </td>
                                    <td>TRS-{{$dt->id_sewa}}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->data_jadwal->tanggalmain)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->data_jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($dt->data_jadwal->jam_selesai)->format('H:i') }} WIB</td>
                                    <td>
                                        <span class="badge bg-success">{{$dt->data_jadwal->keterangan}}</span>
                                    </td>
                                </tr>
                            @endif
                        <?php $no++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection