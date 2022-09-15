            @extends('page/layout/app')
            @section('title','Halaman Sewa')
            @section('content')
            <div class="page-heading">
              @foreach($data as $dt)
              <div class="page-heading">
                <a href="{{route('pilihjam',$dt->id_lapangan)}}" class="btn btn-info">Kembali</a>
              </div>
              @endforeach
              <div class="page-title">
                <div class="row">
                  <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Sewa Lapangan {{Auth::user()->name}}</h3>
                  </div>
                </div>
              </div>
              <!-- // Basic multiple Column Form section start -->
              @foreach ($data as $dt)
              <section id="multiple-column-form">
                <div class="row match-height">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-content">
                        <div class="card-body">
                          <h4 class="card-title">Nama : {{$dt->nama_lap}}</h4>
                          <h4 class="card-title">Jam : {{ \Carbon\Carbon::parse($dt->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($dt->jam_selesai)->format('H:i') }}</h4>
                          <h4 class="card-title">Harga : Rp. {{number_format($dt->hargajam,0,",",".")}}</h4>
                          <div>
                  <p>
                    <a class="imgover" href=""><img src="{{asset('gambar')}}/{{$dt->gambar}}" style="max-height: 220px;" alt=""></a>
                  </p>
                </div>
              </div>
            </div>
              </section>
              @endforeach
              @foreach ($lengkap as $lkp)
              @if($lkp->ktp!==NULL)
              <div class="alert alert-light-danger color-danger"><i
                class="bi bi-exclamation-circle"></i> Silahkan Isi Form Dibawah
              </div>
              @endif
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
                              <input type="hidden" name="lap_id" value="{{$dt->lapangan_id}}">
                              <input type="hidden" name="hargasewa" value="{{$dt->hargajam}}">
                              <input type="hidden" name="jam_mulai" value="{{$dt->jam_mulai}}">
                              <input type="hidden" name="jam_selesai" value="{{$dt->jam_selesai}}">
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
                                  <input type="date" id="city-column" required class="form-control" name="tanggal">
                                </div>
                              </div>
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="city-column">Nama Klub</label>
                                  <input type="text" id="city-column" required="" class="form-control" name="namapb">
                                </div>
                              </div>
                              @foreach($lengkap as $lkp)
                              @if($lkp->ktp==NULL)
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="alert alert-light-danger color-danger"><i
                                    class="bi bi-exclamation-circle"></i> Lengkapi Biodata Anda terlebih Dahulu. <b><a href="{{route('profil')}}">Click Me!</a></b></div>
                                  </div>
                                </div>
                                @endif
                                @if($lkp->ktp!==NULL)
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
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <!-- // Basic multiple Column Form section end -->


          </div>
          @endsection