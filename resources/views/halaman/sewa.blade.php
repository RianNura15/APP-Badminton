@extends('page/layout/app')

@section('title', 'Data Sewa')

@section('content')
<div class="row">
    <div class="col-12">
        <button class="btn btn-sm btn-success">
            <i class="dripicons dripicons-browser-upload"></i>
        </button>
        <b>Untuk Mengupload Bukti Pembayaran</b>
        <button class="btn btn-sm btn-primary" style="margin-left: 10px;">
            <i class="dripicons dripicons-disc"></i>
        </button>
        <b>Untuk Melihat Detail Transaksi</b>
        <a class="btn btn-sm btn-danger" style="margin-left: 10px;">X
        </a>
        <b>Untuk Membatalkan Transaksi</b>
        <a class="btn btn-sm btn-warning" style="margin-left: 10px;">
            <i class="dripicons dripicons-direction"></i>
        </a>
        <b>Untuk Melihat Bukti Transaksi</b>
        <div class="alert alert-light-danger color-danger" style="margin-top: 10px;"><i
            class="bi bi-exclamation-circle"></i> Jika Pembayaran Melebihi Jatuh Tempo, Penyewaan akan di Batalkan. Batas Waktu Tempo Adalah 2 jam 
        </div>
    </div>
    </div>
    <div class="page-heading">

        <section class="section">
            <div class="card">
                <div class="card-header">
                    With Data Sewa Lapangan <b>{{Auth::user()->name}}</b>
                    
                    <b style="float: right;">
                       | No Rekening : @foreach($kode as $pay) {{$pay->no_rek}}({{$pay->bank}}) - {{$pay->nama_rek}} | @endforeach
                    </b>
                    
                </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>No. Transaksi</th>
                            <th>Nama Lapangan</th>
                            <th>Jadwal</th>
                            <th>Tanggal</th>
                            <th>Jatuh Tempo</th>
                            <th>Bukti Transfer</th>
                            <th>Keterangan</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; ?>
                        @foreach($data as $dt)
                        <?php date_default_timezone_set('Asia/Jakarta');
                        $mulai=strtotime($dt->jam_mulai);
                        $selesai=strtotime($dt->jam_selesai);

                        $dif=$selesai-$mulai;

                        $jam=floor($dif/(60*60));
                        $menit=$dif-$jam*(60*60);
                        $menit2=floor($menit/60);
                        if ($menit2>=30) {
                            $jam+=1;
                        }
                        ?>
                        <tr>
                            <td>{{$no}}. </td>
                            <td>TRS-{{$dt->id_sewa}}</td>
                            <td>{{$dt->nama_lapangan->nama_lap}}</td>
                            <td>
                                <a href="{{route('jadwal',$dt->id_sewa)}}"><span class="badge bg-primary">Lihat</span></a>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }}</td>
                            <td>
                                @if($dt->keterangan=='-')
                                {{ \Carbon\Carbon::parse($dt->tempo)->diffForHumans() }}
                                @endif
                                @if($dt->keterangan=='Aktif' || $dt->keterangan=='Selesai' || $dt->keterangan=='Mulai')
                                <span class="badge bg-primary">Clear</span>
                                @endif
                                @if($dt->keterangan=='Sedang di Cek')
                                <span class="badge bg-warning">Menunggu</span>
                                @endif
                                @if($dt->keterangan=='Expired')
                                <span class="badge bg-danger">Sudah Expired</span>
                                @endif
                                @if($dt->keterangan=='Di Batalkan')
                                <span class="badge bg-danger">Batal</span>
                                @endif
                            </td>
                            <td>
                                @if($dt->bukti_tf=='-')
                                <span class="badge bg-danger">Segera Upload <br>Bukti Transfer</span>
                                @endif
                                @if($dt->bukti_tf!=="-")
                                <a href="{{asset('upload')}}//{{$dt->bukti_tf}}" target="_blank">
                                    <img src="{{asset('upload')}}//{{$dt->bukti_tf}}" width="80">
                                </a>
                                @endif
                            </td>
                            <td>
                                @if($dt->keterangan=='Sedang di Cek')
                                <span class="badge bg-warning">{{$dt->keterangan}}</span>
                                @endif
                                @if($dt->keterangan=='Aktif')
                                <span class="badge bg-primary">{{$dt->keterangan}}</span>
                                @endif
                                @if($dt->keterangan=='Selesai')
                                <span class="badge bg-success">{{$dt->keterangan}}</span>
                                @endif
                                @if($dt->keterangan=='Di Batalkan')
                                <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                @endif
                                @if($dt->keterangan=='Expired')
                                <span class="badge bg-danger">{{$dt->keterangan}}</span>
                                @endif
                                @if($dt->keterangan=='Mulai')
                                <span class="badge bg-info">{{$dt->keterangan}}</span>
                                @endif
                            </td>
                            <td>
                                Rp. {{number_format($dt->total,0,",",".")}}
                            </td>
                            <td align="center">
                                <button data-bs-toggle="modal" data-bs-target="#edit{{$dt->id_sewa}}" class="btn btn-sm btn-primary">
                                    <i class="dripicons dripicons-disc"></i>
                                </button>
                                @if($dt->keterangan!=='Di Batalkan' && $dt->keterangan!=='Expired')
                                <button data-bs-toggle="modal" data-bs-target="#batal{{$dt->id_sewa}}" class="btn btn-sm btn-danger">
                                    X
                                </button>
                                @endif
                                @if($dt->keterangan!=='Di Batalkan' && $dt->keterangan!=='Expired' && $dt->setuju=='1')
                                <button data-bs-toggle="modal" data-bs-target="#upload{{$dt->id_sewa}}" class="btn btn-sm btn-success">
                                    <i class="dripicons dripicons-browser-upload"></i>
                                </button>
                                @endif
                                @if($dt->keterangan=="Aktif" || $dt->keterangan=='Selesai')
                                <a href="{{route('struk',$dt->id_sewa)}}" target="_blank" class="btn btn-sm btn-warning">
                                    <i class="dripicons dripicons-direction"></i>
                                </a>
                                @endif
                        </td>
                    </tr>
                    <?php $no++ ?>
                    @include('halaman/batal')
                    @include('halaman/ubah_tanggal')
                    @include('halaman/detailsewa')
                    @include('halaman/uploadbayar')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
</div>
@include('halaman/norek')
@endsection