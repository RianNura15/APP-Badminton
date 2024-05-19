@extends('page/layout/app')
@section('title', 'Data Transaksi Sewa')
@section('content')
<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Sewa Lapangan
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>No. Transaksi</th>
                            <th>Penyewa</th>
                            <th>Nama Lapangan</th>
                            <th>Nama Sewa/Klub</th>
                            <th>Tanggal</th>
                            <th>Pembayaran</th>
                            <th>Jatuh Tempo</th>
                            <th>Keterangan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php $today = date('Y-m-d'); ?>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$no}}. </td>
                                <td>TRS-{{$dt->id_sewa}}</td>
                                <td>{{$dt->user->name}}</td>
                                <td>{{$dt->nama_lapangan->nama_lap}}</td>
                                <td>{{$dt->namapb}}</td>
                                <td>{{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }}</td>
                                <td>
                                    @if($dt->bukti_tf == 'Belum di Bayar')
                                        <span class="badge bg-warning">{{$dt->bukti_tf}}</span>
                                    @endif
                                    @if($dt->bukti_tf == 'Terbayar')
                                        <span class="badge bg-primary">{{$dt->bukti_tf}}</span>
                                    @endif
                                    @if($dt->bukti_tf == 'DP Terbayar')
                                        <span class="badge bg-info">{{$dt->bukti_tf}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($dt->keterangan == '-')
                                    {{ \Carbon\Carbon::parse($dt->tempo)->locale('id')->diffForHumans() }}
                                    @endif
                                    @if($dt->keterangan == 'Expired')
                                        <span class="badge bg-danger">Sudah Expired</span>
                                    @endif
                                    @if($dt->keterangan == 'Clear')
                                        <span class="badge bg-primary">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan == 'DP')
                                        <span class="badge bg-info">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan == 'Di Batalkan Pelanggan' || $dt->keterangan == 'Di Batalkan Admin')
                                        <span class="badge bg-danger">X</span>
                                    @endif
                                </td>
                                <td>
                                    @if($dt->keterangan == 'Clear')
                                        <span class="badge bg-primary">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan == '-')
                                        <span class="badge bg-warning">Menunggu Pembayaran</span>
                                    @endif
                                    @if($dt->keterangan == 'DP')
                                        <span class="badge bg-info">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan == 'Di Batalkan Pelanggan' || $dt->keterangan == 'Di Batalkan Admin')
                                        <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                    @endif
                                    @if($dt->keterangan == 'Expired')
                                        <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                    @endif
                                </td>
                                <td>
                                    Rp. {{number_format($dt->total,0,",",".")}}
                                </td>
                                <td align="center">
                                    <!-- <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_sewa}}" class="btn btn-sm btn-primary">
                                        <i class="dripicons dripicons-disc"></i>
                                    </button> -->
                                    <a href="{{route('cek_data',$dt->id_sewa)}}" class="btn btn-sm btn-success">
                                        <i class="dripicons dripicons-document-edit"></i>
                                    </a>
                                    <!-- @if($dt->keterangan=='Di Batalkan' || $dt->keterangan=='Expired')
                                    <a href="{{route('deletesewa',$dt->id_sewa)}}" onclick="return confirm('Yakin hapus data sewa kode TRS-{{$dt->id_sewa}}?')" class="btn btn-sm btn-danger">
                                        <i class="dripicons dripicons-trash"></i>
                                    </a>
                                    @endif -->
                                    @if($dt->tanggal < $today && $dt->keterangan == '-' && $dt->bukti_tf == 'Belum di Bayar')
                                    <a href="{{route('expired',$dt->id_sewa)}}" onclick="return confirm('Yakin data sewa kode TRS-{{$dt->id_sewa}} sudah expired?')" class="btn btn-sm btn-danger">
                                        ✖
                                    </a>
                                    @endif
                                    @if($dt->keterangan == "Clear")
                                    <a href="{{route('nota',$dt->id_sewa)}}" target="_blank" class="btn btn-sm btn-warning">
                                        <i class="dripicons dripicons-direction"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            <?php $no++ ?>
                            <div class="modal fade" id="edit{{$dt->id_sewa}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Detail Data</h5>
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
                                                <div class="col-3">Penyewa</div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> {{$dt->user->name}} </div>
                                                <div class="col-3">Lapangan </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> {{$dt->nama_lapangan->nama_lap}} - {{$dt->nama_lapangan->nama_jenis}} </div>
                                                <div class="col-3">Total </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> Rp {{number_format($dt->total,0,",",".")}} </div>
                                                <div class="col-3">Tanggal Transaksi</div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> {{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }} </div>
                                                <div class="col-3">Konfirmasi </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> 
                                                    @if($dt->konfirmasi == "Belum di Konfirmasi")
                                                        <span class="badge bg-warning">{{$dt->konfirmasi}}</span>
                                                    @endif
                                                    @if($dt->konfirmasi !== "Belum di Konfirmasi")
                                                        <span class="badge bg-primary">{{$dt->konfirmasi}}</span>
                                                    @endif
                                                </div>
                                                <div class="col-3">Keterangan </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> 
                                                    @if($dt->keterangan == "-")
                                                        <span class="badge bg-danger">Belum Upload Bukti Transfer</span>
                                                    @endif
                                                    @if($dt->keterangan == "Clear")
                                                        <span class="badge bg-primary">
                                                            {{$dt->keterangan}}
                                                        </span>
                                                    @endif
                                                    @if($dt->keterangan == 'Selesai')
                                                        <span class="badge bg-success">{{$dt->keterangan}}</span>
                                                    @endif
                                                    @if($dt->keterangan == 'Di Batalkan')
                                                        <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                                    @endif
                                                    @if($dt->keterangan == 'Expired')
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
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection