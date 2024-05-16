@extends('page/layout/app')
@section('title','Halaman Sewa')
@section('content')
<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Sewa Lapangan {{Auth::user()->name}}</h3>
      </div>
    </div>
  </div>
  @php
    $lapangan = DB::table('nama_lapangan')->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')->get();
  @endphp
  @foreach ($data as $dt)
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-content">
            <div class="card-body">
              <h4 class="card-title">{{$dt->nama_lap}} - {{$dt->nama_jenis}}</h4>
              <h4 class="card-title">Rp. {{number_format($dt->harga,0,",",".")}}/jam</h4>
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
  <section id="multiple-column-form">
    <div class="row match-height">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">Form Penyewaan</h4>
          </div>
          <div class="card-content">
            <div class="card-body">
              <form class="form" action="{{route('add_sewa')}}" method="post">
                @csrf
                <div class="row">
                  @foreach($data as $dt)
                  <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                  <input type="hidden" name="lap_id" value="{{$dt->id_lapangan}}">
                  <input type="hidden" name="harga" value="{{$dt->harga}}">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="last-name-column">Payment</label>
                      <select class="choices form-select" name="id_payment">
                        @foreach($pay as $payment)
                        <option value="{{$payment->id_payment}}">{{$payment->no_rek}} - {{$payment->nama_rek}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="city-column">Tanggal Sewa</label>
                      <input type="date" id="city-column" required="" class="form-control" name="tanggal">
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="city-column">Jam Mulai</label>
                      <select class="choices form-select" name="jam_mulai">
                        @foreach($jam as $jm)
                        <option value="{{$jm->jam}}">{{$jm->jam}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="country-floating">Jam Selesai</label>
                      <select class="choices form-select" name="jam_selesai">
                        @foreach($jam as $jm)
                        <option value="{{$jm->jam}}">{{$jm->jam}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <input type="hidden" name="diskon" value="0">
                  @if (auth()->user()->level == 'Member')
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="last-name-column">Diskon</label>
                      <select class="choices form-select" name="diskon">
                        @foreach ($dis as $diskon)
                        <option value="{{$diskon->hargadiskon}}">{{$diskon->nama_diskon}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  @endif
                  @foreach($lengkap as $lkp)
                  @if($lkp->no_telp==NULL)
                  <div class="col-12">
                    <div class="form-group">
                      <div class="alert alert-light-danger color-danger"><i
                        class="bi bi-exclamation-circle"></i> Lengkapi Biodata Anda terlebih Dahulu. <b><a href="{{route('profil')}}">Click Me!</a></b></div>
                      </div>
                    </div>
                    @endif
                    @if($lkp->no_telp!==NULL)
                    <div class="col-md-3 col-12">
                      <div class="form-group">
                        <button type="submit"
                        class="btn btn-primary mt-4 form-control">Pesan</button>
                      </div>
                    </div>
                    <div class="col-md-3 col-12">
                    <div class="form-group">
                      <button type="reset"
                      class="btn btn-light-secondary mt-4 form-control">Reset</button>
                    </div>
                    @endif
                    @endforeach
                  </div>
                  @endforeach
                </div>
              </form>
            </div>
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
                <?php date_default_timezone_set('Asia/Jakarta');
                $mulai = strtotime($ls->jam_mulai);
                $selesai = strtotime($ls->jam_selesai);

                $dif = $selesai - $mulai;

                $jam = floor($dif/(60*60));
                $menit = $dif - $jam*(60*60);
                $menit2 = floor($menit/60);
                if ($menit2 >= 30) {
                  $jam += 1;
                }
                ?>
                <tr>
                  <td>{{$no}}. </td>
                  <td>{{$ls->nama_lap}}</td>
                  <td>{{$ls->tanggal}}</td>
                  <td>{{$ls->jam_mulai}}</td>
                  <td>{{$ls->jam_selesai}}</td>
                  <td>
                    {{$jam}} Jam
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