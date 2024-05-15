<html>
<head>
<?php 
$profil=DB::table('profil')->get();
?>
@foreach ($profil as $pf)
<h1><font face="Courier New" size="5" class="text-center">{{$pf->nama_profil}}</font></h1>
@endforeach
<body>
<font face="Courier New"/>

<table>
@foreach($data as $dt)
<tr>
<td>No. Transaksi</td><td>:</td>	
<td>TRS-{{$dt->id_sewa}}</td>
</tr>
@endforeach
<td colspan="4">------------------------------------------------------</td>

@foreach ($data as $dt)
<tr>
<td>Nama Pelanggan</td><td>:</td>
<td>{{$dt->user->name}}</td>
</tr>

 <tr>
<td>Alamat</td><td>:</td>
 <td>{{$dt->user->alamat_penyewa}}</td>
</tr>

 <tr>
<td>Nama Lapangan</td><td>:</td>
 <td>{{$dt->nama_lapangan->nama_lap}}</td>
</tr>

<tr>
<td>Tanggal Transaksi</td><td>:</td>
<td>{{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }}</td>
</tr>

<td colspan="4">------------------------------------------------------</td>
@foreach($jwl as $jadwal)
<tr>
<td>Tanggal Main</td><td>:</td>
<td>{{ \Carbon\Carbon::parse($jadwal->tanggalmain)->format('d F Y') }}</td>
</tr>
@endforeach
@foreach($jwl as $jadwal)
<tr>
<td>Jam Main</td><td>:</td>
<td>{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }} WIB</td>
</tr>
@endforeach

<td colspan="4">------------------------------------------------------</td>

<tr>
<td>Total Bayar</td><td>:</td>
<td style="padding-left:180px">
Rp. {{number_format($dt->total,0,",",".")}}</td>
</tr>
@endforeach

</table>
</body>
</html>

<script type="text/javascript">
    window.print();
</script>