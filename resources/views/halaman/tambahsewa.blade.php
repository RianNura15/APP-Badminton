            @extends('page/layout/app')
            @section('title','Transaksi Sewa Lapangan')
            @section('content')
            <style type="text/css">
              button:hover{
                background-color: #1943E8 !important;
                border-color: #1943E8 !important;
              }
              .btn.reset:hover{
                background-color: #808080 !important;
                border-color: #808080 !important;
                color: white;
              }
            </style>
            <div class="page-heading">
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
                          <h4 class="card-title">{{$dt->nama_lap}} - {{$dt->nama_jenis}}</h4>
                          <h4 class="card-title">Rp. {{number_format($dt->harga,0,",",".")}}/bulan</h4>
                          <div>
                  <p>
                    <a class="imgover" href=""><img src="{{asset('gambar')}}/{{$dt->gambar}}" style="max-height: 220px" alt=""></a>
                  </p>
                </div>
              </div>
            </div>
              </section>
              <div class="alert alert-light-danger color-danger"><i
                  class="bi bi-exclamation-circle"></i> Total jam yang dipilih harus 4 jam | Pilih hari dalam seminggu
              </div>
              @endforeach
              <form class="form" action="{{route('add_sewa')}}" method="post">
              @csrf
              <section id="multiple-column-form">
                <div class="row match-height">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Form Penyewaan</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                              @foreach($data as $dt)
                              <input type="hidden" name="lap_id" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Payment</label>
                                  <select class="choices form-select" name="id_payment">
                                    @foreach($pay as $payment)
                                    <option value="{{$payment->id_payment}}">{{$payment->no_rek}}({{$payment->bank}}) - {{$payment->nama_rek}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="city-column">Nama Klub</label>
                                  <input type="text" id="city-column" required="" class="form-control" name="namapb">
                                </div>
                              </div>
                              <input type="hidden" name="hargasewa" value="{{$dt->harga}}">
                              <input type="hidden" name="total" value="{{$dt->harga}}">
                              @endforeach
                           </div>
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
                      <div class="card-header">
                        <h4 class="card-title">Hari Ke-1</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              @foreach($data as $dt)
                              <input type="hidden" name="id_lap1" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari1" value="Hari 1">
                              @endforeach
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Sewa</label>
                                  <input type="date" id="city-column" required class="form-control" name="tanggal1">
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai1">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai1">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                           </div>
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
                      <div class="card-header">
                        <h4 class="card-title">Hari Ke-2</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              @foreach($data as $dt)
                              <input type="hidden" name="id_lap2" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari2" value="Hari 2">
                              @endforeach
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Sewa</label>
                                  <input type="date" id="city-column" required class="form-control" name="tanggal2">
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai2">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai2">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              @foreach($lengkap as $lkp)
                              @if($lkp->ktp==NULL)
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="alert alert-light-danger color-danger"><i
                                    class="bi bi-exclamation-circle"></i> Lengkapi Data Diri Anda terlebih Dahulu. <b><a href="{{route('profil')}}">Click Me!</a></b></div>
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
                                 class="btn btn-light-secondary mt-4 form-control reset">Reset</button>
                               </div>
                             </div>
                             @endif
                               @endforeach
                           </div>
                       </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            </form>
            <!-- // Basic multiple Column Form section end -->


          </div>
          @endsection