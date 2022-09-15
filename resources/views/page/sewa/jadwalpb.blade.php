@extends('page/layout/app')

@section('title', 'Data Sewa')

@section('content')
    <div class="page-heading">

        <section class="section">
            <div class="card">
                <div class="card-header">
                    @foreach($trs as $dt)
                    No Transaksi : <b>TRS-{{$dt->id_sewa}}</b>
                    @endforeach 
                </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>ID Transaksi</th>
                            <th>Nama Lapangan</th>
                            <th>Tempo</th>
                            <th>Tanggal Main</th>
                            <th>Jam Main</th>
                            <th>Total Jam</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($data as $dt)
                        <?php date_default_timezone_set('Asia/Jakarta');
                        $mulai=strtotime($dt->jam_mulai);
                        $selesai=strtotime($dt->jam_selesai);

                        $dif=$selesai-$mulai;

                        $jam=floor($dif/(60*60));
                        ?>
                        <tr>
                            <td>{{$no}}. </td>
                            <td>TRS-{{$dt->id_datasewa}}</td>
                            <td>{{$dt->data_sewa->nama_lap}}</td>
                            <td>
                                @if($dt->keterangan=='-')
                                {{ \Carbon\Carbon::parse($dt->expired)->diffForHumans() }}
                                @endif
                                @if($dt->keterangan=='Expired')
                                <span class="badge bg-danger">Sudah Expired</span>
                                @endif
                                @if($dt->keterangan=='Aktif' || $dt->keterangan=='Selesai' || $dt->keterangan=='Mulai')
                                <span class="badge bg-primary">Clear</span>
                                @endif
                                @if($dt->keterangan=='Di Batalkan')
                                <span class="badge bg-danger">---</span>
                                @endif
                                @if($dt->keterangan=='Pending')
                                <span class="badge bg-warning">---</span>
                                @endif
                            </td>
                            <td>{{$dt->tanggalmain}}</td>
                            <td>{{ \Carbon\Carbon::parse($dt->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($dt->jam_selesai)->format('H:i') }} WIB</td>
                            <td>{{$jam}} Jam</td>
                            <td>
                                @if($dt->keterangan=='Pending')
                                <span class="badge bg-warning">{{$dt->keterangan}}</span>
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
                            <td align="center">
                                <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_sewa}}" class="btn btn-sm btn-primary">
                                    <i class="dripicons dripicons-disc"></i>
                                </button>
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