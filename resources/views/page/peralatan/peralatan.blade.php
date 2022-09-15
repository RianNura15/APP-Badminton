@extends('page/layout/app')

@section('title', 'Data Peralatan')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Peralatan</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Peralatan
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
                        <th>Nama Peralatan</th>
                        <th>Jumlah</th>
                        <th>Tempat</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$no}}. </td>
                        <td>{{$dt->nama}}</td>
                        <td>{{$dt->jumlah}}</td>
                        <td>{{$dt->tempat}}</td>
                        <td>{{$dt->deskripsi}}</td>
                        <td>
                            <a href="{{asset('peralatan')}}//{{$dt->gambar}}" target="_blank">
                                <img src="{{asset('peralatan')}}//{{$dt->gambar}}" width="80">
                            </a>
                        </td>
                        <td align="center">
                            <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id}}" class="btn btn-sm btn-success">
                                <i class="dripicons dripicons-document-edit"></i>
                            </button>
                            <a href="peralatan/delete/{{$dt->id}}" onclick="return confirm('Yakin hapus data peralatan {{$dt->nama}}?')" class="btn btn-sm btn-danger">
                                <i class="dripicons dripicons-trash"></i>
                            </a>
                            <!-- <a href="{{route('image',$dt->id)}}" class="btn btn-sm btn-primary">
                                <i class="dripicons dripicons-photo-group"></i>
                            </a> -->
                        </td>
                    </tr>
                    <?php $no++ ?>
                    <div class="modal fade" id="edit{{$dt->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Mengubah Data Peralatan
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form method="post" action="{{route('update_peralatan')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="hidden" value="{{$dt->id}}" name="id">
                                        <div class="form=group">
                                            <label>Nama Peralatan</label>
                                            <input type="text" value="{{$dt->nama}}" class="form-control" name="nama">
                                        </div>  
                                    </div>
                                   <div class="col-4">
                                        <div class="form=group">
                                            <label>Jumlah</label>
                                            <input type="text" value="{{$dt->jumlah}}" class="form-control" name="jumlah">
                                        </div>  
                                    </div> 
                                    <div class="col-4">
                                        <div class="form=group">
                                            <label>Tempat</label>
                                            <input type="text" value="{{$dt->tempat}}" class="form-control" name="tempat">
                                        </div>  
                                    </div>
                                    <div class="col-4">
                                        <div class="form=group">
                                            <label>Deskripsi</label>
                                            <input type="text" value="{{$dt->deskripsi}}" class="form-control" name="deskripsi">
                                        </div>  
                                    </div>
                                    <div class="col-4">
                                        <div class="form=group">
                                            <label>Gambar Perlatan</label>
                                            <input type="file" class="form-control" name="gambar">
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

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable modal-lg"
role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Menambah Data Peralatan
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal"
        aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<form method="post" action="{{route('add_peralatan')}}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="form=group">
                    <label>Nama Peralatan</label>
                    <input type="text" required="" class="form-control" name="nama" autofocus>
                </div>  
            </div>
            <div class="col-6">
                <div class="form=group">
                    <label>Jumlah</label>
                    <input type="number" required="" class="form-control" name="jumlah">
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Tempat</label>
                    <input type="text" required="" class="form-control" name="tempat">
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Deskripsi</label>
                    <input type="text" required="" class="form-control" name="deskripsi">
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Gambar Peralatan</label>
                    <input type="file" required="" accept="image/*" class="form-control" name="gambar">
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