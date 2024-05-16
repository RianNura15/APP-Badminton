@extends('halaman/layout/app')
@section('title','Halaman Page')
@section('content')
<?php 
  $profil = DB::table('profil')->get();
?>
@foreach($profil as $pf)
  <div class="bgded overlay" style="background-image:url('{{asset('bg.png')}}');">
    <div id="pageintro" class="hoc clear">
      <article>
        <h4 class="heading">PROSEDURE PENYEWAAN</h4>
        <h2>{{$pf->jenis_apk}}</h2>
      </article>
    </div>
  </div>
  <div class="wrapper coloured" id="prosedur">
    <section id="testimonials" class="hoc container clear">
      <article class="one_half first">
        <figure class="clear">
          <figcaption>
            <b>1. Login</b>
          </figcaption>
        </figure>
        <blockquote>Melakukan login terlebih dahulu </blockquote>
      </article>
      <article class="one_half">
        <figure class="clear">
          <figcaption>
            <b>2. Lengkapi Profil</b>
          </figcaption>
        </figure>
        <blockquote>Lengkapi profil anda sebelum melakukan penyewaan.</blockquote>
      </article>
      <article class="one_half first">
        <figure class="clear">
          <figcaption>
            <b>3. Memilih Lapangan dan Melakukan Pembayaran</b>
          </figcaption>
        </figure>
        <blockquote>
          Memilih lapangan yang akan di sewa pada menu home kemudian memilih waktu, setelah berhasil dapat melakukan pembayaran.
        </blockquote>
      </article>
      <article class="one_half">
        <figure class="clear">
          <figcaption>
            <b>4. Pembayaran Selesai</b>
          </figcaption>
        </figure>
        <blockquote>
          Setelah melakukan pembayaran dan selesai, kemudian muncul tombol untuk melihat nota yang nantinya ditunjukkan saat akan memakai lapangan.
        </blockquote>
      </article>
      <article class="one_half first">
        <figure class="clear">
          <figcaption>
            <b>5. Memakai Lapangan</b>
          </figcaption>
        </figure>
        <blockquote>
          Mendatangi admin terlebih dahulu untuk menunjukkan nota transaksi pada menu riwayat sewa.
        </blockquote>
      </article>
      <article class="one_half">
        <figure class="clear">
          <figcaption>
            <b>6. Disetujui Oleh Admin</b>
          </figcaption>
        </figure>
        <blockquote>
          Jika sudah menunjukkan nota transaksi dan disetujui oleh admin, lapangan bisa digunakan.
        </blockquote>
      </article>
    </section>
  </div>
@endforeach
@endsection