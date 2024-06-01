@extends('page/layout/app')
@section('title', 'Data Kode Pembayaran')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Metode Pembayaran</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Metode Pembayaran</th>
                            <th>Jumlah DP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$no}}. </td>
                                <td>{{$dt->metode_payment}}</td>
                                @if($dt->dp == '0.00')
                                    <td>{{$dt->dp}} (0%)</td>
                                @endif
                                @if($dt->dp == '0.10')
                                    <td>{{$dt->dp}} (10%)</td>
                                @endif
                                @if($dt->dp == '0.20')
                                    <td>{{$dt->dp}} (20%)</td>
                                @endif
                                @if($dt->dp == '0.30')
                                    <td>{{$dt->dp}} (30%)</td>
                                @endif
                                @if($dt->dp == '0.40')
                                    <td>{{$dt->dp}} (40%)</td>
                                @endif
                                @if($dt->dp == '0.50')
                                    <td>{{$dt->dp}} (50%)</td>
                                @endif
                                @if($dt->dp == '0.60')
                                    <td>{{$dt->dp}} (60%)</td>
                                @endif
                                @if($dt->dp == '0.70')
                                    <td>{{$dt->dp}} (70%)</td>
                                @endif
                                @if($dt->dp == '0.80')
                                    <td>{{$dt->dp}} (80%)</td>
                                @endif
                                @if($dt->dp == '0.90')
                                    <td>{{$dt->dp}} (90%)</td>
                                @endif
                                <td align="center">
                                    @if($dt->metode_payment == 'Bayar di Tempat')
                                        <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_payment}}" class="btn btn-sm btn-success">Edit</button>
                                    @endif
                                    <!-- <a href="{{route('delete_payment',$dt->id_payment)}}" onclick="return confirm('Yakin hapus data payment {{$dt->metode_payment}}?')" class="btn btn-sm btn-danger">Hapus</a> -->
                                </td>
                            </tr>
                            <?php $no++ ?>
                            <div class="modal fade" id="edit{{$dt->id_payment}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">Update Data</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal"
                                            aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <form method="post" action="{{route('update_payment')}}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input type="hidden" value="{{$dt->id_payment}}" name="id_payment">
                                                    <label>Metode Pembayaran ({{$dt->metode_payment}})</label>
                                                    <!-- <input type="text" value="{{$dt->metode_payment}}" class="form-control" name="metode_payment"> -->
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Jumlah DP</label>
                                                        <select class="form-control" name="dp">
                                                            @if($dt->dp == 0.00)
                                                                <option value="{{$dt->dp}}">{{$dt->dp}} (0%)</option>
                                                                <option value="0.1">0.10 (10%)</option>
                                                                <option value="0.2">0.20 (20%)</option>
                                                                <option value="0.3">0.30 (30%)</option>
                                                                <option value="0.4">0.40 (40%)</option>
                                                                <option value="0.5">0.50 (50%)</option>
                                                                <option value="0.6">0.60 (60%)</option>
                                                                <option value="0.7">0.70 (70%)</option>
                                                                <option value="0.8">0.80 (80%)</option>
                                                                <option value="0.9">0.90 (90%)</option>
                                                            @endif
                                                            @if($dt->dp == 0.10)
                                                                <option value="{{$dt->dp}}">{{$dt->dp}} (10%)</option>
                                                                <option value="0.0">0.00 (0%)</option>
                                                                <option value="0.2">0.20 (20%)</option>
                                                                <option value="0.3">0.30 (30%)</option>
                                                                <option value="0.4">0.40 (40%)</option>
                                                                <option value="0.5">0.50 (50%)</option>
                                                                <option value="0.6">0.60 (60%)</option>
                                                                <option value="0.7">0.70 (70%)</option>
                                                                <option value="0.8">0.80 (80%)</option>
                                                                <option value="0.9">0.90 (90%)</option>
                                                            @endif
                                                            @if($dt->dp == 0.20)
                                                                <option value="{{$dt->dp}}">{{$dt->dp}} (20%)</option>
                                                                <option value="0.0">0.00 (0%)</option>
                                                                <option value="0.1">0.10 (10%)</option>
                                                                <option value="0.3">0.30 (30%)</option>
                                                                <option value="0.4">0.40 (40%)</option>
                                                                <option value="0.5">0.50 (50%)</option>
                                                                <option value="0.6">0.60 (60%)</option>
                                                                <option value="0.7">0.70 (70%)</option>
                                                                <option value="0.8">0.80 (80%)</option>
                                                                <option value="0.9">0.90 (90%)</option>
                                                            @endif
                                                            @if($dt->dp == 0.30)
                                                                <option value="{{$dt->dp}}">{{$dt->dp}} (30%)</option>
                                                                <option value="0.0">0.00 (0%)</option>
                                                                <option value="0.1">0.10 (10%)</option>
                                                                <option value="0.2">0.20 (20%)</option>
                                                                <option value="0.4">0.40 (40%)</option>
                                                                <option value="0.5">0.50 (50%)</option>
                                                                <option value="0.6">0.60 (60%)</option>
                                                                <option value="0.7">0.70 (70%)</option>
                                                                <option value="0.8">0.80 (80%)</option>
                                                                <option value="0.9">0.90 (90%)</option>
                                                            @endif
                                                            @if($dt->dp == 0.40)
                                                                <option value="{{$dt->dp}}">{{$dt->dp}} (40%)</option>
                                                                <option value="0.0">0.00 (0%)</option>
                                                                <option value="0.1">0.10 (10%)</option>
                                                                <option value="0.2">0.20 (20%)</option>
                                                                <option value="0.3">0.30 (30%)</option>
                                                                <option value="0.5">0.50 (50%)</option>
                                                                <option value="0.6">0.60 (60%)</option>
                                                                <option value="0.7">0.70 (70%)</option>
                                                                <option value="0.8">0.80 (80%)</option>
                                                                <option value="0.9">0.90 (90%)</option>
                                                            @endif
                                                            @if($dt->dp == 0.50)
                                                                <option value="{{$dt->dp}}">{{$dt->dp}} (50%)</option>
                                                                <option value="0.0">0.00 (0%)</option>
                                                                <option value="0.1">0.10 (10%)</option>
                                                                <option value="0.3">0.20 (20%)</option>
                                                                <option value="0.4">0.30 (30%)</option>
                                                                <option value="0.5">0.40 (40%)</option>
                                                                <option value="0.6">0.60 (60%)</option>
                                                                <option value="0.7">0.70 (70%)</option>
                                                                <option value="0.8">0.80 (80%)</option>
                                                                <option value="0.9">0.90 (90%)</option>
                                                            @endif
                                                            @if($dt->dp == 0.60)
                                                                <option value="{{$dt->dp}}">{{$dt->dp}} (60%)</option>
                                                                <option value="0.0">0.00 (0%)</option>
                                                                <option value="0.1">0.10 (10%)</option>
                                                                <option value="0.3">0.20 (20%)</option>
                                                                <option value="0.4">0.30 (30%)</option>
                                                                <option value="0.5">0.40 (40%)</option>
                                                                <option value="0.6">0.50 (50%)</option>
                                                                <option value="0.7">0.70 (70%)</option>
                                                                <option value="0.8">0.80 (80%)</option>
                                                                <option value="0.9">0.90 (90%)</option>
                                                            @endif
                                                            @if($dt->dp == 0.70)
                                                                <option value="{{$dt->dp}}">{{$dt->dp}} (70%)</option>
                                                                <option value="0.0">0.00 (0%)</option>
                                                                <option value="0.1">0.10 (10%)</option>
                                                                <option value="0.2">0.20 (20%)</option>
                                                                <option value="0.3">0.30 (30%)</option>
                                                                <option value="0.4">0.40 (40%)</option>
                                                                <option value="0.5">0.50 (50%)</option>
                                                                <option value="0.6">0.60 (60%)</option>
                                                                <option value="0.8">0.80 (80%)</option>
                                                                <option value="0.9">0.90 (90%)</option>
                                                            @endif
                                                            @if($dt->dp == 0.80)
                                                                <option value="{{$dt->dp}}">{{$dt->dp}} (80%)</option>
                                                                <option value="0.0">0.00 (0%)</option>
                                                                <option value="0.1">0.10 (10%)</option>
                                                                <option value="0.2">0.20 (20%)</option>
                                                                <option value="0.3">0.30 (30%)</option>
                                                                <option value="0.4">0.40 (40%)</option>
                                                                <option value="0.5">0.50 (50%)</option>
                                                                <option value="0.6">0.60 (60%)</option>
                                                                <option value="0.7">0.70 (70%)</option>
                                                                <option value="0.9">0.90 (90%)</option>
                                                            @endif
                                                            @if($dt->dp == 0.90)
                                                                <option value="{{$dt->dp}}">{{$dt->dp}} (90%)</option>
                                                                <option value="0.0">0.00 (0%)</option>
                                                                <option value="0.1">0.10 (10%)</option>
                                                                <option value="0.2">0.20 (20%)</option>
                                                                <option value="0.3">0.30 (30%)</option>
                                                                <option value="0.4">0.40 (40%)</option>
                                                                <option value="0.5">0.50 (50%)</option>
                                                                <option value="0.6">0.60 (60%)</option>
                                                                <option value="0.7">0.70 (70%)</option>
                                                                <option value="0.8">0.80 (80%)</option>
                                                            @endif
                                                        </select>
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
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Menambah Data</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form method="post" action="{{route('add_payment')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Metode Pembayaran</label>
                        <input type="text" required="" class="form-control" name="metode_payment">
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Jumlah DP</label>
                            <select class="form-control" name="dp">
                                <option value="0.0">0.00 (0%)</option>
                                <option value="0.1">0.10 (10%)</option>
                                <option value="0.2">0.20 (20%)</option>
                                <option value="0.3">0.30 (30%)</option>
                                <option value="0.4">0.40 (40%)</option>
                                <option value="0.5">0.50 (50%)</option>
                                <option value="0.6">0.60 (60%)</option>
                                <option value="0.7">0.70 (70%)</option>
                                <option value="0.8">0.80 (80%)</option>
                                <option value="0.9">0.90 (90%)</option>
                            </select>
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