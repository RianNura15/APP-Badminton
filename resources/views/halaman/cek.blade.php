@extends('halaman/layout/app')
@section('title','Visit Lapangan')
@section('content')
<div class="bgded overlay light" style="background-image:url('{{asset('bg.png')}}');">
  <section id="services" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs">Data Jadwal</p>
      <h6 class="heading font-x2">Lapangan di Gunakan</h6>
      <div class="form-group" style="display: inline-block;">
          <form class="input-group" action="" >
          <input type="date" class="form-control" name="search" value="{{$search}}" style="color: black; border: 1px solid black; border-radius: 4px; padding-top: 5px; margin-top: 20px; padding-left: 40px; padding-right: 40px; text-align: center;">
          <button type="submit" href="" style="display: inline-block; color: black; background: skyblue; border-radius: 4px; padding-right: 20px; padding-left: 20px; text-align: center; margin-top: 10px;">Cari</button>
          </form>
      </div>
    </div>
    <!-- ################################################################################################ -->
  </section>
  <section id="services" class="hoc container clear" style="margin-top: -200px;">
    <ul class="nospace group elements elements-three">
      @foreach($data as $dt)
      @if($dt->keterangan=='Aktif' || $dt->keterangan=='Mulai')
      <li class="one_third">
        <article><a href="#"></a>
          <h6 class="heading">{{$dt->data_sewa->nama_lap}}</h6>
          <p style="margin-bottom: 10px;">{{ \Carbon\Carbon::parse($dt->tanggalmain)->format('d F Y') }}</p>
          <p>
            {{ \Carbon\Carbon::parse($dt->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($dt->jam_selesai)->format('H:i') }}
          </p>
          @if($dt->keterangan=='Mulai')
          <p style="margin-top: 10px; color: green;"><b>Sedang Berlangsung</b></p>
          @endif
        </article>
      </li>
      @endif
      @endforeach
    </ul>
  </section>
</div>
@endsection