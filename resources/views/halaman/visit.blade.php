@extends('halaman/layout/app')
@section('title','Visit Lapangan')
@section('content')
<div class="wrapper row3">
  <main class="hoc container clear">
    <div class="content">
      <div id="gallery">
        <figure>
          <header class="heading">Gambar Lapangan </header>
          <ul class="nospace clear">
            @foreach($id as $dt)
              <li class="one_quarter first">
                <a href="{{asset('gambar')}}/{{$dt->gambar}}" target="_blank">
                  <img src="{{asset('gambar')}}/{{$dt->gambar}}" alt="">
                </a>
              </li>
            @endforeach
            @foreach($data as $dt)
              <li class="one_quarter">
                <a href="{{asset('image')}}/{{$dt->filename}}" target="_blank">
                  <img src="{{asset('image')}}/{{$dt->filename}}" alt="">
                </a>
              </li>
            @endforeach
          </ul>
          @foreach ($id as $data)
            <div class="excerpt">
              <p class="heading">
                {{$data->nama_lap}} - {{$data->nama_jenis}}
              </p>
              <p class="heading">Kegiatan : {{$data->kegiatan}}</p>
              <p class="heading">Pagi = Rp. {{number_format($data->harga_pagi,0,",",".")}}/jam</p>
              <p class="heading">Malam = Rp. {{number_format($data->harga_pagi,0,",",".")}}/jam</p>
            </div>
          @endforeach
        </figure>
      </div>
    </div>
    <div class="clear"></div>
  </main>
</div>
@endsection