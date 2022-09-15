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
                                        </div>
                                    </div>
                                    <!-- @if($dt->cek=='0')
                                    <button class="btn btn-sm btn-outline-primary form-control rounded-pill mt-4" onclick="return confirm('Yakin Data Sudah Benar?')"> <i class="icon dripicons-document-edit"></i> Setujui</button>
                                    @endif -->
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
                            <th>Nama Lapangan</th>
                            <th>Keterangan</th>
                            <th>Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach($data as $dt)
                        <tr>
                            <td>{{$no}}. </td>
                            <td>TRS-{{$dt->id_sewa}}</td>
                            <td>{{$dt->nama_lapangan->nama_lap}}</td>
                            <td>
                                @if($dt->keterangan=='Sedang di Cek')
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
                            <td>
                                @if($dt->konfirmasi=='Sudah di Konfirmasi')
                                <span class="badge bg-primary">{{$dt->konfirmasi}}</span>
                                @endif
                                @if($dt->konfirmasi=='Belum di Konfirmasi')
                                <span class="badge bg-danger">{{$dt->konfirmasi}}</span>
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