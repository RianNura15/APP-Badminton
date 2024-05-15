@extends('halaman/layout/app')
@section('title','Halaman Page')
@section('content')
<?php 
$profil=DB::table('profil')->get();
?>
@foreach($profil as $pf)
<div class="bgded overlay" style="background-image:url('{{asset('bg.png')}}');">
  <div id="pageintro" class="hoc clear"> 

    <!-- ################################################################################################ -->
    <article>
      <h4 class="heading">Halo, Selamat Datang</h4>
      <h2>{{$pf->jenis_apk}}</h2>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
  <section id="testimonials" class="hoc container clear">
    <!-- ################################################################################################ -->
    <ul class="nospace group elements elements-three">
      <li class="one_third">
        <article><a href="#"></a>
          <h4><b>Murah</b></h4>
          <br>
          <p>Harganya yang terjangkau, nyaman untuk kantong kamu</p>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"></a>
          <h4><b>Tempat Strategis</b></h4>
          <br>
          <p>Tempat yang mudah dijangkau dan dekat dengan swalayan, puskesmas, dan masjid</p>
        </article>
      </li>
      <li class="one_third">
        <article><a href="#"></a>
          <h4><b>Parkir Luas</b></h4>
          <br>
          <p>Menyediakan tempat parkir yang luas, muat untuk mobil maupun elf</p>
        </article>
      </li>
    </ul>
            <!-- ################################################################################################ -->
          </section>
        <div class="wrapper row3" id="lapangan">
          <section class="hoc container clear"> 
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
              <h6 class="heading font-x2">Data Lapangan</h6>
            </div>
            <ul id="latest" class="nospace group">
              @foreach($lapangan as $lp)
              @auth
              @if (auth()->user()->status_user == 'Aktif')
              <li class="one_third" style="width: 330px;">
                <article><a class="imgover" href="{{route('boking',$lp->id_lapangan)}}"><img src="{{asset('gambar')}}/{{$lp->gambar}}" style="min-height: 350px" alt=""></a>
                  <ul class="nospace meta clear">
                    <li><i class="fas fa-eye" class="align-center"></i> <a href="{{route('visit',$lp->id_lapangan)}}">Detail</a></li>
                  </ul>
                  <p>
                    <div id="jadwal" class="align-center">
                    <a href="{{route('cek_boking',$lp->id_lapangan)}}" style="background-color: #97A9BD; color: white; border-color: black; padding: 10px 118px;" class="btn btn-primary mt-6 form-control">Cek Jadwal</a>
                  </div>
                  </p>
                  <div class="excerpt">
                    <p class="heading">
                      {{$lp->nama_lap}} -
                      {{$lp->nama_jenis}}
                    </p>
                    <br>
                    <p class="heading">Pagi = Rp. {{number_format($lp->harga_pagi,0,",",".")}}/jam</p>
                    <p class="heading">Malam = Rp. {{number_format($lp->harga_malam,0,",",".")}}/jam</p>
                  </div>
                  <br>
                </article>
              </li>
              @endif
              @else
              <li class="one_third" style="width: 330px;">
                <article><img src="{{asset('gambar')}}/{{$lp->gambar}}" style="min-height: 350px" alt="">
                  <ul class="nospace meta clear">
                    <li><i class="fas fa-eye" class="align-center"></i> <a href="{{route('visit',$lp->id_lapangan)}}">Detail</a></li>
                  </ul>
                  <p>
                    <div id="jadwal" class="align-center">
                    <a href="{{route('cek_boking',$lp->id_lapangan)}}" style="background-color: #97A9BD; color: white; border-color: black; padding: 10px 118px;" class="btn btn-primary mt-6 form-control">Cek Jadwal</a>
                  </div>
                  </p>
                  <div class="excerpt">
                    <p class="heading">
                      {{$lp->nama_lap}} -
                      {{$lp->nama_jenis}}
                    </p>
                    <br>
                    <p class="heading">Pagi = Rp. {{number_format($lp->harga_pagi,0,",",".")}}/jam</p>
                    <p class="heading">Malam = Rp. {{number_format($lp->harga_malam,0,",",".")}}/jam</p>
                  </div>
                  <br>
                </article>
              </li>
              @endauth
              @endforeach
            </ul>
            <!-- ################################################################################################ -->
          </section>
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        
        @endforeach
        @endsection