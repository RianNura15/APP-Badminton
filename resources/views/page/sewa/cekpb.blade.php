@extends('page/layout/app')

@section('title', 'Data Sewa')

@section('content')
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-8">

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
                                            <input type="hidden" name="tanggal" value="{{$dt->tanggal}}">
                                            <input type="hidden" name="nominal" value="{{$dt->total}}">
                                            <input type="hidden" name="status_pembayaran" value="Lunas">
                                            @if($dt->keterangan!=='Aktif')
                                            <button class="btn btn-sm btn-outline-primary form-control rounded-pill mt-4" onclick="return confirm('Yakin Mengkonfirmasi transaksi dengan kode TRS-{{$dt->id_sewa}}?')"> <i class="icon dripicons-document-edit" onclick="return confirm('Yakin Data Sudah Benar?')"></i> Confirm</button>
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
        <div class="col-12 col-lg-4">
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
                                @if($dt->bukti_tf!=="-")
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