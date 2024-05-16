@extends('halaman/layout/app')
@section('title','Visit Lapangan')
@section('content')
<div class="bgded overlay light" style="background-image:url('{{asset('bg.png')}}');">
  <section id="services" class="hoc container clear">
    <div class="sectiontitle">
      <p class="nospace font-xs" style="font-size: 20px;">Data Jadwal</p>
      @foreach($lapangan as $lp)
      <h6 class="heading font-x2" style="font-size: 50px;">{{$lp->nama_lap}}</h6>
      @endforeach
      <div class="form-group" style="display: inline-block;">
        <form class="input-group" action="" >
          <input type="date" 
                  class="form-control" 
                  name="search" 
                  value="{{ $search ?: date('Y-m-d') }}" 
                  style="color: black; 
                        border: 2px solid black; 
                        border-radius: 4px; 
                        padding: 5px 40px; 
                        margin-top: 30px; 
                        text-align: center;">

          <button type="submit" 
                  style="display: inline-block; 
                        color: black; 
                        background: skyblue; 
                        border-radius: 4px; 
                        padding: 5px 90px; 
                        text-align: center; 
                        margin-top: 10px;">
            Cari
          </button>
        </form>
      </div>
    </div>
  </section>
  <section id="services" class="hoc container clear" style="margin-top: -200px;">
    <ul class="nospace group elements elements-three">
      <div class="grid text-center" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(120px, 1fr)); grid-gap: 10px;">
        @foreach($penanda_jam as $jam => $info)
          <article style="background-color: 
            @if(is_array($info))
              {{ $info['color'] }}
            @else
              {{ $info }}
            @endif">
            <p style="font-weight: bold; font-size: 20px; margin-bottom: 8px;">{{ \Carbon\Carbon::parse($jam)->format('H:i') }}</p>
            @if(is_array($info))
              <p>{{ $info['namapb'] }}</p>
            @endif
          </article>
        @endforeach
      </div>
    </ul>
  </section>
  <section id="services" class="hoc container clear" style="margin-top: -100px;">
    <div class="grid text-center" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(500px, 0fr)); grid-gap: -10px;">
      <p style="font-size: 18px; font-weight: bold; color: black;">🟥 = Jam Tersebut Telah di Booking</p>
      <p style="font-size: 18px; font-weight: bold; color: black;">🟨 = Jam Tersebut dalam Proses Pembayaran</p>
      <p style="font-size: 18px; font-weight: bold; color: black;">🟩 = Jam Tersebut Tersedia</p>
      <p style="font-size: 18px; font-weight: bold; color: black;">🟦 = Jam Tersebut Sedang Berlangsung</p>
      <p style="font-size: 18px; font-weight: bold; color: black;">⬛ = Jam Tersebut Tidak Tersedia</p>
    </div>
  </section>
</div>
@endsection