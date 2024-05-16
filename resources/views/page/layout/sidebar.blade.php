<?php  
    $profil = DB::table('profil')->get();
?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        @foreach($profil as $prf)
            <div class="sidebar-header">
                <div class="d-flex justify-content-between">
                    <div class="logo">
                        <a href="">{{$prf->nama_profil}}</a>
                    </div>
                    <div class="toggler">
                        <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                @if(Auth::user()->level == "Admin")
                    <li class="sidebar-item active ">
                        <a href="{{route('home')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{route('profil_lapangan')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li class="sidebar-title">Data Utama</li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-hourglass"></i>
                            <span>Data Penyewaan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('sewa')}}">Data Sewa</a>
                            </li>
                            <!-- <li class="submenu-item ">
                                <a href="{{route('sewapb')}}">Data Sewa PB</a>
                            </li> -->
                        </ul>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="{{route('datajadwal')}}" class='sidebar-link'>
                            <i class="dripicons dripicons-clock"></i>
                            <span>Data Jadwal</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="{{route('laporan')}}" class='sidebar-link'>
                            <i class="dripicons dripicons-folder"></i>
                            <span>Laporan Sewa</span>
                        </a>
                    </li>
                    <!-- <li class="sidebar-item  ">
                        <a href="{{route('tambahsewa')}}" class='sidebar-link'>
                            <i class="dripicons dripicons-plus"></i>
                            <span>Tambah Sewa PB</span>
                        </a>
                    </li> -->
                    <!-- <li class="sidebar-item  ">
                        <a href="{{route('tambahkegiatan')}}" class='sidebar-link'>
                            <i class="dripicons dripicons-plus"></i>
                            <span>Tambah Kegiatan</span>
                        </a>
                    </li> -->
                    <!-- <li class="sidebar-item  ">
                        <a href="{{route('tambahsewa')}}" class='sidebar-link'>
                            <i class="dripicons dripicons-plus"></i>
                            <span>Tambah Sewa</span>
                        </a>
                    </li> -->
                    <li class="sidebar-item  ">
                        <a href="{{route('diskon')}}" class='sidebar-link'>
                            <i class="bi bi-wallet"></i>
                            <span>Diskon Member</span>
                        </a>
                    </li>
                    <li class="sidebar-title">Data Penunjang</li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-user-group"></i>
                            <span>Data Pelanggan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('user')}}">Akun Pelanggan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('pb')}}">Data PB</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-suitcase"></i>
                            <span>Data Lapangan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('lapangan')}}">Lapangan</a>
                            </li>
                            <li class="submenu-item ">
                                <a href="{{route('jenis_lapangan')}}">Jenis Lapangan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-wallet"></i>
                            <span>Metode Pembayaran</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('payment')}}">Data Metode Pembayaran</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-title">Data Lain - Lain</li>
                    <!-- <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-user-group"></i>
                            <span>Data Karyawan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('karyawan')}}">Karyawan</a>
                            </li>
                        </ul>
                    </li> -->
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-suitcase"></i>
                            <span>Data Peralatan</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('peralatan')}}">Peralatan</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-title">Sign-Out</li>
                    <li class="sidebar-item  ">
                        <a href="{{route('logout')}}" class='sidebar-link'>
                            <i class="dripicons dripicons-exit"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->level=="Pelanggan")
                    <li class="sidebar-item active ">
                        <a href="{{route('index')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Halaman Page</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a href="{{route('profil')}}" class='sidebar-link'>
                            <i class="dripicons dripicons-user-id"></i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{route('data_sewa')}}" class='sidebar-link'>
                            <i class="dripicons dripicons-suitcase"></i>
                            <span>Riwayat Sewa</span>
                        </a>
                    </li>
                    <li class="sidebar-item  ">
                        <a href="{{route('logoutpelanggan')}}" class='sidebar-link'>
                            <i class="dripicons dripicons-exit"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->level=="Member")
                    <li class="sidebar-item active ">
                        <a href="{{route('index')}}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Halaman Page</span>
                        </a>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-user-id"></i>
                            <span>Data Profil</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('profil')}}">Profil</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="dripicons dripicons-suitcase"></i>
                            <span>Data Sewa</span>
                        </a>
                        <ul class="submenu ">
                            <li class="submenu-item ">
                                <a href="{{route('data_sewa')}}">Sewa Lapangan</a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>