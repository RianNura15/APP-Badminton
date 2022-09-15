@extends('page/layout/app')

@section('title', 'Diskon')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Diskon</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                With Data Diskon
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
                        <th>Nama Diskon</th>
                        <th>Nominal Diskon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $dt)
                    <tr>
                        <td>{{$loop->iteration}}. </td>
                        <td>{{$dt->nama_diskon}}</td>
                        <td>{{$dt->hargadiskon}}</td>
                        <td align="center">
                            <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id}}" class="btn btn-sm btn-success">
                                <i class="dripicons dripicons-document-edit"></i>
                            </button>
                            <a href="diskon/delete/{{$dt->id}}" onclick="return confirm('Yakin hapus data diskon {{$dt->nama_diskon}}?')" class="btn btn-sm btn-danger">
                                <i class="dripicons dripicons-trash"></i>
                            </a>
                        </td>
                    </tr>

                    <div class="modal fade" id="edit{{$dt->id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg"
                        role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Mengubah Data Diskon
                                </h5>
                                <button type="button" class="close" data-bs-dismiss="modal"
                                aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>
                        <form method="post" action="{{route('updatediskon')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="hidden" value="{{$dt->id}}" name="id">
                                        <div class="form=group">
                                            <label>Nama Diskon</label>
                                            <input type="text" value="{{$dt->nama_diskon}}" class="form-control" name="nama_diskon">
                                        </div>  
                                    </div>
                                    <div class="col-4">
                                        <div class="form=group">
                                            <label>Nominal Diskon</label>
                                            <input type="number" value="{{$dt->hargadiskon}}" class="form-control" name="hargadiskon">
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
        <h5 class="modal-title" id="exampleModalCenterTitle">Menambah Data Diskon
        </h5>
        <button type="button" class="close" data-bs-dismiss="modal"
        aria-label="Close">
        <i data-feather="x"></i>
    </button>
</div>
<form method="post" action="{{route('adddiskon')}}" enctype="multipart/form-data">
    @csrf
    <div class="modal-body">
        <div class="row">
            <div class="col-6">
                <div class="form=group">
                    <label>Nama Diskon</label>
                    <input type="text" required="" class="form-control" name="nama_diskon" placeholder="Diskon" required autofocus>
                </div>  
            </div>
            <div class="col-4">
                <div class="form=group">
                    <label>Nominal Diskon</label>
                    <input type="number" required="" class="form-control" name="hargadiskon" placeholder="Contoh: 10000" required>
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