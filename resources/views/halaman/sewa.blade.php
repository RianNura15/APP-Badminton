<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript"
        src="{{config('midtrans.snap_url')}}" data-client-key="{{config('midtrans.client_key')}}">
    </script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
    <title>Data Sewa</title>

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
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-sm btn-success">
                        <i class="dripicons dripicons-browser-upload"></i>
                    </button>
                    <b>Untuk Melakukan Pembayaran</b>
                    <a class="btn btn-sm btn-danger" style="margin-left: 10px;">X
                    </a>
                    <b>Untuk Membatalkan Transaksi</b>
                    <a class="btn btn-sm btn-warning" style="margin-left: 10px;">
                        <i class="dripicons dripicons-direction"></i>
                    </a>
                    <b>Untuk Melihat Bukti Transaksi</b>
                    <div class="alert alert-light-danger color-danger" style="margin-top: 10px;"><i
                        class="bi bi-exclamation-circle"></i> Jika Pembayaran Melebihi Jatuh Tempo, Penyewaan akan di Batalkan. Batas Waktu Jatuh Tempo Adalah 10 Menit 
                    </div>
                </div>
            </div>
            <div class="page-heading">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            With Data Sewa Lapangan <b>{{Auth::user()->name}}</b>
                            @if($jmlSelesai >= 5 && auth()->user()->pengajuan_member == '0')
                            <div style="float: right;">
                                <button data-bs-toggle="modal" data-bs-target="#member" class="btn btn-sm btn-primary">Daftar Member</button>
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>No. Transaksi</th>
                                        <th>Nama Lapangan</th>
                                        <th>Nama Sewa/Klub</th>
                                        <th>Jadwal</th>
                                        <th>Tanggal</th>
                                        <th>Jatuh Tempo</th>
                                        <th>Pembayaran</th>
                                        <th>Keterangan</th>
                                        <th>DP</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach($data as $dt)
                                        <?php date_default_timezone_set('Asia/Jakarta');
                                        $mulai = strtotime($dt->data_jadwal->jam_mulai);
                                        $selesai = strtotime($dt->data_jadwal->jam_selesai);
                                        $dif = $selesai - $mulai;
                                        $jam = floor($dif/(60*60));
                                        ?>
                                        <tr>
                                            <td>{{$no}}. </td>
                                            <td>TRS-{{$dt->id_sewa}}</td>
                                            <td>{{$dt->nama_lapangan->nama_lap}}</td>
                                            <td>{{$dt->namapb}}</td>
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#jadwal{{$dt->id_sewa}}" class="badge bg-primary">
                                                    Lihat
                                                </button>
                                                @include('halaman/jadwalsewa')
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }}</td>
                                            <td>
                                                @if($dt->keterangan=='-')
                                                {{ \Carbon\Carbon::parse($dt->tempo)->diffForHumans() }}
                                                @endif
                                                @if($dt->keterangan=='Clear' || $dt->keterangan=='Selesai' || $dt->keterangan=='Mulai')
                                                <span class="badge bg-primary">Clear</span>
                                                @endif
                                                @if($dt->keterangan=='Sedang di Cek')
                                                <span class="badge bg-warning">Menunggu</span>
                                                @endif
                                                @if($dt->keterangan=='Expired')
                                                <span class="badge bg-danger">Sudah Expired</span>
                                                @endif
                                                @if($dt->keterangan=='Di Batalkan Pelanggan' || $dt->keterangan=='Di Batalkan Admin')
                                                <span class="badge bg-danger">Batal</span>
                                                @endif
                                                @if($dt->keterangan=='DP' && $dt->bukti_tf=='DP Terbayar')
                                                <span class="badge bg-info">DP</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($dt->bukti_tf=='Belum di Bayar')
                                                <span class="badge bg-warning">{{$dt->bukti_tf}}</span>
                                                @endif
                                                @if($dt->bukti_tf=='Terbayar')
                                                <span class="badge bg-primary">{{$dt->bukti_tf}}</span>
                                                @endif
                                                @if($dt->bukti_tf=='DP Terbayar')
                                                <span class="badge bg-info">{{$dt->bukti_tf}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($dt->keterangan=='Clear')
                                                <span class="badge bg-primary">{{$dt->keterangan}}</span>
                                                @endif
                                                @if($dt->keterangan=='Di Batalkan Pelanggan' || $dt->keterangan=='Di Batalkan Admin')
                                                <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                                @endif
                                                @if($dt->keterangan=='Expired')
                                                <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                                @endif
                                                @if($dt->keterangan=='-' && $dt->bukti_tf=='Belum di Bayar')
                                                <span class="badge bg-warning">Segera Membayar!</span>
                                                @endif
                                                @if($dt->keterangan=='DP')
                                                <span class="badge bg-info">DP</span>
                                                @endif
                                            </td>
                                            <td>
                                                Rp. {{number_format($dt->dp,0,",",".")}}
                                            </td>
                                            <td>
                                                Rp. {{number_format($dt->total,0,",",".")}}
                                            </td>
                                            <td align="center">
                                                <!-- <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_sewa}}" class="btn btn-sm btn-primary">
                                                    <i class="dripicons dripicons-disc"></i>
                                                </button> -->
                                                @if($dt->keterangan == 'DP' || $dt->keterangan == 'Clear' && $dt->data_jadwal->keterangan == 'Aktif' || $dt->keterangan =='-')
                                                <button data-bs-toggle="modal" data-bs-target="#batal{{$dt->id_sewa}}" class="btn btn-sm btn-danger">
                                                    X
                                                </button>
                                                @endif
                                                @if($dt->keterangan=='Di Batalkan Pelanggan' || $dt->keterangan=='Di Batalkan Admin')
                                                <a href=""></a>
                                                @elseif($dt->keterangan=='Expired')
                                                <a href=""></a>
                                                @elseif($dt->keterangan=='Clear')
                                                <a href=""></a>
                                                @elseif($dt->keterangan=='-' && $dt->snap_token!==NULL)
                                                <button class="btn btn-sm btn-success pay-button" data-snap-token="{{$dt->snap_token}}" data-id="{{$dt->id_sewa}}">
                                                    <i class="dripicons dripicons-browser-upload"></i>
                                                </button>
                                                <!-- <button class="btn btn-primary pay-button" data-snap-token="{{$dt->snap_token}}" data-id="{{$dt->id_sewa}}">Bayar Sekarang!</button> -->
                                                @endif
                                                @if($dt->keterangan=="Clear" || $dt->keterangan=='DP' || $dt->keterangan == 'Di Batalkan Admin' && $dt->bukti_tf == 'Terbayar')
                                                <a href="{{route('struk',$dt->id_sewa)}}" target="_blank" class="btn btn-sm btn-warning">
                                                    <i class="dripicons dripicons-direction"></i>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        <?php $no++ ?>
                                        @include('halaman/batal')
                                        
                                        <div class="modal fade" id="member" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
                                            role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalCenterTitle">Selamat Kamu Sudah Bisa Daftar Menjadi Member
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <h4 class="card-title">Keuntungan</h4>
                                                                @foreach($disc as $diskon)
                                                                <p>
                                                                    1. Mendapatkan potongan harga sebesar Rp. {{number_format($diskon->hargadiskon,0,",",".")}} <br>
                                                                    2. Mendapatkan 1 air mineral botol 1 liter / bulan <br>
                                                                    3. Mendapatkan kartu member
                                                                    <br>
                                                                    <br>
                                                                </p>
                                                                <p style="color: red;">
                                                                    note : <p> Setelah mendaftar, dapat melihat informasi di halaman profil setelah di konfirmasi oleh Admin. </p>
                                                                </p>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{route('daftarmember')}}" class="btn btn-sm btn-outline-primary form-control rounded-pill ">Daftar Sekarang!</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
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
                            text: 'Pembayaran Anda Berhasil!',
                            showConfirmButton: false,
                            timer: 2000 // Durasi pesan (ms)
                        }).then(() => {
                            window.location.href = '/user/data_sewa';
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