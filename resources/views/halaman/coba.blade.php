@extends('page/layout/app')
@section('title','Halaman Sewa')
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Pilih Jam</h3>
      </div>
    </div>
  </div>
  @php
    $lapangan = DB::table('nama_lapangan')->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')->get();
  @endphp
  @foreach ($fr as $dt)
    <section id="multiple-column-form">
      <div class="row match-height">
        <div class="col-12">
          <div class="card">
            <div class="card-content">
              <div class="card-body">
                <h4 class="card-title">Nama Lapangan : {{$dt->nama_lap}} - {{$dt->nama_jenis}}</h4>
                <h4 class="card-title">Mulai : Rp. {{number_format($dt->harga,0,",",".")}}an/jam</h4>
                <div>
                  <p>
                    <a class="imgover" href=""><img src="{{asset('gambar')}}/{{$dt->gambar}}" style="max-height: 220px" alt=""></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endforeach
  <div class="alert alert-light-danger color-danger"><i
    class="bi bi-exclamation-circle"></i> Silahkan Cek Jadwal Terlebih Dahulu Sebelum Memilih Jam
  </div>
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="page-title">
                  <div class="row">
                      <div class="col-12 col-md-6 order-md-1 order-last">
                          <h3>Data Jadwal</h3>
                      </div>
                  </div>
              </div>
              <table class="table table-bordered" id="table1">
                <thead>
                  <tr>
                    <th>No. </th>
                    <th>Tanggal Sewa</th>
                    <th>Lapangan</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Lama Sewa</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach($list as $ls)
                    <tr>
                      <td>{{$no}}. </td>
                      <td>{{$ls->nama_lap}}</td>
                      <td>{{$ls->tanggal}}</td>
                      <td>{{ \Carbon\Carbon::parse($ls->jam_mulai)->format('H:i') }}</td>
                      <td>{{ \Carbon\Carbon::parse($ls->jam_selesai)->format('H:i') }}</td>
                      <td>
                        {{$ls->totaljam}} Jam
                      </td>
                    </tr>
                    <?php $no++ ?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <div class="page-title">
                  <div class="row">
                      <div class="col-12 col-md-6 order-md-1 order-last">
                          <h3>Daftar Jam</h3>
                      </div>
                  </div>
              </div>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>No. </th>
                    <th>Lapangan</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach($data as $dt)
                    <tr>
                      <td>{{$no}}. </td>
                      <td>{{$dt->nama_lapangan->nama_lap}}</td>
                      <td>{{ \Carbon\Carbon::parse($dt->jam_mulai)->format('H:i') }}</td>
                      <td>{{ \Carbon\Carbon::parse($dt->jam_selesai)->format('H:i') }}</td>
                      <td>
                        Rp. {{number_format($dt->hargajam,0,",",".")}}
                      </td>
                      <td>
                          <a href="{{route('bokingjam',$dt->id_jam)}}" type="submit" class="btn btn-sm btn-primary mt-2">Sewa</a>
                      </td>
                    </tr>
                    <?php $no++ ?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection