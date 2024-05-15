@extends('page/layout/app')

@section('title', 'Laporan Sewa')

@section('content')
<style type="text/css">
  .btn.submit:hover{
    background-color: #1943E8 !important;
    border-color: #1943E8 !important;
  }
</style>
<div class="page-heading">
    <section id="multiple-column-form">
        <form method="GET" target="_blank" enctype="multipart/form-data" action="{{route('cetaklaporan')}}">
      <div class="col-md-3 col-12">
        <div class="form-group">
          <label for="label">Tanggal Awal</label>
          <input type="date" class="form-control" name="tgl_mulai" required>
        </div>
      </div>
      <div class="col-md-3 col-12">
        <div class="form-group">
          <label for="label">Tanggal Akhir</label>
          <input type="date" class="form-control" name="tgl_selesai" required>
        </div>
      </div>
        <div class="col-md-3 col-12">
          <div class="form-group">
           <button type="submit" class="btn btn-primary mt-4 form-control submit">Submit</button>
         </div>
       </div>
       </form>
    </section>
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
                            <th>Nama Lapangan</th>
                            <th>Nama Penyewa</th>
                            <th>Nama PB</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nul=0; ?>
                        <?php $no=1; ?>
                        @foreach($data as $dt)
                        <tr>
                            <td>{{$no}}. </td>
                            <td>TRS-{{$dt->sewa_id}}</td>
                            <td>{{$dt->data_sewa->nama_lap}}</td>
                            <td>{{$dt->data_sewa->name}}</td>
                            <td>{{$dt->data_sewa->namapb}}</td>
                            <td>{{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }}</td>
                            <td>{{$dt->status_pembayaran}}</td>
                            <td>
                                Rp. {{number_format($dt->nominal,0,",",".")}}
                            </td>
                        </tr>
                        <?php $no++ ?>
                    @endforeach
                    

</tbody>
</table>
<div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Subtotal = Rp. {{number_format($sum_total,0,",",".")}}</h3>
            </div>
        </div>
    </div>
</div>
</div>

</section>
</div>
@endsection