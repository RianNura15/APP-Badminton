<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@100;300;700&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@100;400;600&display=swap');

    body {
        font-family: 'Sarabun', sans-serif;
        background-color: #333333
    }

    hr {
        color: #0000004f;
        margin-top: 5px;
        margin-bottom: 5px
    }

    .add td {
        color: #c5c4c4;
        text-transform: uppercase;
        font-size: 12px
    }

    .content {
        font-size: 14px
    }

    .card-kasikron {
        height: 120px;
        width: 100%;
        border-radius: 20px;
        background-image: linear-gradient(to top right, #41ad03, #41ad03);
        padding: 10px;
        padding-right: 20px;
        padding-left: 20px;
        color: #fff;
        position: relative;
        overflow: hidden;
        cursor: pointer
    }

    .card-kasikron .line-1 {
        height: 200px;
        width: 200px;
        display: flex;
        clip-path: polygon(50% 0%, 15% 100%, 78% 100%);
        opacity: 0.6;
        background: #94ff00;
        position: absolute;
        bottom: 90px;
        right: -30px;
        transform: rotate(45deg);
        animation: anim 3s infinite
    }

    .card-kasikron .line-2 {
        height: 300px;
        width: 300px;
        display: flex;
        clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        opacity: 0.4;
        background: #94ff00;
        position: absolute;
        top: -30px;
        right: -30px;
        transform: rotate(70deg);
        animation: anim 3s infinite;
        animation-delay: 2s
    }

    .card-kasikron .line-3 {
        height: 200px;
        width: 200px;
        display: flex;
        clip-path: polygon(100% 0, 0 55%, 78% 100%);
        opacity: 0.3;
        background: #94ff00;
        position: absolute;
        top: -30px;
        right: -30px;
        transform: rotate(70deg);
        animation: anim 3s infinite;
        animation-delay: 4s
    }

    @keyframes anim {
        from {
            opacity: 0.3;
            transform: rotate(0deg)
        }

        to {
            opacity: 0.8;
            transform: rotate(180deg)
        }
    }

    .visa h4 {
        font-size: 40px;
        font-family: 'IBM Plex Sans Thai', serif
    }

    .visa span {
        margin-left: 2px;
        font-family: 'IBM Plex Sans Thai', serif
    }

    .visa img {
        width: 50px
    }

    .card .visa i {
        font-size: 50px
    }

    .tick {
        height: 25px;
        width: 75px;
        background-color: #333333;
        border-radius: 7px;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        font-family: 'IBM Plex Sans Thai', serif;
        margin-top: 6px
    }

    .tick i {
        transition: all 1s
    }

    .card:hover .tick i {
        transform: rotate(360deg)
    }

    .top-row {
        display: flex;
        justify-content: space-between;
        position: relative
    }

    .bottom-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        position: absolute;
        bottom: 5px
    }

    .bottom-row .dots {
        display: flex;
        flex-direction: row;
        margin-right: 7px
    }

    .bottom-row .dots span {
        height: 6px;
        width: 6px;
        background-color: #fff;
        border-radius: 50%;
        margin: 0 2px
    }

    .bottom-row .number {
        font-size: 20px;
        font-family: 'IBM Plex Sans Thai', serif;
        font-weight: 600
    }
</style>

<?php 
    $profil = DB::table('profil')->get();
?>

<body>
    @foreach ($data as $dt)
    <div class="container mt-5 mb-3">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="d-flex flex-row p-2">
                    <div class="d-flex flex-column"> <span class="font-weight-bold">Bukti Transaksi</span> <small>TRS-{{$dt->id_sewa}}</small> </div>
                </div>
                <hr> 
                <div class="table-responsive p-2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td>User</td>
                                <td>Sewa</td>
                            </tr>
                            <tr class="content">
                                <td class="font-weight-bold">{{Auth::user()->name}}<br>{{$dt->user->alamat_penyewa}}<br>{{$dt->user->email}}</td>
                                <td class="font-weight-bold">{{$dt->nama_lapangan->nama_lap}}<br>Tanggal Transaksi : {{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="products p-2">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="add">
                                <td>Nama Lapangan</td>
                                <td>Tanggal Main</td>
                                <td>Jam Main</td>
                                <td>Total Jam</td>
                            </tr>
                            @foreach($jwl as $dt)
                                <?php date_default_timezone_set('Asia/Jakarta');
                                $mulai = strtotime($dt->jam_mulai);
                                $selesai = strtotime($dt->jam_selesai);

                                $dif = $selesai - $mulai;

                                $jam = floor($dif/(60*60));
                                ?>
                                <tr class="content">
                                    <td>{{$dt->data_sewa->nama_lap}}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->tanggalmain)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($dt->jam_selesai)->format('H:i') }} WIB</td>
                                    <td>{{$jam}} Jam</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="products p-2">
                    <table class="table table-borderless">
                        <tbody>
                            @if($dt->data_sewa->keterangan == 'Clear')
                            <tr class="add">
                                <td class="text-center">
                                    <h3>Total</h3>
                                </td>
                            </tr>
                            <tr class="content">
                                <td class="text-center">
                                    <h2>Rp. {{number_format($dt->data_sewa->total,0,",",".")}}</h2>
                                </td>
                            </tr>
                            @endif
                            @if($dt->data_sewa->keterangan == 'DP')
                            <tr class="add">
                                <td class="text-center">
                                    <h3>DP</h3>
                                </td>
                            </tr>
                            <tr class="content">
                                <td class="text-center">
                                    <h2>Rp. {{number_format($dt->data_sewa->dp,0,",",".")}}</h2>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="address p-2">
                    <table class="table table-borderless">
                        @foreach ($profil as $pf)
                            <tbody>
                                <tr class="add">
                                    <td><b>{{$pf->nama_profil}}</b></td>
                                </tr>
                                <tr class="content">
                                    <td> 
                                        <div class="container">
                                            <div class="card-kasikron"> <span class="line-1"></span> <span class="line-2"></span> <span class="line-3"></span>
                                                <div class="top-row">
                                                    <div class="visa">
                                                        <h4>{{$pf->nama_profil}}</h4> <span>{{$pf->lokasi}}</span>
                                                    </div>
                                                    <div class="tick"> <i class="fa fa-copy"></i></div>
                                                </div>
                                                <div class="bottom-row">
                                                    <span class="number">{{$pf->no_profil}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>               
            </div>
        </div>
    </div>
</div>
@endforeach
</body>
</html>