<div class="wrapper row1">
  <header id="header" class="hoc clear">
    <div id="logo" class="fl_left"> 
      <!-- ################################################################################################ -->
      <h1 class="logoname"><a href="">{{$pf->nama_profil}}</a></h1>
      <!-- ################################################################################################ -->
    </div>
    <nav id="mainav" class="fl_right"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li><a href="{{route('index')}}">Home</a></li>
        <!-- <li><a href="#contact">Contact</a></li> -->
        <li><a href="/prosedur">Prosedur</a></li>
        <li><a href="/location">Location</a></li>
        @auth
        @if (auth()->user()->status_user == 'Aktif')
        <li><a href="{{route('data_sewa')}}">Riwayat Sewa</a></li>
        @endif
        @endauth
        @auth
            <li class="dropdown dropdown-slide">
              <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name}} <span
                  class="tf-ion-ios-arrow-down"></span></a>
              <ul class="dropdown-menu">
                @if (auth()->user()->status_user == 'Aktif')
                <li><a href="{{route('profil')}}">Profil</a></li>
                @endif
                @if (auth()->user()->level == 'Pelanggan')
                <li>
                  <a href="{{route('logoutpelanggan')}}" onclick="
                  event.preventDefault();
                  document.getElementById('formLogout').submit();"
                  >Logout</a>
                  <form id="formLogout" action="{{route('logoutpelanggan')}}" method="get" >@csrf</form>
                </li>
                @endif
                @if (auth()->user()->level == 'Member')
                <li>
                  <a href="{{route('logoutpelanggan')}}" onclick="
                  event.preventDefault();
                  document.getElementById('formLogout').submit();"
                  >Logout</a>
                  <form id="formLogout" action="{{route('logoutpelanggan')}}" method="get" >@csrf</form>
                </li>
                @endif
              </ul>
            </li><!-- / Blog -->
          @else
            <li><a href="{{route('registerpelanggan')}}">Daftar</a></li>
            <li>|</li>
            <li><a href="{{route('loginpelanggan')}}">Login</a></li>
          @endauth
      </ul>
      <!-- ################################################################################################ -->
    </nav>
  </header>
</div>
