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
              <form class="form" action="{{route('tambah_sewapb')}}" method="post">
              @csrf
              <section id="multiple-column-form">
                <div class="row match-height">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-header">
                        <h4 class="card-title">Form Penyewaan PB</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                              <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Lapangan</label>
                                  <select class="choices form-select" name="lap_id" id="lapangan">
                                    @foreach($lap as $dt)
                                    <option value="{{$dt->id_lapangan}}">{{$dt->nama_lap}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Nama PB</label>
                                  <select class="choices form-select" id="namapb" name="namapb">
                                    @foreach($pb as $pebe)
                                    <option value="{{$pebe->nama_pb}}">{{$pebe->nama_pb}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                              @foreach($lap as $dt)
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
                        <h4 class="card-title">Minggu Ke-1</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              @foreach($lap as $dt)
                              <input type="hidden" name="id_lap1" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari1" value="Hari 1">
                              <input type="hidden" name="id_lap2" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari2" value="Hari 2">
                              @endforeach
                              <h6>Hari Ke-1</h6>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Sewa</label>
                                  <input type="date" id="tanggal1" required class="form-control" name="tanggal1">
                                  <div id="tanggal_1"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai1" id="jam_mulai1">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <p id="notif_mulai1"></p>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai1" id="jam_selesai1">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <p id="notif_selesai1"></p>
                                </div>
                              </div>
                              <h6>Hari Ke-2</h6>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Sewa</label>
                                  <input type="date" id="tanggal2" required class="form-control" name="tanggal2">
                                  <div id="tanggal_2"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai2" id="jam_mulai2">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_mulai2"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai2" id="jam_selesai2">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_selesai2"></div>
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
                        <h4 class="card-title">Minggu Ke-2</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              @foreach($lap as $dt)
                              <input type="hidden" name="id_lap3" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari3" value="Hari 3">
                              <input type="hidden" name="id_lap4" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari4" value="Hari 4">
                              @endforeach
                              <h6>Hari Ke-1</h6>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Sewa</label>
                                  <input type="date" id="tanggal3" required class="form-control" name="tanggal3">
                                  <div id="tanggal_3"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai3" id="jam_mulai3">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_mulai3"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai3" id="jam_selesai3">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_selesai3"></div>
                                </div>
                              </div>
                              <h6>Hari Ke-2</h6>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Sewa</label>
                                  <input type="date" id="tanggal4" required class="form-control" name="tanggal4">
                                  <div id="tanggal_4"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai4" id="jam_mulai4">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_mulai4"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai4" id="jam_selesai4">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_selesai4"></div>
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
                        <h4 class="card-title">Minggu Ke-3</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              @foreach($lap as $dt)
                              <input type="hidden" name="id_lap5" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari5" value="Hari 5">
                              <input type="hidden" name="id_lap6" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari6" value="Hari 6">
                              @endforeach
                              <h6>Hari Ke-1</h6>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Sewa</label>
                                  <input type="date" id="tanggal5" required class="form-control" name="tanggal5">
                                  <div id="tanggal_5"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai5" id="jam_mulai5">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_mulai5"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai5" id="jam_selesai5">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_selesai5"></div>
                                </div>
                              </div>
                              <h6>Hari Ke-2</h6>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Sewa</label>
                                  <input type="date" id="tanggal6" required class="form-control" name="tanggal6">
                                  <div id="tanggal_6"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai6" id="jam_mulai6">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_mulai6"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai6" id="jam_selesai6">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_selesai6"></div>
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
                        <h4 class="card-title">Minggu Ke-4</h4>
                      </div>
                      <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                              @foreach($lap as $dt)
                              <input type="hidden" name="id_lap7" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari7" value="Hari 7">
                              <input type="hidden" name="id_lap8" value="{{$dt->id_lapangan}}">
                              <input type="hidden" name="hari8" value="Hari 8">
                              @endforeach
                              <h6>Hari Ke-1</h6>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Sewa</label>
                                  <input type="date" id="tanggal7" required class="form-control" name="tanggal7">
                                  <div id="tanggal_7"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai7" id="jam_mulai7">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_mulai7"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai7" id="jam_selesai7">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_selesai7"></div>
                                </div>
                              </div>
                              <h6>Hari Ke-2</h6>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="city-column">Tanggal Sewa</label>
                                  <input type="date" id="tanggal8" required class="form-control" name="tanggal8">
                                  <div id="tanggal_8"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai8" id="jam_mulai8">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_mulai8"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai8" id="jam_selesai8">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_selesai8"></div>
                                </div>
                              </div>
                                <div class="col-md-3 col-12">
                                  <div class="form-group">
                                   <!-- <button type="submit"
                                   class="btn btn-primary mt-4 form-control">Pesan</button> -->
                                   <a class="btn btn-primary mt-4 form-control" 
                                   onclick="return cek_jadwal();">Pesan</a>
                                 </div>
                               </div>
                               <div class="col-md-3 col-12">
                                <div class="form-group">
                                 <button type="reset"
                                 class="btn btn-light-secondary mt-4 form-control reset">Reset</button>
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
          <script type="text/javascript">
            function cek_jadwal() {
              fetch('/ambildatapb').then(response => response.json()).then(data => {
                let cek = data;
                
                let lapangan = $('#lapangan').val();
                let namaPB = $('#namapb').val();
                let tanggal1 = $('#tanggal1').val();
                let tanggal2 = $('#tanggal2').val();
                let tanggal3 = $('#tanggal3').val();
                let tanggal4 = $('#tanggal4').val();
                let tanggal5 = $('#tanggal5').val();
                let tanggal6 = $('#tanggal6').val();
                let tanggal7 = $('#tanggal7').val();
                let tanggal8 = $('#tanggal8').val();
                let jamMulai1 = $('#jam_mulai1').val();
                let jamSelesai1 = $('#jam_selesai1').val();
                let jamMulai2 = $('#jam_mulai2').val();
                let jamSelesai2 = $('#jam_selesai2').val();
                let jamMulai3 = $('#jam_mulai3').val();
                let jamSelesai3 = $('#jam_selesai3').val();
                let jamMulai4 = $('#jam_mulai4').val();
                let jamSelesai4 = $('#jam_selesai4').val();
                let jamMulai5 = $('#jam_mulai5').val();
                let jamSelesai5 = $('#jam_selesai5').val();
                let jamMulai6 = $('#jam_mulai6').val();
                let jamSelesai6 = $('#jam_selesai6').val();
                let jamMulai7 = $('#jam_mulai7').val();
                let jamSelesai7 = $('#jam_selesai7').val();
                let jamMulai8 = $('#jam_mulai8').val();
                let jamSelesai8 = $('#jam_selesai8').val();

                function checkJam(tl, jam) {
                  let waktuTerkini = new Date();
                  let tgl = String(waktuTerkini.getDate()).padStart(2, '0');
                  let bln = String(waktuTerkini.getMonth() + 1).padStart(2, '0');
                  let thn = waktuTerkini.getFullYear();
                  let jm = waktuTerkini.getHours();
                  let mnt = waktuTerkini.getMinutes();
                  let dtk = waktuTerkini.getSeconds();
                  let gapTanggal = thn + "-" + bln + "-" + tgl;
                  let waktuLengkap = jm + ":" + mnt + ":" + dtk;

                  if (tl == gapTanggal) {
                    if (jam < waktuLengkap) {
                      return false;
                    }
                  }

                  return true;
                }

                let jam_mulai1 = checkJam(tanggal1, jamMulai1);
                let jam_mulai2 = checkJam(tanggal2, jamMulai2);
                let jam_mulai3 = checkJam(tanggal3, jamMulai3);
                let jam_mulai4 = checkJam(tanggal4, jamMulai4);
                let jam_mulai5 = checkJam(tanggal5, jamMulai5);
                let jam_mulai6 = checkJam(tanggal6, jamMulai6);
                let jam_mulai7 = checkJam(tanggal7, jamMulai7);
                let jam_mulai8 = checkJam(tanggal8, jamMulai8);
                
                function checkTanggal(time) {
                  let tanggalHariIni = new Date();
                  let tanggal = String(tanggalHariIni.getDate()).padStart(2, '0');
                  let bulan = String(tanggalHariIni.getMonth() + 1).padStart(2, '0');
                  let tahun = tanggalHariIni.getFullYear();
                  let pembandingTanggal = tahun + "-" + bulan + "-" + tanggal;
                  
                  if (time >= pembandingTanggal) {
                    return true;
                  }
                  
                  return false;
                }

                let tanggalSatu = checkTanggal(tanggal1);
                let tanggalDua = checkTanggal(tanggal2);
                let tanggalTiga = checkTanggal(tanggal3);
                let tanggalEmpat = checkTanggal(tanggal4);
                let tanggalLima = checkTanggal(tanggal5);
                let tanggalEnam = checkTanggal(tanggal6);
                let tanggalTujuh = checkTanggal(tanggal7);
                let tanggalDelapan = checkTanggal(tanggal8);

                function waktuKeInteger(waktu) {
                    // Pisahkan jam dan menit dari format "HH:MM"
                    let parts = waktu.split(':');
                    if (parts.length === 3) {
                        let jam = parseInt(parts[0], 10);
                        let menit = parseInt(parts[1], 10);
                        let detik = parseInt(parts[2], 10);

                        // Hitung total detik
                        let totalDetik = (jam * 3600) + (menit * 60) + detik;

                        return totalDetik;
                    } else {
                        return 0; // Format waktu tidak valid, mengembalikan 0 atau nilai lain yang sesuai dengan kebutuhan Anda.
                    }
                }

                let jam1 = waktuKeInteger(jamMulai1);
                let jam11 = waktuKeInteger(jamSelesai1);
                let jam2 = waktuKeInteger(jamMulai2);
                let jam22 = waktuKeInteger(jamSelesai2);
                let jam3 = waktuKeInteger(jamMulai3);
                let jam33 = waktuKeInteger(jamSelesai3);
                let jam4 = waktuKeInteger(jamMulai4);
                let jam44 = waktuKeInteger(jamSelesai4);
                let jam5 = waktuKeInteger(jamMulai5);
                let jam55 = waktuKeInteger(jamSelesai5);
                let jam6 = waktuKeInteger(jamMulai6);
                let jam66 = waktuKeInteger(jamSelesai6);
                let jam7 = waktuKeInteger(jamMulai7);
                let jam77 = waktuKeInteger(jamSelesai7);
                let jam8 = waktuKeInteger(jamMulai8);
                let jam88 = waktuKeInteger(jamSelesai8);
  
                function cekJadwal(lap, tanggal, jam_mulai, jam_selesai) {
                  for (let data of cek) {
                    if (lap == data.id_lap) {
                      if (tanggal === data.tanggalmain) {
                        if (jam_mulai === data.jam_mulai) {
                          return false;
                        } else if (jam_selesai === data.jam_selesai) {
                            return false;
                        } else if (jam_mulai >= data.jam_mulai && jam_mulai < data.jam_selesai) {
                            return false;
                        } else if (jam_selesai >= data.jam_mulai && jam_selesai <= data.jam_selesai) {
                            return false;
                        }
                      } 
                    }
                  }
                  return true;
                }
  
                let jadwal1 = cekJadwal(lapangan, tanggal1, jamMulai1, jamSelesai1);
                let jadwal2 = cekJadwal(lapangan, tanggal2, jamMulai2, jamSelesai2);
                let jadwal3 = cekJadwal(lapangan, tanggal3, jamMulai3, jamSelesai3);
                let jadwal4 = cekJadwal(lapangan, tanggal4, jamMulai4, jamSelesai4);
                let jadwal5 = cekJadwal(lapangan, tanggal5, jamMulai5, jamSelesai5);
                let jadwal6 = cekJadwal(lapangan, tanggal6, jamMulai6, jamSelesai6);
                let jadwal7 = cekJadwal(lapangan, tanggal7, jamMulai7, jamSelesai7);
                let jadwal8 = cekJadwal(lapangan, tanggal8, jamMulai8, jamSelesai8);

                let err = 0

                if (tanggalSatu == false || tanggalSatu !== false) {
                  if (tanggalSatu == false) {
                    err = 2
                    $('#tanggal1').css('border-color','#FF0000')
                    document.getElementById("tanggal_1").innerHTML = "<p style='color:red;'>❌ Tanggal Tidak Valid!</p>";
                  } else {
                    $('#tanggal1').css('border-color','#66ff00')
                    document.getElementById("tanggal_1").innerHTML = "<p style='color:green;'>✅ Tanggal Valid!</p>";
                  }
                }

                if (tanggalDua == false || tanggalDua !== false) {
                  if (tanggalDua == false) {
                    err = 2
                    $('#tanggal2').css('border-color','#FF0000')
                    document.getElementById("tanggal_2").innerHTML = "<p style='color:red;'>❌ Tanggal Tidak Valid!</p>";
                  } else {
                    $('#tanggal2').css('border-color','#66ff00')
                    document.getElementById("tanggal_2").innerHTML = "<p style='color:green;'>✅ Tanggal Valid!</p>";
                  }
                }

                if (tanggalTiga == false || tanggalTiga !== false) {
                  if (tanggalTiga == false) {
                    err = 2
                    $('#tanggal3').css('border-color','#FF0000')
                    document.getElementById("tanggal_3").innerHTML = "<p style='color:red;'>❌ Tanggal Tidak Valid!</p>";
                  } else {
                    $('#tanggal3').css('border-color','#66ff00')
                    document.getElementById("tanggal_3").innerHTML = "<p style='color:green;'>✅ Tanggal Valid!</p>";
                  }
                }

                if (tanggalEmpat == false || tanggalEmpat !== false) {
                  if (tanggalEmpat == false) {
                    err = 2
                    $('#tanggal4').css('border-color','#FF0000')
                    document.getElementById("tanggal_4").innerHTML = "<p style='color:red;'>❌ Tanggal Tidak Valid!</p>";
                  } else {
                    $('#tanggal4').css('border-color','#66ff00')
                    document.getElementById("tanggal_4").innerHTML = "<p style='color:green;'>✅ Tanggal Valid!</p>";
                  }
                }

                if (tanggalLima == false || tanggalLima !== false) {
                  if (tanggalLima == false) {
                    err = 2
                    $('#tanggal5').css('border-color','#FF0000')
                    document.getElementById("tanggal_5").innerHTML = "<p style='color:red;'>❌ Tanggal Tidak Valid!</p>";
                  } else {
                    $('#tanggal5').css('border-color','#66ff00')
                    document.getElementById("tanggal_5").innerHTML = "<p style='color:green;'>✅ Tanggal Valid!</p>";
                  }
                }

                if (tanggalEnam == false || tanggalEnam !== false) {
                  if (tanggalEnam == false) {
                    err = 2
                    $('#tanggal6').css('border-color','#FF0000')
                    document.getElementById("tanggal_6").innerHTML = "<p style='color:red;'>❌ Tanggal Tidak Valid!</p>";
                  } else {
                    $('#tanggal6').css('border-color','#66ff00')
                    document.getElementById("tanggal_6").innerHTML = "<p style='color:green;'>✅ Tanggal Valid!</p>";
                  }
                }

                if (tanggalTujuh == false || tanggalTujuh !== false) {
                  if (tanggalTujuh == false) {
                    err = 2
                    $('#tanggal7').css('border-color','#FF0000')
                    document.getElementById("tanggal_7").innerHTML = "<p style='color:red;'>❌ Tanggal Tidak Valid!</p>";
                  } else {
                    $('#tanggal7').css('border-color','#66ff00')
                    document.getElementById("tanggal_7").innerHTML = "<p style='color:green;'>✅ Tanggal Valid!</p>";
                  }
                }

                if (tanggalDelapan == false || tanggalDelapan !== false) {
                  if (tanggalDelapan == false) {
                    err = 2
                    $('#tanggal8').css('border-color','#FF0000')
                    document.getElementById("tanggal_8").innerHTML = "<p style='color:red;'>❌ Tanggal Tidak Valid!</p>";
                  } else {
                    $('#tanggal8').css('border-color','#66ff00')
                    document.getElementById("tanggal_8").innerHTML = "<p style='color:green;'>✅ Tanggal Valid!</p>";
                  }
                }

                if (jam11 - jam1 !== 14400 || jam11 - jam1 == 14400) {
                  if (jam11 - jam1 !== 14400) {
                    err = 3
                    document.getElementById("notif_mulai1").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                    document.getElementById("notif_selesai1").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                  } else {
                    document.getElementById("notif_mulai1").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                    document.getElementById("notif_selesai1").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                  }
                }

                if (jam22 - jam2 !== 14400 || jam22 - jam2 == 14400) {
                  if (jam22 - jam2 !== 14400) {
                    err = 3
                    document.getElementById("notif_mulai2").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                    document.getElementById("notif_selesai2").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                  } else {
                    document.getElementById("notif_mulai2").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                    document.getElementById("notif_selesai2").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                  }
                }

                if (jam33 - jam3 !== 14400 || jam33 - jam3 == 14400) {
                  if (jam33 - jam3 !== 14400) {
                    err = 3
                    document.getElementById("notif_mulai3").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                    document.getElementById("notif_selesai3").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                  } else {
                    document.getElementById("notif_mulai3").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                    document.getElementById("notif_selesai3").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                  }
                }

                if (jam44 - jam4 !== 14400 || jam44 - jam4 == 14400) {
                  if (jam44 - jam4 !== 14400) {
                    err = 3
                    document.getElementById("notif_mulai4").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                    document.getElementById("notif_selesai4").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                  } else {
                    document.getElementById("notif_mulai4").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                    document.getElementById("notif_selesai4").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                  }
                }

                if (jam55 - jam5 !== 14400 || jam55 - jam5 == 14400) {
                  if (jam55 - jam5 !== 14400) {
                    err = 3
                    document.getElementById("notif_mulai5").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                    document.getElementById("notif_selesai5").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                  } else {
                    document.getElementById("notif_mulai5").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                    document.getElementById("notif_selesai5").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                  }
                }

                if (jam66 - jam6 !== 14400 || jam66 - jam6 == 14400) {
                  if (jam66 - jam6 !== 14400) {
                    err = 3
                    document.getElementById("notif_mulai6").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                    document.getElementById("notif_selesai6").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                  } else {
                    document.getElementById("notif_mulai6").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                    document.getElementById("notif_selesai6").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                  }
                }

                if (jam77 - jam7 !== 14400 || jam77 - jam7 == 14400) {
                  if (jam77 - jam7 !== 14400) {
                    err = 3
                    document.getElementById("notif_mulai7").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                    document.getElementById("notif_selesai7").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                  } else {
                    document.getElementById("notif_mulai7").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                    document.getElementById("notif_selesai7").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                  }
                }

                if (jam88 - jam8 !== 14400 || jam88 - jam8 == 14400) {
                  if (jam88 - jam8 !== 14400) {
                    err = 3
                    document.getElementById("notif_mulai8").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                    document.getElementById("notif_selesai8").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
                  } else {
                    document.getElementById("notif_mulai8").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                    document.getElementById("notif_selesai8").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
                  }
                }

                if (jadwal1 == false || jadwal1 !== false) {
                  if (jadwal1 == false) {
                    err = 4
                    $('#jam_mulai1').css('background','#FF0000')
                    $('#jam_mulai1').css('color','#FFFFFF')
                    $('#jam_selesai1').css('background','#FF0000')
                    $('#jam_selesai1').css('color','#FFFFFF')
                  } else {
                    $('#jam_mulai1').css('background','#66ff00')
                    $('#jam_mulai1').css('color','#000000')
                    $('#jam_selesai1').css('background','#66ff00')
                    $('#jam_selesai1').css('color','#000000')
                  }
                }

                if (jadwal2 == false || jadwal2 !== false) {
                  if (jadwal2 == false) {
                    err = 4
                    $('#jam_mulai2').css('background','#FF0000')
                    $('#jam_mulai2').css('color','#FFFFFF')
                    $('#jam_selesai2').css('background','#FF0000')
                    $('#jam_selesai2').css('color','#FFFFFF')
                  } else {
                    $('#jam_mulai2').css('background','#66ff00')
                    $('#jam_mulai2').css('color','#000000')
                    $('#jam_selesai2').css('background','#66ff00')
                    $('#jam_selesai2').css('color','#000000')
                  }
                }

                if (jadwal3 == false || jadwal3 !== false) {
                  if (jadwal3 == false) {
                    err = 4
                    $('#jam_mulai3').css('background','#FF0000')
                    $('#jam_mulai3').css('color','#FFFFFF')
                    $('#jam_selesai3').css('background','#FF0000')
                    $('#jam_selesai3').css('color','#FFFFFF')
                  } else {
                    $('#jam_mulai3').css('background','#66ff00')
                    $('#jam_mulai3').css('color','#000000')
                    $('#jam_selesai3').css('background','#66ff00')
                    $('#jam_selesai3').css('color','#000000')
                  }
                }

                if (jadwal4 == false || jadwal4 !== false) {
                  if (jadwal4 == false) {
                    err = 4
                    $('#jam_mulai4').css('background','#FF0000')
                    $('#jam_mulai4').css('color','#FFFFFF')
                    $('#jam_selesai4').css('background','#FF0000')
                    $('#jam_selesai4').css('color','#FFFFFF')
                  } else {
                    $('#jam_mulai4').css('background','#66ff00')
                    $('#jam_mulai4').css('color','#000000')
                    $('#jam_selesai4').css('background','#66ff00')
                    $('#jam_selesai4').css('color','#000000')
                  }
                }

                if (jadwal5 == false || jadwal5 !== false) {
                  if (jadwal5 == false) {
                    err = 4
                    $('#jam_mulai5').css('background','#FF0000')
                    $('#jam_mulai5').css('color','#FFFFFF')
                    $('#jam_selesai5').css('background','#FF0000')
                    $('#jam_selesai5').css('color','#FFFFFF')
                  } else {
                    $('#jam_mulai5').css('background','#66ff00')
                    $('#jam_mulai5').css('color','#000000')
                    $('#jam_selesai5').css('background','#66ff00')
                    $('#jam_selesai5').css('color','#000000')
                  }
                }

                if (jadwal6 == false || jadwal6 !== false) {
                  if (jadwal6 == false) {
                    err = 4
                    $('#jam_mulai6').css('background','#FF0000')
                    $('#jam_mulai6').css('color','#FFFFFF')
                    $('#jam_selesai6').css('background','#FF0000')
                    $('#jam_selesai6').css('color','#FFFFFF')
                  } else {
                    $('#jam_mulai6').css('background','#66ff00')
                    $('#jam_mulai6').css('color','#000000')
                    $('#jam_selesai6').css('background','#66ff00')
                    $('#jam_selesai6').css('color','#000000')
                  }
                }

                if (jadwal7 == false || jadwal7 !== false) {
                  if (jadwal7 == false) {
                    err = 4
                    $('#jam_mulai7').css('background','#FF0000')
                    $('#jam_mulai7').css('color','#FFFFFF')
                    $('#jam_selesai7').css('background','#FF0000')
                    $('#jam_selesai7').css('color','#FFFFFF')
                  } else {
                    $('#jam_mulai7').css('background','#66ff00')
                    $('#jam_mulai7').css('color','#000000')
                    $('#jam_selesai7').css('background','#66ff00')
                    $('#jam_selesai7').css('color','#000000')
                  }
                }

                if (jadwal8 == false || jadwal8 !== false) {
                  if (jadwal8 == false) {
                    err = 4
                    $('#jam_mulai8').css('background','#FF0000')
                    $('#jam_mulai8').css('color','#FFFFFF')
                    $('#jam_selesai8').css('background','#FF0000')
                    $('#jam_selesai8').css('color','#FFFFFF')
                  } else {
                    $('#jam_mulai8').css('background','#66ff00')
                    $('#jam_mulai8').css('color','#000000')
                    $('#jam_selesai8').css('background','#66ff00')
                    $('#jam_selesai8').css('color','#000000')
                  }
                }

                if (tanggal1 === tanggal2 && jamMulai1 === jamMulai2 && jamSelesai1 === jamSelesai2) {
                  err = 5
                }
                
                if (tanggal1 === tanggal3 && jamMulai1 === jamMulai3 && jamSelesai1 === jamSelesai3) {
                  err = 5
                }

                if (tanggal1 === tanggal4 && jamMulai1 === jamMulai4 && jamSelesai1 === jamSelesai4) {
                  err = 5
                }

                if (tanggal1 === tanggal5 && jamMulai1 === jamMulai5 && jamSelesai1 === jamSelesai5) {
                  err = 5
                }

                if (tanggal1 === tanggal6 && jamMulai1 === jamMulai6 && jamSelesai1 === jamSelesai6) {
                  err = 5
                }

                if (tanggal1 === tanggal7 && jamMulai1 === jamMulai7 && jamSelesai1 === jamSelesai7) {
                  err = 5
                }

                if (tanggal1 === tanggal8 && jamMulai1 === jamMulai8 && jamSelesai1 === jamSelesai8) {
                  err = 5
                }

                if (tanggal2 === tanggal3 && jamMulai2 === jamMulai3 && jamSelesai2 === jamSelesai3) {
                  err = 5
                }

                if (tanggal2 === tanggal4 && jamMulai2 === jamMulai4 && jamSelesai2 === jamSelesai4) {
                  err = 5
                }

                if (tanggal2 === tanggal5 && jamMulai2 === jamMulai5 && jamSelesai2 === jamSelesai5) {
                  err = 5
                }

                if (tanggal2 === tanggal6 && jamMulai2 === jamMulai6 && jamSelesai2 === jamSelesai6) {
                  err = 5
                }

                if (tanggal2 === tanggal7 && jamMulai2 === jamMulai7 && jamSelesai2 === jamSelesai7) {
                  err = 5
                }

                if (tanggal2 === tanggal8 && jamMulai2 === jamMulai8 && jamSelesai2 === jamSelesai8) {
                  err = 5
                }

                if (tanggal3 === tanggal4 && jamMulai3 === jamMulai4 && jamSelesai3 === jamSelesai4) {
                  err = 5
                }

                if (tanggal3 === tanggal5 && jamMulai3 === jamMulai5 && jamSelesai3 === jamSelesai5) {
                  err = 5
                }

                if (tanggal3 === tanggal6 && jamMulai3 === jamMulai6 && jamSelesai3 === jamSelesai6) {
                  err = 5
                }

                if (tanggal3 === tanggal7 && jamMulai3 === jamMulai7 && jamSelesai3 === jamSelesai7) {
                  err = 5
                }

                if (tanggal3 === tanggal8 && jamMulai3 === jamMulai8 && jamSelesai3 === jamSelesai8) {
                  err = 5
                }

                if (tanggal4 === tanggal5 && jamMulai4 === jamMulai5 && jamSelesai4 === jamSelesai5) {
                  err = 5
                }

                if (tanggal4 === tanggal6 && jamMulai4 === jamMulai6 && jamSelesai4 === jamSelesai6) {
                  err = 5
                }

                if (tanggal4 === tanggal7 && jamMulai4 === jamMulai7 && jamSelesai4 === jamSelesai7) {
                  err = 5
                }
                
                if (tanggal4 === tanggal8 && jamMulai4 === jamMulai8 && jamSelesai4 === jamSelesai8) {
                  err = 5
                }

                if (tanggal5 === tanggal6 && jamMulai5 === jamMulai6 && jamSelesai5 === jamSelesai6) {
                  err = 5
                }

                if (tanggal5 === tanggal7 && jamMulai5 === jamMulai7 && jamSelesai5 === jamSelesai7) {
                  err = 5
                }

                if (tanggal5 === tanggal8 && jamMulai5 === jamMulai8 && jamSelesai5 === jamSelesai8) {
                  err = 5
                }

                if (tanggal6 === tanggal7 && jamMulai6 === jamMulai7 && jamSelesai6 === jamSelesai7) {
                  err = 5
                }

                if (tanggal6 === tanggal8 && jamMulai6 === jamMulai8 && jamSelesai6 === jamSelesai8) {
                  err = 5
                }

                if (tanggal7 === tanggal8 && jamMulai7 === jamMulai8 && jamSelesai7 === jamSelesai8) {
                  err = 5
                }

                if (err == 1) {
                  document.getElementById('warning');
                  Swal.fire({
                    icon: "warning",
                    title: "Kesalahan",
                    text: "Nama Klub Harap di Isi"
                  });
                } else if (err == 2) {
                  document.getElementById('warning');
                  Swal.fire({
                    icon: "warning",
                    title: "Kesalahan",
                    text: "Tanggal Tidak Valid Ditandai dengan Border Berwarna Merah"
                  });
                } else if (err == 3) {
                  document.getElementById('warning');
                  Swal.fire({
                    icon: "warning",
                    title: "Kesalahan",
                    text: "Total Jam Tidak 4 jam Ditandai dengan Tanda ❌ Total Jam Tidak Valid!"
                  });
                } else if (err == 4) {
                  document.getElementById('warning');
                  Swal.fire({
                    icon: "warning",
                    title: "Booked",
                    text: "Lapangan Sudah di Booking Ditandai dengan Body Berwarna Merah Pada Field Jam Mulai dan Jam Selesai"
                  });
                } else if (err == 5) {
                  document.getElementById('warning');
                  Swal.fire({
                    icon: "warning",
                    title: "Kesalahan",
                    text: "Waktu yang dipilih sama, cek kembali!"
                  });
                } else {
                  document.getElementById('success');
                  Swal.fire({
                    icon: "success",
                    title: "Available",
                    text: "Lapangan Tersedia Pada Semua Hari",
                    confirmButtonText: 'Pesan'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      document.querySelector('form').submit();
                    }
                  }); 
                }

                // if (namaPB == "") {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Nama Klub Harap di Isi"
                //   });
                // } else if (tanggalSatu == false && tanggalDua == false && tanggalTiga == false && tanggalEmpat == false && tanggalLima == false && tanggalEnam == false && tanggalTujuh == false && tanggalDelapan == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Semua Tanggal Tidak Valid"
                //   });
                // } else if (tanggalSatu == false && tanggalDua == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 dan 2 di Minggu Ke-1 Tidak Valid"
                //   });
                // } else if (tanggalTiga == false && tanggalEmpat == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 dan 2 di Minggu Ke-2 Tidak Valid"
                //   });
                // } else if (tanggalLima == false && tanggalEnam == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 dan 2 di Minggu Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalTujuh == false && tanggalDelapan == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 dan 2 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalSatu == false && tanggalTiga == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-1 dan Ke-2 Tidak Valid"
                //   });
                // } else if (tanggalSatu == false && tanggalEmpat == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-1 dan Hari Ke-2 di Minggu Ke-2 Tidak Valid"
                //   });
                // } else if (tanggalSatu == false && tanggalLima == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-1 dan Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalSatu == false && tanggalEnam == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-1 dan Hari Ke-2 di Minggu Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalSatu == false && tanggalTujuh == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-1 dan Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalSatu == false && tanggalDelapan == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-1 dan Hari Ke-2 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalDua == false && tanggalTiga == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-1 dan Hari Ke-1 di Minggu Ke-2 Tidak Valid"
                //   });
                // } else if (tanggalDua == false && tanggalEmpat == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-1 dan Ke-2 Tidak Valid"
                //   });
                // } else if (tanggalDua == false && tanggalLima == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-1 dan Hari Ke-1 di Minggu Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalDua == false && tanggalEnam == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-1 dan Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalDua == false && tanggalTujuh == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-1 dan Hari Ke-1 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalDua == false && tanggalDelapan == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-1 dan Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalTiga == false && tanggalLima == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-2 dan Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalTiga == false && tanggalEnam == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-2 dan Hari Ke-2 di Minggu Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalTiga == false && tanggalTujuh == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-2 dan Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalTiga == false && tanggalDelapan == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-2 dan Hari Ke-2 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalEmpat == false && tanggalLima == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-2 dan Hari Ke-1 di Minggu Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalEmpat == false && tanggalEnam == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-2 dan Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalEmpat == false && tanggalTujuh == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-2 dan Hari Ke-1 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalEmpat == false && tanggalDelapan == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-2 dan Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalLima == false && tanggalTujuh == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-3 dan Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalLima == false && tanggalDelapan == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-3 dan Hari Ke-2 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalEnam == false && tanggalTujuh == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-3 dan Hari Ke-1 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalEnam == false && tanggalDelapan == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-3 dan Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalSatu == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-1 Tidak Valid"
                //   });
                // } else if (tanggalDua == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-1 Tidak Valid"
                //   });
                // } else if (tanggalTiga == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-2 Tidak Valid"
                //   });
                // } else if (tanggalEmpat == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-2 Tidak Valid"
                //   });
                // } else if (tanggalLima == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalEnam == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-3 Tidak Valid"
                //   });
                // } else if (tanggalTujuh == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-1 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (tanggalDelapan == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Tanggal Pada Hari Ke-2 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (jam_mulai1 !== true && jam_mulai2 !== true && jam_mulai3 !== true && jam_mulai4 !== true && jam_mulai5 !== true && jam_mulai6 !== true && jam_mulai7 !== true && jam_mulai8 !== true) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Semua Jam Mulai yang di Pilih Tidak Valid"
                //   });
                // } else if (jam_mulai1 !== true) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Jam Mulai Pada Hari Ke-1 di Minggu Ke-1 Tidak Valid"
                //   });
                // } else if (jam_mulai2 !== true) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Jam Mulai Pada Hari Ke-2 di Minggu Ke-1 Tidak Valid"
                //   });
                // } else if (jam_mulai3 !== true) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Jam Mulai Pada Hari Ke-1 di Minggu Ke-2 Tidak Valid"
                //   });
                // } else if (jam_mulai4 !== true) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Jam Mulai Pada Hari Ke-2 di Minggu Ke-2 Tidak Valid"
                //   });
                // } else if (jam_mulai5 !== true) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Jam Mulai Pada Hari Ke-1 di Minggu Ke-3 Tidak Valid"
                //   });
                // } else if (jam_mulai6 !== true) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Jam Mulai Pada Hari Ke-2 di Minggu Ke-3 Tidak Valid"
                //   });
                // } else if (jam_mulai7 !== true) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Jam Mulai Pada Hari Ke-1 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (jam_mulai8 !== true) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Kesalahan",
                //     text: "Jam Mulai Pada Hari Ke-2 di Minggu Ke-4 Tidak Valid"
                //   });
                // } else if (jadwal1 !== true && jadwal2 !== true && jadwal3 !== true && jadwal4 !== true && jadwal5 !== true && jadwal6 !== true && jadwal7 !== true && jadwal8 !== true) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Booked",
                //     text: "Lapangan di Semua Hari Sudah di Booking"
                //   });
                // } else if (jadwal1 == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Booked",
                //     text: "Lapangan Hari Ke-1 di Minggu Ke-1 Sudah di Booking"
                //   });
                // } else if (jadwal2 == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Booked",
                //     text: "Lapangan Hari Ke-2 di Minggu Ke-1 Sudah di Booking"
                //   });
                // } else if (jadwal3 == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Booked",
                //     text: "Lapangan Hari Ke-1 di Minggu Ke-2 Sudah di Booking"
                //   });
                // } else if (jadwal4 == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Booked",
                //     text: "Lapangan Hari Ke-2 di Minggu Ke-2 Sudah di Booking"
                //   });
                // } else if (jadwal5 == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Booked",
                //     text: "Lapangan Hari Ke-1 di Minggu Ke-3 Sudah di Booking"
                //   });
                // } else if (jadwal6 == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Booked",
                //     text: "Lapangan Hari Ke-2 di Minggu Ke-3 Sudah di Booking"
                //   });
                // } else if (jadwal7 == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Booked",
                //     text: "Lapangan Hari Ke-1 di Minggu Ke-4 Sudah di Booking"
                //   });
                // } else if (jadwal8 == false) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Booked",
                //     text: "Lapangan Hari Ke-2 di Minggu Ke-4 Sudah di Booking"
                //   });
                // } else if (jam11 - jam1 !== 14400 && jam22 - jam2 !== 14400 && jam33 - jam3 !== 14400 && jam44 - jam4 !== 14400 && jam55 - jam5 !== 14400 && jam66 - jam6 !== 14400 && jam77 - jam7 !== 14400 && jam88 - jam8 !== 14400) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Total Jam Harus 4 Jam",
                //     text: "Total Jam di Semua Hari Tidak 4 jam"
                //   });
                // } else if (jam11 - jam1 !== 14400) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Total Jam Harus 4 Jam",
                //     text: "Total Jam Pada Hari Ke-1 di Minggu Ke-1 Tidak 4 jam"
                //   });
                // } else if (jam22 - jam2 !== 14400) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Total Jam Harus 4 Jam",
                //     text: "Total Jam Pada Hari Ke-2 di Minggu Ke-1 Tidak 4 jam"
                //   });
                // } else if (jam33 - jam3 !== 14400) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Total Jam Harus 4 Jam",
                //     text: "Total Jam Pada Hari Ke-1 di Minggu Ke-2 Tidak 4 jam"
                //   });
                // } else if (jam44 - jam4 !== 14400) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Total Jam Harus 4 Jam",
                //     text: "Total Jam Pada Hari Ke-2 di Minggu Ke-2 Tidak 4 jam"
                //   });
                // } else if (jam55 - jam5 !== 14400) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Total Jam Harus 4 Jam",
                //     text: "Total Jam Pada Hari Ke-1 di Minggu Ke-3 Tidak 4 jam"
                //   });
                // } else if (jam66 - jam6 !== 14400) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Total Jam Harus 4 Jam",
                //     text: "Total Jam Pada Hari Ke-2 di Minggu Ke-3 Tidak 4 jam"
                //   });
                // } else if (jam77 - jam7 !== 14400) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Total Jam Harus 4 Jam",
                //     text: "Total Jam Pada Hari Ke-1 di Minggu Ke-4 Tidak 4 jam"
                //   });
                // } else if (jam88 - jam8 !== 14400) {
                //   document.getElementById('warning');
                //   Swal.fire({
                //     icon: "warning",
                //     title: "Total Jam Harus 4 Jam",
                //     text: "Total Jam Pada Hari Ke-2 di Minggu Ke-4 Tidak 4 jam"
                //   });
                // } else {
                //   document.getElementById('success');
                //   Swal.fire({
                //     icon: "success",
                //     title: "Available",
                //     text: "Lapangan Tersedia Pada Semua Hari",
                //     confirmButtonText: 'Pesan'
                //   }).then((result) => {
                //     if (result.isConfirmed) {
                //       document.querySelector('form').submit();
                //     }
                //   }); 
                // }
              });
              
            }
          </script>