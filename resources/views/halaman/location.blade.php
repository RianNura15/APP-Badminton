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
      <h4 class="heading">LOCATION</h4>
      <h2>{{$pf->jenis_apk}}</h2>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <!-- ################################################################################################ -->
        <div class="wrapper row2" id="contact" style="text-align: center">
          <section id="ctdetails" class="hoc container clear"> 
            <!-- ################################################################################################ -->
            <div class="sectiontitle">
              <!-- <p class="nospace font-xs">Enim eleifend dignissim bibendum</p> -->
              <h6 class="heading font-x2">LOKASI CONTACT</h6>
              <br>
              <p style="margin-top: 50px;"><b> Whatsapp : {{$pf->no_profil}} </b></p>
              <br>
              <p style="margin-top: -5px;margin-bottom: -50px;"><b>Lokasi : {{$pf->lokasi}}</b></p>
            </div>
            <iframe class="form-control" height="400" width="1000" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=1000&amp;height=600&amp;hl=en&amp;q={{$pf->lokasi}}+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            <!-- ################################################################################################ -->
          </section>
        </div>
        @endforeach
        @endsection