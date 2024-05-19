<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan</title>
</head>
<body>
    <center>
        <h2>LAPORAN SEWA</h2>
        <hr />
        <p style="float: right;"><span id="tanggalwaktu"></span></p>
        <p style="float: left;"><span>Periode : {{$tgl_mulai}} s/d {{$tgl_selesai}}</span></p>
        <br>
    </center>
 
    <table border="1" style="width: 100%">
        <tr>
            <th>No. </th>
            <th>No. Transaksi</th>
            <th>Nama Lapangan</th>
            <th>Nama Penyewa</th>
            <th>Nama Sewa/Klub</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Total</th>
        </tr>

        @if($sum_total == 0)
            <tr>
                <td colspan="8"><center>Data Tidak Ada di Periode {{$tgl_mulai}} s/d {{$tgl_selesai}}</center></td>
            </tr>
        @else
        @php $no = 1; @endphp
        @foreach($data as $dt)
            <tr>
                <td style="text-align: center;">{{$no++}}.</td>
                <td style="text-align: center;">TRS-{{$dt->sewa_id}}</td>
                <td style="text-align: center;">{{$dt->data_sewa->nama_lap}}</td>
                <td style="text-align: center;">{{$dt->data_sewa->name}}</td>
                <td style="text-align: center;">{{$dt->data_sewa->namapb}}</td>
                <td style="text-align: center;">{{ \Carbon\Carbon::parse($dt->tanggal)->format('d F Y') }}</td>
                <td style="text-align: center;">{{$dt->status_pembayaran}}</td>
                <td style="text-align: center;">Rp. {{number_format($dt->nominal,0,",",".")}}</td>
            </tr>
        @endforeach
            <tr>
                <td colspan="7"><b>Subtotal : </b></td>
                <td style="text-align: center;">Rp. {{number_format($sum_total,0,",",".")}}</td>
            </tr>
        @endif
    </table>
 
    <script>
        window.print();
    </script>
    <script>
        var tw = new Date();
        if (tw.getTimezoneOffset() == 0) (a=tw.getTime() + ( 7 *60*60*1000))
        else (a=tw.getTime());
        tw.setTime(a);
        var tahun = tw.getFullYear ();
        var hari = tw.getDay ();
        var bulan = tw.getMonth ();
        var tanggal = tw.getDate ();
        var hariarray = new Array("Minggu,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");
        var bulanarray = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
        document.getElementById("tanggalwaktu").innerHTML = hariarray[hari]+" "+tanggal+" "+bulanarray[bulan]+" "+tahun+" Jam " + ((tw.getHours() < 10) ? "0" : "") + tw.getHours() + ":" + ((tw.getMinutes() < 10)? "0" : "") + tw.getMinutes() + (" WIB ");
    </script>
</body>
</html>

