@extends('page/layout/app')

@section('title', 'Data Transaksi Sewa PB')

@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Sewa PB
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>No. Transaksi</th>
                            <th>Nama Lapangan</th>
                            <th>Nama PB</th>
                            <th>Tanggal Transaksi</th>
                            <th>Jadwal</th>
                            <th>Keterangan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($data as $dt)
                        <tr>
                            <td>{{$no}}. </td>
                            <td>TRS-{{$dt->id_sewa}}</td>
                            <td>{{$dt->nama_lapangan->nama_lap}}</td>
                            <td>{{$dt->namapb}}</td>
                            <td>{{$dt->tanggal}}</td>
                            <td>
                                <a href="{{route('jadwal_pb',$dt->id_sewa)}}"><span class="badge bg-primary">Lihat</span></a>
                            </td>
                            <td>
                                @if($dt->keterangan=='Sedang di Cek')
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
                        <td>
                            Rp. {{number_format($dt->total,0,",",".")}}
                        </td>
                        <td align="center">
                            <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_sewa}}" class="btn btn-sm btn-primary">
                                <i class="dripicons dripicons-disc"></i>
                            </button>
                            @if($dt->konfirmasi=='Belum di Konfirmasi')
                            <button data-bs-toggle="modal" data-bs-target="#cek{{$dt->id_sewa}}" class="btn btn-sm btn-success">
                                <i class="dripicons dripicons-document-edit"></i>
                            </button>
                            @endif
                            @if($dt->konfirmasi=="Belum di Konfirmasi" && $dt->keterangan!=='Di Batalkan')
                                <button data-bs-toggle="modal" data-bs-target="#batal{{$dt->id_sewa}}" class="btn btn-sm btn-danger">
                                    X
                                </button>
                                @endif
                            @if($dt->keterangan=='Di Batalkan' || $dt->keterangan=='Expired')
                            <a href="{{route('deletesewa',$dt->id_sewa)}}" onclick="return confirm('Yakin hapus data sewa kode TRS-{{$dt->id_sewa}}?')" class="btn btn-sm btn-danger">
                                <i class="dripicons dripicons-trash"></i>
                            </a>
                            @endif
                            @if($dt->keterangan=="Aktif" || $dt->keterangan=="Mulai")
                            <a href="{{route('notapb',$dt->id_sewa)}}" target="_blank" class="btn btn-sm btn-warning">
                                <i class="dripicons dripicons-direction"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                    <?php $no++ ?>
                    <div class="modal fade" id="edit{{$dt->id_sewa}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Detail Data
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-3">No. Transaksi </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> TRS-{{$dt->id_sewa}} </div>
                                <div class="col-3">Nama PB</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$dt->namapb}} </div>
                                <div class="col-3">Nama Lapangan </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$dt->nama_lapangan->nama_lap}} </div>
                                <div class="col-3">Jenis Lapangan </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{$dt->nama_lapangan->nama_jenis}} </div>
                                <div class="col-3">Tanggal Transaksi</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }} </div>
                                <div class="col-3">Jam Transaksi</div>
                                <div class="col-1">: </div>
                                <div class="col-8"> {{ \Carbon\Carbon::parse($dt->jam_mulai)->format('H:i') }} WIB</div>
                                <div class="col-3">Konfirmasi </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> 
                                    @if($dt->konfirmasi=="Belum di Konfirmasi")
                                    <span class="badge bg-warning">{{$dt->konfirmasi}}</span>
                                    @endif
                                    @if($dt->konfirmasi!=="Belum di Konfirmasi")
                                    <span class="badge bg-primary">{{$dt->konfirmasi}}</span>
                                    @endif
                                </div>
                                <div class="col-3">Keterangan </div>
                                <div class="col-1">: </div>
                                <div class="col-8"> 
                                    @if($dt->keterangan=="-")
                                    <span class="badge bg-danger">Belum Upload Bukti Transfer</span>
                                    @endif
                                    @if($dt->keterangan=="Aktif")
                                    <span class="badge bg-primary">
                                        {{$dt->keterangan}}
                                    </span>
                                    @endif
                                    @if($dt->keterangan=='Selesai')
                                    <span class="badge bg-success">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan=='Di Batalkan')
                                    <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan=='Expired')
                                    <span class="badge bg-danger">Expired</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cek{{$dt->id_sewa}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Konfirmasi
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-vertical" method="GET" action="{{route('konfirmasipb',$dt->id_sewa)}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <h4 class="card-title">No. Transaksi : TRS-{{$dt->id_sewa}}</h4>
                            <h4 class="card-title">Lapangan : {{$dt->nama_lapangan->nama_lap}}</h4>
                            <h4 class="card-title">Tanggal Transaksi : {{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }}</h4>
                            <input type="hidden" name="sewa_id" value="{{$dt->id_sewa}}">
                            <input type="hidden" name="tanggal" value="{{$dt->tanggal}}">
                            <input type="hidden" name="nominal" value="{{$dt->total}}">
                            <input type="hidden" name="status_pembayaran" value="Lunas">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-outline-primary form-control rounded-pill mt-4" style="margin-top: -50px;" onclick="return confirm('Yakin Akan Mengkonfirmasi?')"> <i class="icon dripicons-document-edit"></i> Konfirmasi</button>
                </div>
            </form>
        </div>
        </div>
        </div>
        <div class="modal fade" id="batal{{$dt->id_sewa}}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Batalkan
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form class="form form-vertical" method="GET" action="{{route('batalkanpb',$dt->id_sewa)}}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <h4 class="card-title">No. Transaksi : TRS-{{$dt->id_sewa}}</h4>
                            <h4 class="card-title">Lapangan : {{$dt->nama_lapangan->nama_lap}}</h4>
                            <h4 class="card-title">Tanggal : {{$dt->tanggal}}</h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-outline-danger form-control rounded-pill mt-4" style="margin-top: -50px;" onclick="return confirm('Yakin Akan Dibatalkan?')"> <i class="icon dripicons-document-edit"></i> Batalkan</button>
                </div>
            </form>
        </div>
        </div>
        </div>
@endforeach
</tbody>
</table>
</div>
</div>

</section>
</div>
@endsection