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
                            <th>Nama PB/Klub</th>
                            <th>Jatuh Tempo</th>
                            <th>Tanggal Main</th>
                            <th>Jam Main</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
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
                                @if($dt->keterangan=='Di Batalkan')
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
                                @if($dt->keterangan=='Di Batalkan')
                                <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                @endif
                                @if($dt->keterangan=='Expired')
                                <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                @endif
                                 @if($dt->keterangan=='Mulai')
                                <span class="badge bg-info">{{$dt->keterangan}}</span>
                                @endif
                            </td>
                        <!-- <td>
                            @if($dt->tempo==date('Y-m-d') AND date('H:i:s')>=$dt->jam_selesai AND $dt->bukti_tf=="-")
                            <span class="badge bg-danger">Di Batalkan <br>Data akan di Hapus</span>
                            @endif
                            @if($dt->tempo==date('Y-m-d') AND date('H:i:s')>=$dt->jam_selesai AND $dt->bukti_tf!=="-")
                            <span class="badge bg-primary">{{$dt->keterangan}}</span>
                            @endif

                            @if($dt->tempo!==date('Y-m-d') AND date('H:i:s')>=$dt->jam_selesai AND $dt->bukti_tf=="-")
                            <span class="badge bg-primary">Berlangsung</span>
                            @endif
                        </td> -->
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