@extends('page/layout/app')
@section('title', 'Karyawan')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Karyawan</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Karyawan
                <button style="float: right;" type="button" class="btn btn-sm btn-outline-primary block"
                data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                Tambah Data
                </button>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama Karyawan</th>
                            <th>Bagian</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>KTP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$loop->iteration}}. </td>
                                <td>{{$dt->nama}}</td>
                                <td>{{$dt->bagian}}</td>
                                <td>{{$dt->alamat}}</td>
                                <td>{{$dt->notlp}}</td>
                                <td>
                                    <a href="{{asset('karyawan')}}//{{$dt->ktp}}" target="_blank">
                                        <img src="{{asset('karyawan')}}//{{$dt->ktp}}" width="80">
                                    </a>
                                </td>
                                <td align="center">
                                    <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id}}" class="btn btn-sm btn-success">
                                        <i class="dripicons dripicons-document-edit"></i>
                                    </button>
                                    <a href="karyawan/delete/{{$dt->id}}" onclick="return confirm('Yakin hapus data karyawan {{$dt->nama}}?')" class="btn btn-sm btn-danger">
                                        <i class="dripicons dripicons-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="edit{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Mengubah Data Karyawan
                                            </h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form method="post" action="{{route('updatekaryawan')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <input type="hidden" value="{{$dt->id}}" name="id">
                                                        <div class="form=group">
                                                            <label>Nama Karyawan</label>
                                                            <input type="text" value="{{$dt->nama}}" class="form-control" name="nama">
                                                        </div>  
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form=group">
                                                            <label>Bagian</label>
                                                            <input type="text" value="{{$dt->bagian}}" class="form-control" name="bagian">
                                                        </div>  
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form=group">
                                                            <label>Alamat</label>
                                                            <input type="text" value="{{$dt->alamat}}" class="form-control" name="alamat">
                                                        </div>  
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form=group">
                                                            <label>No. Telepon</label>
                                                            <input type="text" value="{{$dt->notlp}}" class="form-control" name="notlp">
                                                        </div>  
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form=group">
                                                            <label>KTP</label>
                                                            <input type="file" class="form-control" name="ktp">
                                                        </div>  
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light-secondary"
                                                data-bs-dismiss="modal">
                                                    <i class="bx bx-x d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Close</span>
                                                </button>
                                                <button class="btn btn-primary ml-1">
                                                    <i class="bx bx-check d-block d-sm-none"></i>
                                                    <span class="d-none d-sm-block">Accept</span>
                                                </button>
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Menambah Data Karyawan</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form method="post" action="{{route('addkaryawan')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form=group">
                                <label>Nama Karyawan</label>
                                <input type="text" required="" class="form-control" name="nama" autofocus>
                            </div>  
                        </div>
                        <div class="col-4">
                            <div class="form=group">
                                <label>Bagian</label>
                                <input type="text" required="" class="form-control" name="bagian">
                            </div>  
                        </div>
                        <div class="col-4">
                            <div class="form=group">
                                <label>Alamat</label>
                                <input type="text" required="" class="form-control" name="alamat">
                            </div>  
                        </div>
                        <div class="col-4">
                            <div class="form=group">
                                <label>No. Telepon</label>
                                <input type="number" required="" class="form-control" name="notlp">
                            </div>  
                        </div>
                        <div class="col-4">
                            <div class="form=group">
                                <label>KTP</label>
                                <input type="file" required="" class="form-control" name="ktp">
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Accept</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection