@extends('page/layout/app')
@section('title', 'Data Jadwal')
@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Jadwal
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>No. Transaksi</th>
                            <th>Nama Lapangan</th>
                            <th>Nama Penyewa</th>
                            <th>Nama Sewa/Klub</th>
                            <th>Jatuh Tempo</th>
                            <th>Tanggal Main</th>
                            <th>Jam Main</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php $today = date('Y-m-d'); ?>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$no}}. </td>
                                <td>TRS-{{$dt->id_datasewa}}</td>
                                <td>{{$dt->lapangan->nama_lap}}</td>
                                <td>{{$dt->data_sewa->name}}</td>
                                <td>{{$dt->data_sewa->namapb}}</td>
                                <td>
                                    @if($dt->keterangan=='-')
                                    {{ \Carbon\Carbon::parse($dt->expired)->locale('id')->diffForHumans() }}
                                    @endif
                                    @if($dt->keterangan=='Expired')
                                        <span class="badge bg-danger">Sudah Expired</span>
                                    @endif
                                    @if($dt->keterangan=='Pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                    @if($dt->keterangan=='Aktif' || $dt->keterangan=='Selesai' || $dt->keterangan=='Mulai')
                                        <span class="badge bg-primary">Clear</span>
                                    @endif
                                    @if($dt->keterangan=='Di Batalkan Admin' || $dt->keterangan=='Di Batalkan Pelanggan')
                                        <span class="badge bg-danger">Batal</span>
                                    @endif
                                </td>
                                <td>{{$dt->tanggalmain}}</td>
                                <td>
                                    {{ \Carbon\Carbon::parse($dt->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($dt->jam_selesai)->format('H:i') }} WIB
                                </td>
                                <td>
                                    @if($dt->keterangan=='Pending')
                                        <span class="badge bg-warning">Pending</span>
                                    @endif
                                    @if($dt->keterangan=='Aktif')
                                        <span class="badge bg-primary">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan=='Selesai')
                                        <span class="badge bg-success">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan=='Di Batalkan Pelanggan' || $dt->keterangan=='Di Batalkan Admin')
                                        <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan=='Expired')
                                        <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan=='Mulai')
                                        <span class="badge bg-info">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan=='-')
                                        <span class="badge bg-warning">Menunggu</span>
                                    @endif
                                </td>
                                <td>
                                    @if($dt->tanggalmain < $today && $dt->keterangan == 'Aktif' || $dt->tanggalmain < $today && $dt->keterangan == 'Mulai')
                                        <a href="{{route('jadwalselesai',$dt->id_jadwal)}}" onclick="return confirm('Yakin data jadwal No. Transaksi TRS-{{$dt->id_datasewa}} sudah selesai?')" class="btn btn-sm btn-success">
                                            ✔
                                        </a>
                                    @endif
                                </td>
                            </tr>
                            <?php $no++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection