@extends('page/layout/app')
@section('title', 'Data Pelanggan')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Akun Pelanggan</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Akun Pelanggan
            <!--     <button style="float: right;" type="button" class="btn btn-sm btn-outline-primary block"
                data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                Tambah Data
            </button> -->
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No. KTP</th>
                            <th>KTP</th>
                            <th>Status</th>
                            <th>Member</th>
                            <th>Perpanjangan Member</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$no}}. </td>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->email}}</td>
                                <td>{{$dt->ktp}}</td>
                                <td>
                                    <a href="{{asset('gambarktp')}}//{{$dt->gambar_ktp}}" target="_blank">
                                        <img src="{{asset('gambarktp')}}//{{$dt->gambar_ktp}}" width="80">
                                    </a>
                                </td>
                                <td>
                                    @if($dt->status_user == 'Aktif')
                                        <span class="badge bg-primary">{{$dt->status_user}}</span>
                                    @endif
                                    @if($dt->status_user == 'Non-Aktif')
                                        <span class="badge bg-danger">{{$dt->status_user}}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($dt->member == '0' && $dt->pengajuan_member == '0')
                                        <span class="badge bg-danger">Bukan Member</span>
                                    @endif
                                    @if($dt->member == '0' && $dt->pengajuan_member == '1')
                                        <span class="badge bg-warning">Diajukan</span>
                                    @endif
                                    @if($dt->member == '1' && $dt->pengajuan_member == '1')
                                        <span class="badge bg-success">Member</span>
                                    @endif
                                </td>
                                <td>
                                    @if($dt->setuju_admin == 0)
                                        <span class="badge bg-info">Tidak Ada</span>
                                    @endif
                                    @if($dt->setuju_admin == 1)
                                        <span class="badge bg-warning">Diajukan</span>
                                    @endif
                                </td>
                                <td align="center">
                                    <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id}}" class="btn btn-sm btn-primary">
                                        <i class="dripicons dripicons-disc"></i>
                                    </button>
                                    @if($dt->status_user == "Aktif")
                                        <a href="{{route('status_user',$dt->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Akun {{$dt->name}} akan di Nonaktifkan?')">
                                            <i class="dripicons dripicons-lock"></i>
                                        </a>
                                    @endif
                                    @if($dt->status_user !== "Aktif")
                                        <a href="{{route('status_user',$dt->id)}}" class="btn btn-sm btn-success" onclick="return confirm('Yakin Mengaktifkan Akun?')">
                                            <i class="dripicons dripicons-lock-open"></i>
                                        </a>
                                    @endif
                                    <a href="{{route('cek',$dt->id)}}" class="btn btn-sm btn-success">
                                        <i class="dripicons dripicons-document-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php $no++ ?>
                            <div class="modal fade" id="edit{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                <div class="col-3">Nama </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> {{$dt->name}} </div>
                                                <div class="col-3">Username </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> {{$dt->username}} </div>
                                                <div class="col-3">Level </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> {{$dt->level}} </div>
                                                <div class="col-3">Status User </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> 
                                                    @if($dt->status_user == "Aktif")
                                                        <span class="badge bg-success">{{$dt->status_user}}</span>
                                                    @endif
                                                    @if($dt->status_user !== "Aktif")
                                                        <span class="badge bg-danger">Non-Aktif</span>
                                                    @endif
                                                </div>
                                                <div class="col-3">Email </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> {{$dt->email}} </div>
                                                <div class="col-3">Telepon </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> {{$dt->no_telp}} </div>
                                                <div class="col-3">Jenis Kelamin </div>
                                                <div class="col-1">: </div>
                                                <div class="col-8"> {{$dt->jenis_kelamin}} </div>
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