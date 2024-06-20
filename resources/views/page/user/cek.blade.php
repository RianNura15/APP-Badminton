@extends('page/layout/app')
@section('title', 'Data Sewa User')
@section('content')
<div class="page-heading">
    <div class="page-heading">
    <a href="{{route('user')}}" class="btn btn-info">Kembali</a>
    </div>
    @foreach($user as $dt)
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">Menyetujui Akun Untuk Menjadi Member</h4>
                                <form action="{{route('gantilevel', $dt->id)}}" method="GET" enctype="multipart/form-data">
                                    @csrf
                                    <div style="width: 100%; overflow-x: auto;">
                                        <table style="width: 100%; text-align: left; border-collapse: collapse;">
                                            <tr style="display: flex; justify-content: space-between;">
                                            <td style="flex: 1; min-width: 100px; padding: 5px;">Nama</td>
                                            <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                            <td style="flex: 2; min-width: 150px; padding: 5px;">{{$dt->name}}</td>
                                            </tr>
                                            <tr style="display: flex; justify-content: space-between;">
                                            <td style="flex: 1; min-width: 100px; padding: 5px;">Email</td>
                                            <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                            <td style="flex: 2; min-width: 150px; padding: 5px;">{{$dt->email}}</td>
                                            @if($dt->member == '0')
                                                <tr style="display: flex; justify-content: space-between;">
                                                <td style="flex: 1; min-width: 100px; padding: 5px;">Member</td>
                                                <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                                <td style="flex: 2; min-width: 150px; padding: 5px;"><span class="badge bg-danger">Bukan Member</span></td>
                                                </tr>
                                            @endif
                                            @if($dt->member == '1')
                                                <tr style="display: flex; justify-content: space-between;">
                                                <td style="flex: 1; min-width: 100px; padding: 5px;">Member</td>
                                                <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                                <td style="flex: 2; min-width: 150px; padding: 5px;"><span class="badge bg-success">Member</span></td>
                                                </tr>
                                            @endif
                                            @if($dt->opsi_bayar != NULL)
                                                <tr style="display: flex; justify-content: space-between;">
                                                <td style="flex: 1; min-width: 100px; padding: 5px;">Pilihan Pembayaran</td>
                                                <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                                <td style="flex: 2; min-width: 150px; padding: 5px;">{{$dt->opsi_bayar}}</td>
                                                </tr>
                                            @endif
                                            @if($dt->jangka_waktu != NULL)
                                                <tr style="display: flex; justify-content: space-between;">
                                                <td style="flex: 1; min-width: 100px; padding: 5px;">Jangka Waktu</td>
                                                <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                                <td style="flex: 2; min-width: 150px; padding: 5px;">{{$dt->jangka_waktu}}</td>
                                                </tr>
                                            @endif
                                            <tr style="display: flex; justify-content: space-between;">
                                            <td style="flex: 1; min-width: 100px; padding: 5px;">Status Pembayaran</td>
                                            <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>	
                                            @if($dt->status_bayar == NULL)
                                                <td style="flex: 2; min-width: 150px; padding: 5px;"><span class="badge bg-danger">Belum Bayar</span></td>
                                            @endif
                                            @if($dt->status_bayar == 'Terbayar')
                                                <td style="flex: 2; min-width: 150px; padding: 5px;"><span class="badge bg-success">{{$dt->status_bayar}}</span></td>
                                            @endif
                                            @if($dt->status_bayar == 'Perpanjangan Belum di Bayar')
                                                <td style="flex: 2; min-width: 150px; padding: 5px;"><span class="badge bg-danger">{{$dt->status_bayar}}</span></td>
                                            @endif
                                            </tr>
                                            @if($dt->jml_jadimember != NULL)
                                                <tr style="display: flex; justify-content: space-between;">
                                                <td style="flex: 1; min-width: 100px; padding: 5px;">Jadi Member</td>
                                                <td style="flex: 0; min-width: 10px; padding: 5px;">:</td>
                                                <td style="flex: 2; min-width: 150px; padding: 5px;">{{$dt->jml_jadimember}}x</td>
                                                </tr>
                                            @endif
                                        </table>
                                    </div>
                                    @if($dt->member == '0' && $dt->pengajuan_member == '1' && $dt->jml_jadimember == NULL && $dt->status_bayar == 'Terbayar' || $dt->opsi_bayar == 'Online' && $dt->status_bayar == NULL && $today > $dt->updated_at)
                                        <button class="btn btn-sm btn-outline-primary form-control rounded-pill mt-4" onclick="return confirm('Yakin Menyetujui?')"> <i class="icon dripicons-document-edit"></i> Setujui</button>
                                    @endif
                                    @if($dt->setuju_admin == 1 && $dt->jml_jadimember != NULL || $dt->opsi_bayar == 'Online' && $dt->status_bayar == 'Perpanjangan Belum di Bayar' && $today > $dt->updated_at)
                                        <button class="btn btn-sm btn-outline-primary form-control rounded-pill mt-4" onclick="return confirm('Yakin Menyetujui?')"> <i class="icon dripicons-document-edit"></i> Setujui Perpanjangan</button>
                                    @endif
                                </form>
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
                                @foreach ($user as $dt)
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
    @endforeach
    <section class="section">
        <div class="card">
            @foreach($user as $dt)
                <div class="card-header">
                    Data Transaksi <b>{{$dt->name}}</b>
                </div>
            @endforeach
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>No. Transaksi</th>
                            <th>Tanggal Transaksi</th>
                            <th>Tanggal Main</th>
                            <th>Jam Main</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach($data as $dt)
                            @if($dt->data_jadwal->keterangan == 'Selesai')
                                <tr>
                                    <td>{{$no}}. </td>
                                    <td>TRS-{{$dt->id_sewa}}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->data_jadwal->tanggalmain)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($dt->data_jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($dt->data_jadwal->jam_selesai)->format('H:i') }} WIB</td>
                                    <td>
                                        <span class="badge bg-success">{{$dt->data_jadwal->keterangan}}</span>
                                    </td>
                                </tr>
                            @endif
                        <?php $no++ ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection