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
  @foreach ($data as $dt)
  <section class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <h4 class="card-title">{{$dt->nama_lap}} - {{$dt->nama_jenis}}</h4>
            @if(auth()->user()->member == '1')
            <h4 class="card-title" id="harga_pagi"></h4>
            <h4 class="card-title" id="harga_malam"></h4>
            @else
            <h4 class="card-title">Pagi = Rp. {{number_format($dt->harga_pagi,0,",",".")}}/jam</h4>
            <h4 class="card-title">Malam = Rp. {{number_format($dt->harga_malam,0,",",".")}}/jam</h4>
            @endif
            <img src="{{asset('gambar')}}/{{$dt->gambar}}" style="max-height: 220px; border: 5px solid #435EBE; border-radius: 10px;" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="col-lg-6">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <section id="multiple-column-form" style="">
              <div class="row match-height">
                <div class="col-12">
                  <div class="card">
                    <div class="card-content">
                      <h4 class="card-title">Jadwal</h4>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                              <input type="date" id="" class="form-control" name="" value="{{ date('Y-m-d')}}">
                            </div>
                          </div>
                          <div class="col-md-6 col-12">
                            <div class="form-group">
                            <a class="btn btn-primary form-control" onclick="return melihatJadwal();">Cari</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="grid text-center" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); grid-gap: 10px; margin-top: -30px;" id="datajadwal">
              
            </div>
          </div>
        </div>
      </div>
    </div> -->
  </section>
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
                  <input type="hidden" name="name" value="{{Auth::user()->name}}">
                  <input type="hidden" name="email" value="{{Auth::user()->email}}">
                  @foreach($lengkap as $lkp)
                  <input type="hidden" name="phone" value="{{$lkp->no_telp}}">
                  @endforeach
                  @auth
                  @if(auth()->user()->member == '1')
                  <input type="hidden" id="member" name="" value="1">
                  @else
                  <input type="hidden" id="member" name="" value="0">
                  @endif
                  @endauth
                  @foreach($disc as $diskon)
                    @if($diskon->nama_diskon == 'Member / Pelajar')
                    <input type="hidden" id="diskon" name="diskon" value="{{$diskon->hargadiskon}}">
                    @endif
                  @endforeach
                  @foreach($data as $dt)
                  <input type="hidden" id="lapangan" name="lap_id" value="{{$dt->id_lapangan}}">
                  <input type="hidden" name="tanggal" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="last-name-column">Metode Pembayaran</label>
                      <select class="choices form-select" id="selectOption" name="id_payment">
                        @foreach($pay as $payment)
                        @if($payment->dp == '0.00')
                        <option value="{{$payment->id_payment}}" data-dp="{{$payment->dp}}">{{$payment->metode_payment}} = DP 0%</option>
                        @endif
                        @if($payment->dp == '0.10')
                        <option value="{{$payment->id_payment}}" data-dp="{{$payment->dp}}">{{$payment->metode_payment}} = DP 10%</option>
                        @endif
                        @if($payment->dp == '0.20')
                        <option value="{{$payment->id_payment}}" data-dp="{{$payment->dp}}">{{$payment->metode_payment}} = DP 20%</option>
                        @endif
                        @if($payment->dp == '0.30')
                        <option value="{{$payment->id_payment}}" data-dp="{{$payment->dp}}">{{$payment->metode_payment}} = DP 30%</option>
                        @endif
                        @if($payment->dp == '0.40')
                        <option value="{{$payment->id_payment}}" data-dp="{{$payment->dp}}">{{$payment->metode_payment}} = DP 40%</option>
                        @endif
                        @if($payment->dp == '0.50')
                        <option value="{{$payment->id_payment}}" data-dp="{{$payment->dp}}">{{$payment->metode_payment}} = DP 50%</option>
                        @endif
                        @if($payment->dp == '0.60')
                        <option value="{{$payment->id_payment}}" data-dp="{{$payment->dp}}">{{$payment->metode_payment}} = DP 60%</option>
                        @endif
                        @if($payment->dp == '0.70')
                        <option value="{{$payment->id_payment}}" data-dp="{{$payment->dp}}">{{$payment->metode_payment}} = DP 70%</option>
                        @endif
                        @if($payment->dp == '0.80')
                        <option value="{{$payment->id_payment}}" data-dp="{{$payment->dp}}">{{$payment->metode_payment}} = DP 80%</option>
                        @endif
                        @if($payment->dp == '0.90')
                        <option value="{{$payment->id_payment}}" data-dp="{{$payment->dp}}">{{$payment->metode_payment}} = DP 90%</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="namapb">Nama Klub</label>
                      <input type="text" id="namapb" required class="form-control" name="namapb">
                      <div id="nama_pb"></div>
                    </div>
                  </div>
                  <input type="hidden" id="total" name="total" value="">
                  <input type="hidden" id="dp" name="dp" value="">
                  <input type="hidden" id="nyoba" value="">
                  <input type="hidden" id="hargaPagi" name="harga_pagi" value="{{$dt->harga_pagi}}">
                  <input type="hidden" id="hargaMalam" name="harga_malam" value="{{$dt->harga_malam}}">
                  @endforeach
                  @foreach($data as $dt)
                  <input type="hidden" name="id_lap1" value="{{$dt->id_lapangan}}">
                  <input type="hidden" name="hari1" value="Hari 1">
                  <input type="hidden" name="id_lap2" value="{{$dt->id_lapangan}}">
                  <input type="hidden" name="hari2" value="Hari 2">
                  @endforeach
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
                      <div style="text-align: left;">
                        <p style="text-align: left; display: inline-block;" id="notif_mulai1"></p>
                      </div>
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
</div>
          
<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
      let harga_pagiString = $('#hargaPagi').val();
      let harga_malamString = $('#hargaMalam').val();
      let diskonsString = $('#diskon').val(); 

      let harga_pagi = parseInt(harga_pagiString);
      let harga_malam = parseInt(harga_malamString);
      let diskons = parseInt(diskonsString);

      let hasilHargaPagi = harga_pagi - diskons;
      let hasilHargaMalam = harga_malam - diskons;

      document.getElementById("harga_pagi").innerText = `Pagi (Member) = Rp. ${hasilHargaPagi.toLocaleString('id-ID')}/jam`;
      document.getElementById("harga_malam").innerText = `Malam (Member) = Rp. ${hasilHargaMalam.toLocaleString('id-ID')}/jam`;
  });
  
  function melihatJadwal() {
    let id_lapangan = $('#lapangan').val();
    fetch(`/datajadwal/${id_lapangan}`).then(response => response.json()).then(data => {
      let daftarJam = data[0]
      let jadwal = data[1]
      
      const jamContainer = document.getElementById('datajadwal');
      jamContainer.innerHTML = '';

      // Loop melalui setiap elemen di dalam daftarJam
      daftarJam.forEach(item => {
          let jamMulai = item.jam_mulai.substring(0, 5)
          // Buat elemen span untuk setiap jam
          const spanElement = document.createElement('span');
          spanElement.textContent = jamMulai; // Teks span adalah nilai jam
          spanElement.classList.add('badge', 'bg-success'); // Tambahkan kelas
          spanElement.style.padding = '5px'; // Gaya padding
          spanElement.style.fontSize = '18px'; // Gaya font-size

          // Tambahkan elemen span ke dalam elemen div dengan id 'datajadwal'
          jamContainer.appendChild(spanElement);
      });
    })
  }

  function cek_jadwal() {
    fetch('/ambildata').then(response => response.json()).then(data => {
      let cek = data;
      
      let lapangan = $('#lapangan').val();
      let namaPB = $('#namapb').val();
      let tanggal1 = $('#tanggal1').val();
      let jamMulai1 = $('#jam_mulai1').val();
      let jamSelesai1 = $('#jam_selesai1').val();
      let harga = $('#hargaSpesifik').val();
      let member = $('#member').val();

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
      
      function checkTanggal(time, jam_mulai) {
        let tanggalHariIni = new Date();
        let tanggal = String(tanggalHariIni.getDate()).padStart(2, '0');
        let bulan = String(tanggalHariIni.getMonth() + 1).padStart(2, '0');
        let tahun = tanggalHariIni.getFullYear();
        let jam = tanggalHariIni.getHours();
        let menit = tanggalHariIni.getMinutes();
        let detik = tanggalHariIni.getSeconds();
        let pembandingTanggal = tahun + "-" + bulan + "-" + tanggal;
        jam = (jam < 10 ? '0' : '') + jam;
        menit = (menit < 10 ? '0' : '') + menit;
        detik = (detik < 10 ? '0' : '') + detik;
        
        let pembandingPukul = jam + ':' + menit + ':' + detik;
        
        if (time < pembandingTanggal) {
          return false;
        } else if (time == pembandingTanggal && jam_mulai <= pembandingPukul) {
          return false;
        } else {
          return true;
        }
      }

      let tanggalSatu = checkTanggal(tanggal1, jamMulai1);

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

      function cekJadwal(lap, tanggal, jam_mulai, jam_selesai) {
        for (let data of cek) {
          if (lap == data.id_lap && tanggal === data.tanggalmain) {
            if ((jam_mulai >= data.jam_mulai && jam_mulai < data.jam_selesai) || 
                (jam_selesai > data.jam_mulai && jam_selesai <= data.jam_selesai) ||
                (jam_mulai <= data.jam_mulai && jam_selesai >= data.jam_selesai)) {
              return false;
            }
          }
        }
        return true;
      }

      let jadwal1 = cekJadwal(lapangan, tanggal1, jamMulai1, jamSelesai1);

      function cekHarga(jam_mulai, jam_selesai) {
        let pricePagiString = $('#hargaPagi').val();
        let priceMalamString = $('#hargaMalam').val();
        let pricePagi = parseInt(pricePagiString);
        let priceMalam = parseInt(priceMalamString);
        let price;
        let sekNyoba = document.getElementById("nyoba");
        
        if (jam_mulai == '08:00:00' && jam_selesai == '09:00:00') {
          price = pricePagi;
          sekNyoba.value = pricePagi;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '10:00:00') {
          price = pricePagi * 2;
          sekNyoba.value = pricePagi * 2;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '11:00:00') {
          price = pricePagi * 3;
          sekNyoba.value = pricePagi * 3;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '12:00:00') {
          price = pricePagi * 4;
          sekNyoba.value = pricePagi * 4;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '13:00:00') {
          price = pricePagi * 5;
          sekNyoba.value = pricePagi * 5;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '14:00:00') {
          price = pricePagi * 6;
          sekNyoba.value = pricePagi * 6;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '15:00:00') {
          price = pricePagi * 7;
          sekNyoba.value = pricePagi * 7;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '16:00:00') {
          price = pricePagi * 8;
          sekNyoba.value = pricePagi * 8;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '17:00:00') {
          price = pricePagi * 8 + priceMalam;
          sekNyoba.value = pricePagi * 8 + priceMalam;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '18:00:00') {
          price = pricePagi * 8 + priceMalam * 2;
          sekNyoba.value = pricePagi * 8 + priceMalam * 2;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '19:00:00') {
          price = pricePagi * 8 + priceMalam * 3; 
          sekNyoba.value = pricePagi * 8 + priceMalam * 3;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '20:00:00') {
          price = pricePagi * 8 + priceMalam * 4;
          sekNyoba.value = pricePagi * 8 + priceMalam * 4;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '21:00:00') {
          price = pricePagi * 8 + priceMalam * 5;
          sekNyoba.value = pricePagi * 8 + priceMalam * 5;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '22:00:00') {
          price = pricePagi * 8 + priceMalam * 6;
          sekNyoba.value = pricePagi * 8 + priceMalam * 6;
        } else if (jam_mulai == '08:00:00' && jam_selesai == '23:00:00') {
          price = pricePagi * 8 + priceMalam * 7;
          sekNyoba.value = pricePagi * 8 + priceMalam * 7;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '10:00:00') {
          price = pricePagi;
          sekNyoba.value = pricePagi;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '11:00:00') {
          price = pricePagi * 2;
          sekNyoba.value = pricePagi * 2;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '12:00:00') {
          price = pricePagi * 3;
          sekNyoba.value = pricePagi * 3;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '13:00:00') {
          price = pricePagi * 4;
          sekNyoba.value = pricePagi * 4;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '14:00:00') {
          price = pricePagi * 5;
          sekNyoba.value = pricePagi * 5;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '15:00:00') {
          price = pricePagi * 6;
          sekNyoba.value = pricePagi * 6;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '16:00:00') {
          price = pricePagi * 7;
          sekNyoba.value = pricePagi * 7;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '17:00:00') {
          price = pricePagi * 7 + priceMalam;
          sekNyoba.value = pricePagi * 7 + priceMalam;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '18:00:00') {
          price = pricePagi * 7 + priceMalam * 2;
          sekNyoba.value = pricePagi * 7 + priceMalam * 2;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '19:00:00') {
          price = pricePagi * 7 + priceMalam * 3;
          sekNyoba.value = pricePagi * 7 + priceMalam * 3;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '20:00:00') {
          price = pricePagi * 7 + priceMalam * 4;
          sekNyoba.value = pricePagi * 7 + priceMalam * 4;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '21:00:00') {
          price = pricePagi * 7 + priceMalam * 5;
          sekNyoba.value = pricePagi * 7 + priceMalam * 5;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '22:00:00') {
          price = pricePagi * 7 + priceMalam * 6;
          sekNyoba.value = pricePagi * 7 + priceMalam * 6;
        } else if (jam_mulai == '09:00:00' && jam_selesai == '23:00:00') {
          price = pricePagi * 7 + priceMalam * 7;
          sekNyoba.value = pricePagi * 7 + priceMalam * 7;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '11:00:00') {
          price = pricePagi;
          sekNyoba.value = pricePagi;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '12:00:00') {
          price = pricePagi * 2;
          sekNyoba.value = pricePagi * 2;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '13:00:00') {
          price = pricePagi * 3;
          sekNyoba.value = pricePagi * 3;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '14:00:00') {
          price = pricePagi * 4;
          sekNyoba.value = pricePagi * 4;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '15:00:00') {
          price = pricePagi * 5;
          sekNyoba.value = pricePagi * 5;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '16:00:00') {
          price = pricePagi * 6;
          sekNyoba.value = pricePagi * 6;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '17:00:00') {
          price = pricePagi * 6 + priceMalam;
          sekNyoba.value = pricePagi * 6 + priceMalam;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '18:00:00') {
          price = pricePagi * 6 + priceMalam * 2;
          sekNyoba.value = pricePagi * 6 + priceMalam * 2;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '19:00:00') {
          price = pricePagi * 6 + priceMalam * 3;
          sekNyoba.value = pricePagi * 6 + priceMalam * 3;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '20:00:00') {
          price = pricePagi * 6 + priceMalam * 4;
          sekNyoba.value = pricePagi * 6 + priceMalam * 4;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '21:00:00') {
          price = pricePagi * 6 + priceMalam * 5;
          sekNyoba.value = pricePagi * 6 + priceMalam * 5;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '22:00:00') {
          price = pricePagi * 6 + priceMalam * 6;
          sekNyoba.value = pricePagi * 6 + priceMalam * 6;
        } else if (jam_mulai == '10:00:00' && jam_selesai == '23:00:00') {
          price = pricePagi * 6 + priceMalam * 7;
          sekNyoba.value = pricePagi * 6 + priceMalam * 7;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '12:00:00') {
          price = pricePagi;
          sekNyoba.value = pricePagi;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '13:00:00') {
          price = pricePagi * 2;
          sekNyoba.value = pricePagi * 2;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '14:00:00') {
          price = pricePagi * 3;
          sekNyoba.value = pricePagi * 3;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '15:00:00') {
          price = pricePagi * 4;
          sekNyoba.value = pricePagi * 4;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '16:00:00') {
          price = pricePagi * 5;
          sekNyoba.value = pricePagi * 5;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '17:00:00') {
          price = pricePagi * 5 + priceMalam;
          sekNyoba.value = pricePagi * 5 + priceMalam;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '18:00:00') {
          price = pricePagi * 5 + priceMalam * 2;
          sekNyoba.value = pricePagi * 5 + priceMalam * 2;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '19:00:00') {
          price = pricePagi * 5 + priceMalam * 3;
          sekNyoba.value = pricePagi * 5 + priceMalam * 3;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '20:00:00') {
          price = pricePagi * 5 + priceMalam * 4;
          sekNyoba.value = pricePagi * 5 + priceMalam * 4;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '21:00:00') {
          price = pricePagi * 5 + priceMalam * 5;
          sekNyoba.value = pricePagi * 5 + priceMalam * 5;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '22:00:00') {
          price = pricePagi * 5 + priceMalam * 6;
          sekNyoba.value = pricePagi * 5 + priceMalam * 6;
        } else if (jam_mulai == '11:00:00' && jam_selesai == '23:00:00') {
          price = pricePagi * 5 + priceMalam * 7;
          sekNyoba.value = pricePagi * 5 + priceMalam * 7;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '13:00:00') {
          price = pricePagi;
          sekNyoba.value = pricePagi;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '14:00:00') {
          price = pricePagi * 2;
          sekNyoba.value = pricePagi * 2;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '15:00:00') {
          price = pricePagi * 3;
          sekNyoba.value = pricePagi * 3;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '16:00:00') {
          price = pricePagi * 4;
          sekNyoba.value = pricePagi * 4;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '17:00:00') {
          price = pricePagi * 4 + priceMalam;
          sekNyoba.value = pricePagi * 4 + priceMalam;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '18:00:00') {
          price = pricePagi * 4 + priceMalam * 2;
          sekNyoba.value = pricePagi * 4 + priceMalam * 2;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '19:00:00') {
          price = pricePagi * 4 + priceMalam * 3;
          sekNyoba.value = pricePagi * 4 + priceMalam * 3;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '20:00:00') {
          price = pricePagi * 4 + priceMalam * 4;
          sekNyoba.value = pricePagi * 4 + priceMalam * 4;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '21:00:00') {
          price = pricePagi * 4 + priceMalam * 5;
          sekNyoba.value = pricePagi * 4 + priceMalam * 5;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '22:00:00') {
          price = pricePagi * 4 + priceMalam * 6;
          sekNyoba.value = pricePagi * 4 + priceMalam * 6;
        } else if (jam_mulai == '12:00:00' && jam_selesai == '23:00:00') {
          price = pricePagi * 4 + priceMalam * 7;
          sekNyoba.value = pricePagi * 4 + priceMalam * 7;
        } else if (jam_mulai == '13:00:00' && jam_selesai == '14:00:00') {
          price = pricePagi;
          sekNyoba.value = pricePagi;
        } else if (jam_mulai == '13:00:00' && jam_selesai == '15:00:00') {
          price = pricePagi * 2;
          sekNyoba.value = pricePagi * 2;
        } else if (jam_mulai == '13:00:00' && jam_selesai == '16:00:00') {
          price = pricePagi * 3;
          sekNyoba.value = pricePagi * 3;
        } else if (jam_mulai == '13:00:00' && jam_selesai == '17:00:00') {
          price = pricePagi * 3 + priceMalam;
          sekNyoba.value = pricePagi * 3 + priceMalam;
        } else if (jam_mulai == '13:00:00' && jam_selesai == '18:00:00') {
          price = pricePagi * 3 + priceMalam * 2;
          sekNyoba.value = pricePagi * 3 + priceMalam * 2;
        } else if (jam_mulai == '13:00:00' && jam_selesai == '19:00:00') {
          price = pricePagi * 3 + priceMalam * 3;
          sekNyoba.value = pricePagi * 3 + priceMalam * 3;
        } else if (jam_mulai == '13:00:00' && jam_selesai == '20:00:00') {
          price = pricePagi * 3 + priceMalam * 4;
          sekNyoba.value = pricePagi * 3 + priceMalam * 4;
        } else if (jam_mulai == '13:00:00' && jam_selesai == '21:00:00') {
          price = pricePagi * 3 + priceMalam * 5;
          sekNyoba.value = pricePagi * 3 + priceMalam * 5;
        } else if (jam_mulai == '13:00:00' && jam_selesai == '22:00:00') {
          price = pricePagi * 3 + priceMalam * 6;
          sekNyoba.value = pricePagi * 3 + priceMalam * 6;
        } else if (jam_mulai == '13:00:00' && jam_selesai == '23:00:00') {
          price = pricePagi * 3 + priceMalam * 7;
          sekNyoba.value = pricePagi * 3 + priceMalam * 7;
        } else if (jam_mulai == '14:00:00' && jam_selesai == '15:00:00') {
          price = pricePagi;
          sekNyoba.value = pricePagi;
        } else if (jam_mulai == '14:00:00' && jam_selesai == '16:00:00') {
          price = pricePagi * 2;
          sekNyoba.value = pricePagi * 2;
        } else if (jam_mulai == '14:00:00' && jam_selesai == '17:00:00') {
          price = pricePagi * 2 + priceMalam;
          sekNyoba.value = pricePagi * 2 + priceMalam;
        } else if (jam_mulai == '14:00:00' && jam_selesai == '18:00:00') {
          price = pricePagi * 2 + priceMalam * 2;
          sekNyoba.value = pricePagi * 2 + priceMalam * 2;
        } else if (jam_mulai == '14:00:00' && jam_selesai == '19:00:00') {
          price = pricePagi * 2 + priceMalam * 3;
          sekNyoba.value = pricePagi * 2 + priceMalam * 3;
        } else if (jam_mulai == '14:00:00' && jam_selesai == '20:00:00') {
          price = pricePagi * 2 + priceMalam * 4;
          sekNyoba.value = pricePagi * 2 + priceMalam * 4;
        } else if (jam_mulai == '14:00:00' && jam_selesai == '21:00:00') {
          price = pricePagi * 2 + priceMalam * 5;
          sekNyoba.value = pricePagi * 2 + priceMalam * 5;
        } else if (jam_mulai == '14:00:00' && jam_selesai == '22:00:00') {
          price = pricePagi * 2 + priceMalam * 6;
          sekNyoba.value = pricePagi * 2 + priceMalam * 6;
        } else if (jam_mulai == '14:00:00' && jam_selesai == '23:00:00') {
          price = pricePagi * 2 + priceMalam * 7;
          sekNyoba.value = pricePagi * 2 + priceMalam * 7;
        } else if (jam_mulai == '15:00:00' && jam_selesai == '16:00:00') {
          price = pricePagi;
          sekNyoba.value = pricePagi;
        } else if (jam_mulai == '15:00:00' && jam_selesai == '17:00:00') {
          price = pricePagi + priceMalam;
          sekNyoba.value = pricePagi + priceMalam;
        } else if (jam_mulai == '15:00:00' && jam_selesai == '18:00:00') {
          price = pricePagi + priceMalam * 2;
          sekNyoba.value = pricePagi + priceMalam * 2;
        } else if (jam_mulai == '15:00:00' && jam_selesai == '19:00:00') {
          price = pricePagi + priceMalam * 3;
          sekNyoba.value = pricePagi + priceMalam * 3;
        } else if (jam_mulai == '15:00:00' && jam_selesai == '20:00:00') {
          price = pricePagi + priceMalam * 4;
          sekNyoba.value = pricePagi + priceMalam * 4;
        } else if (jam_mulai == '15:00:00' && jam_selesai == '21:00:00') {
          price = pricePagi + priceMalam * 5;
          sekNyoba.value = pricePagi + priceMalam * 5;
        } else if (jam_mulai == '15:00:00' && jam_selesai == '22:00:00') {
          price = pricePagi + priceMalam * 6;
          sekNyoba.value = pricePagi + priceMalam * 6;
        } else if (jam_mulai == '15:00:00' && jam_selesai == '23:00:00') {
          price = pricePagi + priceMalam * 7;
          sekNyoba.value = pricePagi + priceMalam * 7;
        } else if (jam_mulai == '16:00:00' && jam_selesai == '17:00:00') {
          price = priceMalam;
          sekNyoba.value = priceMalam;
        } else if (jam_mulai == '16:00:00' && jam_selesai == '18:00:00') {
          price = priceMalam * 2;
          sekNyoba.value = priceMalam * 2;
        } else if (jam_mulai == '16:00:00' && jam_selesai == '19:00:00') {
          price = priceMalam * 3;
          sekNyoba.value = priceMalam * 3;
        } else if (jam_mulai == '16:00:00' && jam_selesai == '20:00:00') {
          price = priceMalam * 4;
          sekNyoba.value = priceMalam * 4;
        } else if (jam_mulai == '16:00:00' && jam_selesai == '21:00:00') {
          price = priceMalam * 5;
          sekNyoba.value = priceMalam * 5;
        } else if (jam_mulai == '16:00:00' && jam_selesai == '22:00:00') {
          price = priceMalam * 6;
          sekNyoba.value = priceMalam * 6;
        } else if (jam_mulai == '16:00:00' && jam_selesai == '23:00:00') {
          price = priceMalam * 7;
          sekNyoba.value = priceMalam * 7;
        } else if (jam_mulai == '17:00:00' && jam_selesai == '18:00:00') {
          price = priceMalam;
          sekNyoba.value = priceMalam;
        } else if (jam_mulai == '17:00:00' && jam_selesai == '19:00:00') {
          price = priceMalam * 2;
          sekNyoba.value = priceMalam * 2;
        } else if (jam_mulai == '17:00:00' && jam_selesai == '20:00:00') {
          price = priceMalam * 3;
          sekNyoba.value = priceMalam * 3;
        } else if (jam_mulai == '17:00:00' && jam_selesai == '21:00:00') {
          price = priceMalam * 4;
          sekNyoba.value = priceMalam * 4;
        } else if (jam_mulai == '17:00:00' && jam_selesai == '22:00:00') {
          price = priceMalam * 5;
          sekNyoba.value = priceMalam * 5;
        } else if (jam_mulai == '17:00:00' && jam_selesai == '23:00:00') {
          price = priceMalam * 6;
          sekNyoba.value = priceMalam * 6;
        } else if (jam_mulai == '18:00:00' && jam_selesai == '19:00:00') {
          price = priceMalam;
          sekNyoba.value = priceMalam;
        } else if (jam_mulai == '18:00:00' && jam_selesai == '20:00:00') {
          price = priceMalam * 2;
          sekNyoba.value = priceMalam * 2;
        } else if (jam_mulai == '18:00:00' && jam_selesai == '21:00:00') {
          price = priceMalam * 3;
          sekNyoba.value = priceMalam * 3;
        } else if (jam_mulai == '18:00:00' && jam_selesai == '22:00:00') {
          price = priceMalam * 4;
          sekNyoba.value = priceMalam * 4;
        } else if (jam_mulai == '18:00:00' && jam_selesai == '23:00:00') {
          price = priceMalam * 5;
          sekNyoba.value = priceMalam * 5;
        } else if (jam_mulai == '19:00:00' && jam_selesai == '20:00:00') {
          price = priceMalam;
          sekNyoba.value = priceMalam;
        } else if (jam_mulai == '19:00:00' && jam_selesai == '21:00:00') {
          price = priceMalam * 2;
          sekNyoba.value = priceMalam * 2;
        } else if (jam_mulai == '19:00:00' && jam_selesai == '22:00:00') {
          price = priceMalam * 3;
          sekNyoba.value = priceMalam * 3;
        } else if (jam_mulai == '19:00:00' && jam_selesai == '23:00:00') {
          price = priceMalam * 4;
          sekNyoba.value = priceMalam * 4;
        } else if (jam_mulai == '20:00:00' && jam_selesai == '21:00:00') {
          price = priceMalam;
          sekNyoba.value = priceMalam;
        } else if (jam_mulai == '20:00:00' && jam_selesai == '22:00:00') {
          price = priceMalam * 2;
          sekNyoba.value = priceMalam * 2;
        } else if (jam_mulai == '20:00:00' && jam_selesai == '23:00:00') {
          price = priceMalam * 3;
          sekNyoba.value = priceMalam * 3;
        } else if (jam_mulai == '21:00:00' && jam_selesai == '22:00:00') {
          price = priceMalam;
          sekNyoba.value = priceMalam;
        } else if (jam_mulai == '21:00:00' && jam_selesai == '23:00:00') {
          price = priceMalam * 2;
          sekNyoba.value = priceMalam * 2;
        } else if (jam_mulai == '22:00:00' && jam_selesai == '23:00:00') {
          price = priceMalam;
          sekNyoba.value = priceMalam;
        } 

        return price;
      }

      let jam_Mulai = jamMulai1;
      let jam_Selesai = jamSelesai1;
      let cost = cekHarga(jam_Mulai, jam_Selesai);

      function cekMember(status, jam_mulai, jam_selesai) {
        let discString = $('#diskon').val();
        let disc = parseInt(discString);
        let diskon;
        if (status == 1) {
          if (jam_mulai == '08:00:00' && jam_selesai == '09:00:00') {
            diskon = disc;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '10:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '11:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '12:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '13:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '14:00:00') {
            diskon = disc * 6;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '15:00:00') {
            diskon = disc * 7;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '16:00:00') {
            diskon = disc * 8;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '17:00:00') {
            diskon = disc * 9;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '18:00:00') {
            diskon = disc * 10;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '19:00:00') {
            diskon = disc * 11;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 12;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 13;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 14;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 15;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '10:00:00') {
            diskon = disc;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '11:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '12:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '13:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '14:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '15:00:00') {
            diskon = disc * 6;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '16:00:00') {
            diskon = disc * 7;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '17:00:00') {
            diskon = disc * 8;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '18:00:00') {
            diskon = disc * 9;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '19:00:00') {
            diskon = disc * 10;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 11;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 12;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 13;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 14;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '11:00:00') {
            diskon = disc;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '12:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '13:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '14:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '15:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '16:00:00') {
            diskon = disc * 6;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '17:00:00') {
            diskon = disc * 7;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '18:00:00') {
            diskon = disc * 8;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '19:00:00') {
            diskon = disc * 9;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 10;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 11;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 12;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 13;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '12:00:00') {
            diskon = disc;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '13:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '14:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '15:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '16:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '17:00:00') {
            diskon = disc * 6;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '18:00:00') {
            diskon = disc * 7;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '19:00:00') {
            diskon = disc * 8;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 9;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 10;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 11;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 12;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '13:00:00') {
            diskon = disc;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '14:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '15:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '16:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '17:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '18:00:00') {
            diskon = disc * 6;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '19:00:00') {
            diskon = disc * 7;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 8;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 9;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 10;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 11;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '14:00:00') {
            diskon = disc;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '15:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '16:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '17:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '18:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '19:00:00') {
            diskon = disc * 6;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 7;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 8;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 9;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 10;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '15:00:00') {
            diskon = disc;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '16:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '17:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '18:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '19:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 6;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 7;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 8;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 9;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '16:00:00') {
            diskon = disc;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '17:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '18:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '19:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 6;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 7;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 8;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '17:00:00') {
            diskon = disc;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '18:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '19:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 6;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 7;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '18:00:00') {
            diskon = disc;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '19:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 6;
          } else if (jam_mulai == '18:00:00' && jam_selesai == '19:00:00') {
            diskon = disc;
          } else if (jam_mulai == '18:00:00' && jam_selesai == '20:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '18:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '18:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '18:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 5;
          } else if (jam_mulai == '19:00:00' && jam_selesai == '20:00:00') {
            diskon = disc;
          } else if (jam_mulai == '19:00:00' && jam_selesai == '21:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '19:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '19:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 4;
          } else if (jam_mulai == '20:00:00' && jam_selesai == '21:00:00') {
            diskon = disc;
          } else if (jam_mulai == '20:00:00' && jam_selesai == '22:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '20:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 3;
          } else if (jam_mulai == '21:00:00' && jam_selesai == '22:00:00') {
            diskon = disc;
          } else if (jam_mulai == '21:00:00' && jam_selesai == '23:00:00') {
            diskon = disc * 2;
          } else if (jam_mulai == '22:00:00' && jam_selesai == '23:00:00') {
            diskon = disc;
          } 
        } else if (status == 0) {
          if (jam_mulai == '08:00:00' && jam_selesai == '09:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '10:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '11:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '12:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '13:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '14:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '15:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '16:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '17:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '18:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '08:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '10:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '11:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '12:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '13:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '14:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '15:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '16:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '17:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '18:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '09:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '11:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '12:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '13:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '14:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '15:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '16:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '17:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '18:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '10:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '12:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '13:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '14:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '15:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '16:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '17:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '18:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '11:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '13:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '14:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '15:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '16:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '17:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '18:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '12:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '14:00:00') {
            diskon = 0;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '15:00:00') {
            diskon = 0;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '16:00:00') {
            diskon = 0;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '17:00:00') {
            diskon = 0;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '18:00:00') {
            diskon = 0;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '13:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '15:00:00') {
            diskon = 0;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '16:00:00') {
            diskon = 0;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '17:00:00') {
            diskon = 0;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '18:00:00') {
            diskon = 0;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '14:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '16:00:00') {
            diskon = 0;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '17:00:00') {
            diskon = 0;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '18:00:00') {
            diskon = 0;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '15:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '17:00:00') {
            diskon = 0;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '18:00:00') {
            diskon = 0;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '16:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '18:00:00') {
            diskon = 0;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '17:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '18:00:00' && jam_selesai == '19:00:00') {
            diskon = 0;
          } else if (jam_mulai == '18:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '18:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '18:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '18:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '19:00:00' && jam_selesai == '20:00:00') {
            diskon = 0;
          } else if (jam_mulai == '19:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '19:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '19:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '20:00:00' && jam_selesai == '21:00:00') {
            diskon = 0;
          } else if (jam_mulai == '20:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '20:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '21:00:00' && jam_selesai == '22:00:00') {
            diskon = 0;
          } else if (jam_mulai == '21:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          } else if (jam_mulai == '22:00:00' && jam_selesai == '23:00:00') {
            diskon = 0;
          }
        }
        return diskon;
      }

      let statusMember = cekMember(member, jamMulai1, jamSelesai1);

      let totalPrice = cost - statusMember;

      let totalHarga = document.getElementById("total");
      totalHarga.value = totalPrice;
      
      // var selectElement = document.getElementById("selectOption");
      // var selectedValue = selectElement.options[selectElement.selectedIndex].value;

      // // Mendapatkan nilai yang dimasukkan pengguna
      // var depe = parseFloat(document.getElementById("jumlahDP").value);

      // Melakukan perhitungan berdasarkan nilai yang dipilih
      
      var selectElement = document.getElementById("selectOption");
      var selectedOption = selectElement.options[selectElement.selectedIndex];
      var paymentId = selectedOption.value;
      var dpValue = selectedOption.dataset.dp; // Mengambil nilai dp dari atribut data-dp
      
      var result;
      if (paymentId === "1" && dpValue === "0.10") {
        result = totalPrice * 0.10;
      } else if (paymentId === "1" && dpValue === "0.20") {
        result = totalPrice * 0.20;
      } else if (paymentId === "1" && dpValue === "0.30") {
        result = totalPrice * 0.30;
      } else if (paymentId === "1" && dpValue === "0.40") {
        result = totalPrice * 0.40;
      } else if (paymentId === "1" && dpValue === "0.50") {
        result = totalPrice * 0.50;
      } else if (paymentId === "1" && dpValue === "0.60") {
        result = totalPrice * 0.60;
      } else if (paymentId === "1" && dpValue === "0.70") {
        result = totalPrice * 0.70;
      } else if (paymentId === "1" && dpValue === "0.80") {
        result = totalPrice * 0.80;
      } else if (paymentId === "1" && dpValue === "0.90") {
        result = totalPrice * 0.90;
      } else {
        result = 0;
      }

      let totalDp = document.getElementById("dp");
      totalDp.value = result;
      
      // console.log("Payment ID:", paymentId);
      // console.log("DP Value:", dpValue);

      // function detikKeWaktu(detik) {
      //   const jam = Math.floor(detik / 3600);
      //   return `${jam}`;
      // }

      // let jumlahDetik = jam11 - jam1;
      // let waktuString = detikKeWaktu(jumlahDetik);

      // let totalHarga = cost * waktuString;

      let err = 0
      if ($('#namapb').length > 0) {
        if (namaPB == "") {
          err = 1
          $('#namapb').css('border-color','#FF0000')
          document.getElementById("nama_pb").innerHTML = "<p style='color:red;'>❌ Masih Kosong!</p>";
        } else {
          $('#namapb').css('border-color','#66ff00')
          document.getElementById("nama_pb").innerHTML = "<p style='color:green;'>✅ Terisi</p>";
        }
      }

      if (tanggalSatu == false || tanggalSatu !== false) {
        if (tanggalSatu == false) {
          err = 2
          $('#tanggal1').css('border-color','#FF0000')
          document.getElementById("tanggal_1").innerHTML = "<p style='color:red;'>❌ Waktu Tidak Valid!</p>";
        } else {
          $('#tanggal1').css('border-color','#66ff00')
          document.getElementById("tanggal_1").innerHTML = "<p style='color:green;'>✅ Waktu Valid!</p>";
        }
      }

      if (jam11 - jam1 < 3600 || jam11 - jam1 >= 3600) {
        if (jam11 - jam1 >= 3600) {
          document.getElementById("notif_mulai1").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
          document.getElementById("notif_selesai1").innerHTML = "<p style='color:green;'>✅ Total Jam Valid!</p>";
        } else {
          err = 3
          document.getElementById("notif_mulai1").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
          document.getElementById("notif_selesai1").innerHTML = "<p style='color:red;'>❌ Total Jam Tidak Valid!</p>";
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
          text: "Periksa Kembali Waktu yang di Pilih!"
        });
      } else if (err == 3) {
        document.getElementById('warning');
        Swal.fire({
          icon: "warning",
          title: "Kesalahan",
          text: "Periksa Kembali Jam Mulai dan Jam Selesai!"
        });
      } else if (err == 4) {
        document.getElementById('warning');
        Swal.fire({
          icon: "warning",
          title: "Booked",
          text: "Lapangan Sudah di Booking"
        });
      } else {
        document.getElementById('success');
        Swal.fire({
          icon: "success",
          title: "Lapangan Tersedia",
          html: `<br><p style="font-weight: bold; font-size: 18px;">Informasi Booking :</p> 
                <table style="width: 100%;">
                  <tr>
                    <th style="padding: 6px;">Tanggal :</th>
                    <th style="padding: 6px;">Jam :</th>
                    <th style="padding: 6px;">DP :</th>
                    <th style="padding: 6px;">Harga :</th>
                  </tr>
                  <tr>
                    <td style="padding: 6px;">${tanggal1}</td>
                    <td style="padding: 6px;">${jamMulai1} - ${jamSelesai1} WIB</td>
                    <td style="padding: 6px;">${'Rp. ' + result.toLocaleString('id-ID')}</td>
                    <td style="padding: 6px;">${'Rp. ' + totalPrice.toLocaleString('id-ID')}</td>
                  </tr>
                </table>`,
          confirmButtonText: 'Booking'
        }).then((result) => {
          if (result.isConfirmed) {
            document.querySelector('form').submit();
          }
        }); 
      }


    });
    
  }

</script>
@endsection