@extends('page/layout/app')
@section('title', 'Jam')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Jam</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Jam
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
                            <th>Nama Lapangan</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$loop->iteration}}. </td>
                                <td>{{$dt->nama_lapangan->nama_lap}}</td>
                                <td>{{$dt->jam_mulai}}</td>
                                <td>{{$dt->jam_selesai}}</td>
                                <td>Rp. {{number_format($dt->harga,0,",",".")}}</td>
                                <td align="center">
                                    <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_jam}}" class="btn btn-sm btn-success">
                                        <i class="dripicons dripicons-document-edit"></i>
                                    </button>
                                    <a href="jam/delete/{{$dt->id_jam}}" class="btn btn-sm btn-danger">
                                        <i class="dripicons dripicons-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <div class="modal fade" id="edit{{$dt->id_jam}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-lg"
                                role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Mengubah Data Jam</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form method="post" action="{{route('update_jam')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="city-column">Input Jam Mulai</label>
                                                            <input type="hidden" value="{{$dt->id_jam}}" name="id_jam">
                                                            <input type="time" id="city-column" value="{{$dt->jam_mulai}}" required="" class="form-control" name="jam_mulai" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="city-column">Input Jam Selesai</label>
                                                            <input type="hidden" value="{{$dt->id_jam}}" name="id_jam">
                                                            <input type="time" id="city-column" value="{{$dt->jam_selesai}}" required="" class="form-control" name="jam_selesai" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form-group">
                                                            <label for="last-name-column">Lapangan</label>
                                                            <select class="choices form-select" name="lapangan_id">
                                                                @foreach($lapangan as $lp)
                                                                <option value="{{$lp->id_lapangan}}">{{$lp->nama_lap}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-12">
                                                        <div class="form=group">
                                                            <label>Harga</label>
                                                            <input type="text" value="{{$dt->hargajam}}" class="form-control" name="harga" required>
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
                <h5 class="modal-title" id="exampleModalCenterTitle">Menambah Data Jam</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form method="post" action="{{route('add_jam')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="city-column">Input Jam Mulai</label>
                                <input type="time" id="city-column" class="form-control" name="jam_mulai" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="selesai">Input Jam Selesai</label>
                                <input type="time" id="selesai" class="form-control" name="jam_selesai" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="last-name-column">Lapangan</label>
                                <select class="choices form-select" name="lapangan_id">
                                    @foreach($lapangan as $lp)
                                    <option value="{{$lp->id_lapangan}}">{{$lp->nama_lap}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form=group">
                                <label>Harga</label>
                                <input type="number" required="" class="form-control" name="harga">
                            </div>  
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary"
                    data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kembali</span>
                    </button>
                    <button class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection