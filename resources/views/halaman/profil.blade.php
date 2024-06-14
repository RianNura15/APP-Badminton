<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript"
        src="{{config('midtrans.snap_url')}}"
    data-client-key="{{config('midtrans.client_key')}}"></script>
    <title>Profil</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('template/dist/assets/css/bootstrap.css')}}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/iconly/bold.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/dripicons/webfont.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/css/pages/dripicons.css')}}">

    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('template/dist/assets/css/app.css')}}">
    <link rel="shortcut icon" href="{{asset('template/dist/assets/images/favicon.svg')}}" type="image/x-icon">
</head>

<body>
    <div id="app">
        @include('page/layout/sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                <div class="col-12">
                    <div class="alert alert-light-danger color-danger"><i
                        class="bi bi-exclamation-circle"></i> Isi data diri kamu dengan benar, bila melakukan manipulasi data akun akan di nonaktifkan
                    </div>
                    @if (auth()->user()->member == '1' && $diffInDays == $datenow)
                    <div class="alert alert-light-success color-success"><i
                        class="bi bi-exclamation-circle"></i> Selamat, Kamu sudah menjadi member, nikmati keuntungannya!
                    </div>
                    @endif
                </div>
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            BIODATA {{Auth::user()->name}} <br>
                            @foreach($data as $dt)
                            @if($dt->ktp == NULL && $dt->jenis_kelamin == NULL && $dt->no_telp == NULL && $dt->alamat_penyewa == NULL && $dt->gambar_ktp == NULL)
                            <button type="button" class="btn rounded-pill btn-md btn-warning block" style="float: right;" data-bs-toggle="modal" data-bs-target="#inlineForm{{Auth::user()->id}}">
                                <i class="icon dripicons-document-edit"></i> Lengkapi
                            </button>
                            @endif
                            @if($dt->ktp != NULL && $dt->name != NULL && $dt->username != NULL && $dt->email != NULL && $dt->jenis_kelamin != NULL && $dt->no_telp != NULL && $dt->alamat_penyewa != NULL && $dt->gambar_ktp != NULL)
                            <button type="button" class="btn rounded-pill btn-md btn-success block" style="float: right;" data-bs-toggle="modal" data-bs-target="#inlineForm{{Auth::user()->id}}">
                                <i class="icon dripicons-document-edit"></i> Edit
                            </button>
                            @endif
                            @if($dt->pengajuan_member == 0 && $dt->member == 0 && $dt->jml_jadimember == NULL || $dt->pengajuan_member == 1 && $dt->member == 0 && $dt->jml_jadimember == NULL)
                            <button type="button" class="btn rounded-pill btn-md btn-primary block" style="float: right; margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#daftar{{Auth::user()->id}}">
                                <i class="dripicons dripicons-direction"></i> Daftar Member
                            </button>
                            @endif
                            @if($dt->pengajuan_member == 0 && $dt->member == 0 && $dt->jml_jadimember != NULL || $dt->pengajuan_member == 1 && $dt->member == 1 && $dt->jml_jadimember != NULL && $datenow >= $paymentDueDate)
                            <button type="button" class="btn rounded-pill btn-md btn-primary block" style="float: right; margin-right: 5px;" data-bs-toggle="modal" data-bs-target="#perpanjang{{Auth::user()->id}}">
                                <i class="dripicons dripicons-direction"></i> Perpanjangan Member
                            </button>
                            @endif
                            @if($dt->opsi_bayar == 'Online' && $dt->status_bayar == NULL && $dt->pengajuan_member == '1' && $dt->member == '0' && $dt->jml_jadimember == NULL)
                            <button type="button" class="btn rounded-pill btn-md btn-success block pay-button" style="float: right; margin-right: 5px;" data-snap-token="{{$dt->snap_token}}" data-id="{{$dt->id_bayar}}">
                                <i class="dripicons dripicons-browser-upload"></i> Bayar Member
                            </button>
                            @endif
                            @if($dt->opsi_bayar == 'Online' && $dt->status_bayar == NULL && $dt->pengajuan_member == '1' && $dt->member == '0' && $dt->jml_jadimember != NULL)
                            <button type="button" class="btn rounded-pill btn-md btn-success block pay-button" style="float: right; margin-right: 5px;" data-snap-token="{{$dt->snap_token}}" data-id="{{$dt->id_bayar}}">
                                <i class="dripicons dripicons-browser-upload"></i> Bayar Perpanjangan Member
                            </button>
                            @endif
                            @endforeach
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    @foreach($data as $cst)
                                        <tr>
                                            <td>NO KTP</td>
                                            <td>:</td>
                                            <td>{{$cst->ktp}}</td>
                                        </tr>
                                        <tr>
                                            <td>NAMA</td>
                                            <td>:</td>
                                            <td>{{$cst->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>EMAIL</td>
                                            <td>:</td>
                                            <td>{{$cst->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>JENIS KELAMIN</td>
                                            <td>:</td>
                                            <td>{{$cst->jenis_kelamin}}</td>
                                        </tr>
                                        <tr>
                                            <td>NO TELP/WA</td>
                                            <td>:</td>
                                            <td>
                                                @if(substr($cst->no_telp,0,1)=='0')
                                                <a href="https://wa.me/62{{substr($cst->no_telp,1)}}" target="_blank">
                                                    62 {{substr($cst->no_telp,1)}}
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>ALAMAT</td>
                                            <td>:</td>
                                            <td>{{$cst->alamat_penyewa}}</td>
                                        </tr>
                                        @if($cst->member == 1)
                                        <tr>
                                            <td>JANGKA WAKTU MEMBER</td>
                                            <td>:</td>
                                            <td>{{ \Carbon\Carbon::parse($cst->jangka_waktu)->diffForHumans() }}</td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td>STATUS MEMBER</td>
                                            <td>:</td>
                                            @if($cst->member == 1)
                                            <td><span class="badge bg-success">Member</span></td>
                                            @else
                                            <td><span class="badge bg-danger">Bukan Member</span></td>
                                            @endif
                                        </tr>
                                        @if($cst->pengajuan_member == 1 && $cst->member == 0)
                                        <tr>
                                            <td>STATUS PEMBAYARAN MEMBER</td>
                                            <td>:</td>
                                            @if($cst->status_bayar == 'Terbayar')
                                            <td><span class="badge bg-success">Terbayar</span></td>
                                            @else
                                            <td><span class="badge bg-danger">Belum di Bayar</span></td>
                                            @endif
                                        </tr>
                                        @endif
                                        @if($cst->jml_jadimember != NULL)
                                        <tr>
                                            <td>JADI MEMBER</td>
                                            <td>:</td>
                                            <td>{{$cst->jml_jadimember}}x</td>
                                        </tr>
                                        @endif
                                        <div class="modal fade text-left" id="inlineForm{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
                                                <div class="modal-content" style="border-bottom:1px solid blue;">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">LENGKAPI BIODATA </h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="{{route('lengkapi')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    @if($cst->ktp == NULL)
                                                                    <label>No KTP: <span style="color: red;">&ast;</span></label>
                                                                    @else
                                                                    <label>No KTP: </label>
                                                                    @endif
                                                                    <div class="form-group">
                                                                        <input type="number" name="ktp" value="{{$cst->ktp}}"
                                                                        class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Nama: </label>
                                                                    <div class="form-group">
                                                                        <input type="text" name="name" value="{{$cst->name}}"
                                                                        class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Email: </label>
                                                                    <div class="form-group">
                                                                        <input type="email" name="email" value="{{$cst->email}}"
                                                                        class="form-control @error('email')is-invalid @enderror">
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="id_sewa" value="{{$cst->id_datauser}}">
                                                                <div class="col-lg-6">
                                                                    @if($cst->no_telp == NULL)
                                                                    <label>N0 Telp/WA: <span style="color: red;">&ast;</span></label>
                                                                    @else
                                                                    <label>N0 Telp/WA: </label>
                                                                    @endif
                                                                    <div class="form-group">
                                                                        <input type="number" name="no_telp" value="{{$cst->no_telp}}"
                                                                        class="form-control" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    @if($cst->jenis_kelamin == NULL)
                                                                    <label>Jenis Kelamin: <span style="color: red;">&ast;</span></label>
                                                                    @else
                                                                    <label>Jenis Kelamin: </label>
                                                                    @endif
                                                                    <div class="form-group">
                                                                        <select class="form-control" name="jenis_kelamin" required>
                                                                            <option <?php if($cst->jenis_kelamin=="Laki-Laki"){echo "selected";}?> value="Laki-Laki" >Laki-Laki</option>
                                                                            <option <?php if($cst->jenis_kelamin=="Perempuan"){echo "selected";}?> value="Perempuan">Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                @if ($cst->gambar_ktp == NULL)
                                                                <div class="col-lg-6">
                                                                    <div class="form=group">
                                                                        <label>KTP <span style="color: red;">&ast;</span></label>
                                                                        <input type="file" class="form-control" accept="image/*" name="gambar_ktp" required>
                                                                    </div>  
                                                                </div>
                                                                @endif
                                                                @if ($cst->gambar_ktp!==NULL)
                                                                <div class="col-lg-6">
                                                                    <div class="form=group">
                                                                        <label>KTP</label>
                                                                        <input type="file" class="form-control" accept="image/*" name="gambar_ktp">
                                                                    </div>  
                                                                </div>
                                                                @endif
                                                                <div class="col-lg-6">
                                                                    @if($cst->alamat_penyewa == NULL)
                                                                    <label>Alamat: <span style="color: red;">&ast;</span></label>
                                                                    @else
                                                                    <label>Alamat: </label>
                                                                    @endif
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" name="alamat_penyewa" rows="4">{{$cst->alamat_penyewa}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                                <i class="bx bx-x d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Kembali</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary ml-1">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Simpan</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade text-left" id="daftar{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                                <div class="modal-content" style="border-bottom:1px solid blue;">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">DAFTAR MEMBER</h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="{{route('daftarmember')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <h4 class="card-title">Rp. 50.000 / Tahun</h4>
                                                                    <h4 class="card-title">Keuntungan</h4>
                                                                    @foreach($disc as $diskon)
                                                                    <p>
                                                                        1. Mendapatkan potongan harga sebesar Rp. {{number_format($diskon->hargadiskon,0,",",".")}} <br>
                                                                        2. Mendapatkan 1 air mineral botol 1 liter / bulan <br>
                                                                        3. Mendapatkan kartu member
                                                                        <br>
                                                                    </p>
                                                                    <p style="color: red;">
                                                                        note : 
                                                                    </p>
                                                                    <p>
                                                                        ◽ Pilihlah opsi pembayaran yang sesuai <br>
                                                                        ◽ Pilihlah gambar yang sesuai <br>
                                                                        ◽ Setelah mendaftar dan membayar, tunggu konfirmasi dari admin, hasil konfirmasi dapat dilihat di menu profil <br>
                                                                        ◽ Jika pembayaran secara online tidak bisa / expired silahkan membayar secara offline.
                                                                    </p>
                                                                    @endforeach
                                                                </div>
                                                                @if($cst->ktp != NULL && $cst->jenis_kelamin != NULL && $cst->no_telp != NULL && $cst->alamat_penyewa != NULL && $cst->gambar_ktp != NULL)
                                                                    @if($cst->opsi_bayar == NULL)
                                                                    <div class="col-lg-6">
                                                                        <label>Opsi Pembayaran: </label>
                                                                        <div class="form-group">
                                                                            <select class="choices form-select" name="opsi_bayar" required>
                                                                                <option <?php if($cst->opsi_bayar == "Offline"){echo "selected";}?> value="Offline">Offline</option>
                                                                                <option <?php if($cst->opsi_bayar == "Online"){echo "selected";}?> value="Online">Online</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                    <div class="col-lg-6">
                                                                        <div class="form=group">
                                                                            <label>Pas Foto: </label>
                                                                            <input type="file" class="form-control" accept="image/*" name="pas_foto" required>
                                                                        </div>  
                                                                    </div>
                                                                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                                                    <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                                    <input type="hidden" name="phone" value="{{$cst->no_telp}}">
                                                                    <input type="hidden" name="hargamember" value="1">
                                                                @else
                                                                    <div class="alert alert-light-danger color-danger"><i
                                                                        class="bi bi-exclamation-circle"></i> Lengkapi Biodata Terlebih dahulu
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        @if($cst->ktp != NULL && $cst->jenis_kelamin != NULL && $cst->no_telp != NULL && $cst->alamat_penyewa != NULL && $cst->gambar_ktp != NULL)
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Kembali</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary ml-1" onclick="return confirm('Yakin Mendaftar Menjadi Member?')">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Daftar</span>
                                                            </button>
                                                        </div>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade text-left" id="perpanjang{{Auth::user()->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                                <div class="modal-content" style="border-bottom:1px solid blue;">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel33">PERPANJANG MEMBER</h4>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <form method="post" action="{{route('perpanjangmember')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <p style="color: red;">
                                                                        note : 
                                                                    </p>
                                                                    <p>
                                                                        ◽ Pilihlah opsi pembayaran yang sesuai <br>
                                                                        ◽ Setelah perpanjang dan membayar, tunggu konfirmasi dari admin, hasil konfirmasi dapat dilihat di menu profil <br>
                                                                        ◽ Jika pembayaran secara online tidak bisa / expired silahkan membayar secara offline.
                                                                    </p>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <label>Opsi Pembayaran: </label>
                                                                    <div class="form-group">
                                                                        <select class="choices form-select" name="opsi_bayar" required>
                                                                            <option <?php if($cst->opsi_bayar == "Offline"){echo "selected";}?> value="Offline">Offline</option>
                                                                            <option <?php if($cst->opsi_bayar == "Online"){echo "selected";}?> value="Online">Online</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="name" value="{{Auth::user()->name}}">
                                                                <input type="hidden" name="email" value="{{Auth::user()->email}}">
                                                                <input type="hidden" name="phone" value="{{$cst->no_telp}}">
                                                                <input type="hidden" name="hargamember" value="1">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Kembali</span>
                                                            </button>
                                                            <button type="submit" class="btn btn-primary ml-1" onclick="return confirm('Yakin Mendaftar Menjadi Member?')">
                                                                <i class="bx bx-check d-block d-sm-none"></i>
                                                                <span class="d-none d-sm-block">Perpanjang</span>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Gambar KTP</h4>
                                        <div>
                                        @foreach ($data as $dt)
                                            @if($dt->gambar_ktp != NULL)
                                            <p>
                                                <img src="{{asset('gambarktp')}}/{{$dt->gambar_ktp}}" style="min-height: 220px; max-width: 300px; border: 5px solid #435EBE; border-radius: 10px;" class="img-fluid" alt="">
                                            </p>
                                            @else
                                            <p></p>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Pas Foto</h4>
                                        <div>
                                        @foreach ($data as $dt)
                                            @if($dt->pas_foto != NULL)
                                            <p>
                                                <img src="{{asset('pasfoto')}}/{{$dt->pas_foto}}" style="max-height: 220px; max-width: 220px; border: 5px solid #435EBE; border-radius: 10px;" class="img-fluid" alt="">
                                            </p>
                                            @else
                                            <p></p>
                                            @endif
                                        @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script src="{{asset('template/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('template/dist/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('template/dist/assets/vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <script src="{{asset('template/dist/assets/vendors/apexcharts/apexcharts.js')}}"></script>
    <script src="{{asset('template/dist/assets/js/pages/dashboard.js')}}"></script>
    <script src="{{asset('template/dist/assets/js/main.js')}}"></script>
    <script src="{{asset('template/dist/assets/js/extensions/sweetalert2.js')}}"></script>
    <script src="{{asset('template/dist/assets/vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script type="text/javascript">
        // Listen to click event on payment buttons
        var payButtons = document.querySelectorAll('.pay-button');
        payButtons.forEach(function(button) {
            button.addEventListener('click', function () {
                var snapToken = this.getAttribute('data-snap-token');
                var orderId = this.getAttribute('data-id');

                // Trigger snap popup with corresponding snap token
                window.snap.pay(snapToken, {
                    onSuccess: function (result) {
                        /* You may add your own implementation here */
                        // window.location.href = '/user/data_sewa';
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Pembayaran Anda Berhasil! dan Menunggu Konfirmasi Dari Admin',
                            showConfirmButton: false,
                            timer: 6000 // Durasi pesan (ms)
                        }).then(() => {
                            window.location.href = '/user/profil';
                        });
                    },
                    onPending: function (result) {
                        /* You may add your own implementation here */
                        alert("Waiting for your payment!");
                        console.log(result);
                    },
                    onError: function (result) {
                        /* You may add your own implementation here */
                        alert("Payment failed!");
                        console.log(result);
                    },
                    onClose: function () {
                        /* You may add your own implementation here */
                        alert('You closed the popup without finishing the payment');
                    }
                });
            });
        });
    </script>
</body>
@include('page/layout/notif')
</html>