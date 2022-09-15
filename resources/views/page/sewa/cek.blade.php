@extends('page/layout/app')

@section('title', 'Data Sewa')

@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-8" style="float: left;">

            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        @foreach($data as $dt)
                                        @csrf
                                        <form class="form form-vertical" method="GET" action="{{route('konfirmasi',$dt->id_sewa)}}">
                                            <input type="hidden" name="sewa_id" value="{{$dt->id_sewa}}">
                                            <input type="hidden" name="nominal" value="{{$dt->total}}">
                                            <input type="hidden" name="tanggal" value="{{$dt->tanggal}}">
                                            <input type="hidden" name="status_pembayaran" value="Lunas">
                                            <input type="hidden" name="id_datasewa" value="{{$dt->id_sewa}}">
                                            @if($dt->bukti_tf!=="-" && $dt->keterangan=='Sedang di Cek')
                                            <button class="btn btn-sm btn-outline-primary form-control rounded-pill mt-4" onclick="return confirm('Yakin Mengkonfirmasi transaksi dengan kode TRS-{{$dt->id_sewa}}?')"> <i class="icon dripicons-document-edit" onclick="return confirm('Yakin Data Sudah Benar?')"></i> Konfirmasi</button>
                                            @endif
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        @foreach($data as $dt)
                                        @csrf
                                        <form class="form form-vertical" method="GET" action="{{route('batalkan',$dt->id_sewa)}}">
                                            @if($dt->keterangan!=='Di Batalkan')
                                            <button class="btn btn-sm btn-outline-danger form-control rounded-pill mt-4" onclick="return confirm('Yakin Akan Dibatalkan?')"> <i class="icon dripicons-document-edit"></i> Batalkan</button>
                                            @endif
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        @foreach($data as $dt)
                                        @csrf
                                        <form class="form form-vertical" method="GET" action="{{route('setuju',$dt->id_sewa)}}">
                                            @if($dt->setuju=='0' && $dt->keterangan!=='Di Batalkan' && $dt->keterangan!=='Expired')
                                            <button class="btn btn-sm btn-outline-success form-control rounded-pill mt-4" onclick="return confirm('Yakin Akan Dibatalkan?')"> <i class="icon dripicons-document-edit"></i> Setujui</button>
                                            @endif
                                        </form>
                                        @endforeach
                                    </div>
                                </div>
                                <hr>
                                @foreach($data as $dt)
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">No Transaksi</label>
                                        <p>TRS-{{$dt->id_sewa}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">No KTP</label>
                                        <p>{{$dt->ktp}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Nama</label>
                                        <p>{{$dt->name}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Email</label>
                                        <p>{{$dt->email}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">No Telepon/WA</label>
                                        <p>
                                            @if(substr($dt->no_telp,0,1)=='0')
                                            <a href="https://wa.me/62{{substr($dt->no_telp,1)}}" target="_blank">
                                                62 {{substr($dt->no_telp,1)}}
                                            </a>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Jenis Kelaminn</label>
                                        <p>{{$dt->jenis_kelamin}}</p>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="email-id-vertical">Alamat</label>
                                        <p>{{$dt->alamat_penyewa}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-8" style=" float: left; margin-bottom: 450px;">

            <div class="card">
                <div class="card-header">
                    @foreach($data as $dt)
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
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($jwl as $dt)
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
                    </tr>
                    <?php $no++ ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

        </div>
        <div class="col-12 col-lg-4" style="float: right; margin-bottom: 500px; margin-top: -430px;">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <h4 class="card-title">Bukti Pembayaran</h4>
                        <hr>
                        <div class="form-body">
                            <div class="row">
                                @foreach($data as $dt)
                                @if($dt->bukti_tf=="-")
                                <button class="btn btn-lg btn-danger">Belum Upload <br> Bukti Transfer</button>
                                @endif
                                @if($dt->bukti_tf!=="-" && $dt->isadmin=='0')
                                <img src="{{asset('upload')}}/{{$dt->bukti_tf}}" class="img-thumbnail">
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--  -->

        </div>
        
    </section>
</div>
@endsection