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
                              <input type="hidden" name="hari" value="Hari Penting">
                              @endforeach
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="tanggalmain">Tanggal Kegiatan</label>
                                  <input type="date" id="tanggalmain" required class="form-control" name="tanggalmain">
                                  <div id="tanggal_1"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Mulai</label>
                                  <select class="choices form-select" name="jam_mulai" id="jam_mulai">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_mulai}}">{{ \Carbon\Carbon::parse($jmm->jam_mulai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_mulai1"></div>
                                </div>
                              </div>
                              <div class="col-md-4 col-12">
                                <div class="form-group">
                                  <label for="last-name-column">Jam Selesai</label>
                                  <select class="choices form-select" name="jam_selesai" id="jam_selesai">
                                    @foreach($jam as $jmm)
                                    <option value="{{$jmm->jam_selesai}}">{{ \Carbon\Carbon::parse($jmm->jam_selesai)->format('H:i') }}</option>
                                    @endforeach
                                  </select>
                                  <div id="notif_selesai1"></div>
                                </div>
                              </div>
                              <div class="col-md-3 col-12">
                                  <div class="form-group">
                                   <!-- <button type="submit"
                                   class="btn btn-primary mt-4 form-control" >Pesan</button> -->
                                   <a class="btn btn-primary mt-4 form-control" 
                                   onclick="return cek_jadwal();">Pesan</a>
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
          <script type="text/javascript">
            function cek_jadwal() {
              fetch('/ambildatapb').then(response => response.json()).then(data => {
                let cek = data;

                let lapangan = $('#lapangan').val();
                let tanggal1 = $('#tanggalmain').val();
                let jamMulai1 = $('#jam_mulai').val();
                let jamSelesai1 = $('#jam_selesai').val();

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

                if (jadwal1 == false || jadwal1 !== false) {
                  if (jadwal1 == false) {
                    err = 4
                    $('#jam_mulai').css('background','#FF0000')
                    $('#jam_mulai').css('color','#FFFFFF')
                    $('#jam_selesai').css('background','#FF0000')
                    $('#jam_selesai').css('color','#FFFFFF')
                  } else {
                    $('#jam_mulai').css('background','#66ff00')
                    $('#jam_mulai').css('color','#000000')
                    $('#jam_selesai').css('background','#66ff00')
                    $('#jam_selesai').css('color','#000000')
                  }
                }

                if (err == 2) {
                  document.getElementById('warning');
                  Swal.fire({
                    icon: "warning",
                    title: "Kesalahan",
                    text: "Tanggal Tidak Valid Ditandai dengan Border Berwarna Merah"
                  });
                } else if (err == 4) {
                  document.getElementById('warning');
                  Swal.fire({
                    icon: "warning",
                    title: "Booked",
                    text: "Lapangan Sudah di Booking Ditandai dengan Body Berwarna Merah Pada Field Jam Mulai dan Jam Selesai"
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

              });
              
            }
          </script>