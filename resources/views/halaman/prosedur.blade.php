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
      <h4 class="heading">PROSEDURE PENYEWAAN</h4>
      <h2>{{$pf->jenis_apk}}</h2>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>


<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper coloured" id="prosedur">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <article class="one_half first">
      <figure class="clear">
        <figcaption>
          <b>1. Login</b></figcaption>
        </figure>
        <blockquote>Melakukan login terlebih dahulu sebelum melakukan penyewaan</blockquote>
      </article>
      <article class="one_half">
        <figure class="clear">
          <figcaption>
            <b>2. Lengkapi Profil</b></figcaption>
          </figure>
          <blockquote>Lengkapi profil anda setelah melakukan login sebelum input data penyewaan.</blockquote>
        </article>
        <article class="one_half first">
          <figure class="clear">
            <figcaption>
              <b>3. Input Data dan Upload Bukti Pembayaran</b></figcaption>
            </figure>
            <blockquote>
              Setelah input data penyewaan, upload bukti pembayaran ketika sudah transfer melalui kode pembayaran yang di terapkan di halaman data sewa anda.
            </blockquote>
          </article>
          <article class="one_half">
            <figure class="clear">
              <figcaption>
                <b>4. Transaksi Di Setujui</b></figcaption>
              </figure>
              <blockquote>
                Data penyewaan akan di konfirmasi ketika profil anda sudah lengkap dan telah meng-Upload gambar bukti transfer
              </blockquote>
            </article>
            <article class="one_half first">
            <figure class="clear">
              <figcaption>
                <b>5. Memakai Lapangan</b></figcaption>
              </figure>
              <blockquote>
                Jika Penyewaan sudah berhasil, selanjutnya saat akan memakai lapangan wajib menunjukkan terlebih dahulu bukti transaksi penyewaan yang dapat di cetak atau di simpan di halaman data sewa anda.
              </blockquote>
            </article>
            <article class="one_half">
            <figure class="clear">
              <figcaption>
                <b>6. Disetujui Oleh Admin</b></figcaption>
              </figure>
              <blockquote>
                Jika sudah menunjukkan bukti transaksi penyewaan admin akan memberi struk nota dan lapangan bisa digunakan
              </blockquote>
            </article>
            <!-- ################################################################################################ -->
          </section>
        </div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        @endforeach
        @endsection