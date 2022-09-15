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
              <!-- // Basic multiple Column Form section start -->
              <form class="form" action="{{route('tambah_kegiatan')}}" method="post">
              @csrf
              <section id="multiple-column-form">
                <div class="row match-height">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Tambah Kegiatan</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                              @foreach($lap as $dt)
                              <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Lapangan</label>
                                  <select class="choices form-select" name="lap_id">
                                    @foreach($lap as $dt)
                                    <option value="{{$dt->id_lapangan}}">{{$dt->nama_lap}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Kegiatan</label>
                                  <select class="choices form-select" name="namapb">
                                    <option value="Posyandu">Posyandu</option>
                                    <option value="Rapat Desa">Rapat Desa</option>
                                    <option value="Agustusan">Agustusan</option>
                                    <option value="Turnamen Bulutangkis">Turnamen Bulutangkis</option>
                                  </select>
                                </div>
                              </div>
                              <input type="hidden" name="hargasewa" value="0">
                              <input type="hidden" name="total" value="0">
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
                        <h4 class="card-title">Pilih Tanggal dan Jam</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              @foreach($lap as $dt)
                              <input type="hidden" name="id_lap" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari" value="Hari 1">
                              @endforeach
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Kegiatan</label>
                                  <input type="date" id="city-column" required class="form-control" name="tanggalmain">
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-3 col-12">
                                  <div class="form-group">
                                   <button type="submit"
                                   class="btn btn-primary mt-4 form-control" >Pesan</button>
                                 </div>
                               </div>
                               <div class="col-md-3 col-12">
                                <div class="form-group">
                                 <button type="reset"
                                 class="btn btn-light-secondary mt-4 form-control reset" >Reset</button>
                               </div>
                             </div>
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