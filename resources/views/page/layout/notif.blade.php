@if(session('daftarmember'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Pendaftaran Berhasil",
		text: "Pendaftaran Sedang di Proses, Harap Tunggu dan Lihat di Halaman Profil Setelah Terkonfirmasi Oleh Admin!",
	});
</script>
@endif
@if(session('salahprofil'))
<script type="text/javascript">
	document.getElementById('error');
	Swal.fire({
		icon: "error",
		title: "Gagal Mengubah Data",
		text: "Email Harus @gmail.com"
	});
</script>
@endif
@if(session('gantilevel'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menyetujui Akun",
	});
</script>
@endif
@if(session('jenisadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data",
	});
</script>
@endif
@if(session('jenisup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Jenis Berhasil di Ubah.",
	});
</script>
@endif
@if(session('jenisdel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Jenis Berhasil di Hapus.",
	});
</script>
@endif
@if(session('setting'))
<script type="text/javascript">
    document.getElementById('success');
    Swal.fire({
        icon: "success",
        title: "Berhasil Setting Profil"
    });
</script>
@endif

@if(session('addpb'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data PB",
	});
</script>
@endif
@if(session('uppb'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data PB Berhasil di Ubah.",
	});
</script>
@endif
@if(session('delpb'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Delete Data PB",
		text: "Data PB Berhasil di Hapus.",
	});
</script>
@endif

@if(session('jamadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data",
	});
</script>
@endif
@if(session('jamup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Jam Berhasil di Ubah.",
	});
</script>
@endif
@if(session('jamdel'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Delete Data",
		text: "Data Jam Berhasil di Hapus.",
	});
</script>
@endif

@if(session('lapanganadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Lapangan",
	});
</script>
@endif
@if(session('lapanganup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Lapangan Berhasil di Ubah.",
	});
</script>
@endif
@if(session('lapangandel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Lapangan Berhasil di Hapus.",
	});
</script>
@endif

@if(session('karyawanadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Karyawan",
	});
</script>
@endif
@if(session('karyawanup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Karyawan Berhasil di Ubah.",
	});
</script>
@endif
@if(session('karyawandel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Karyawan Berhasil di Hapus",
	});
</script>
@endif

@if(session('peralatanadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Peralatan",
	});
</script>
@endif
@if(session('peralatanup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Peralatan Berhasil di Ubah.",
	});
</script>
@endif
@if(session('peralatandel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Peralatan Berhasil di Hapus",
	});
</script>
@endif

@if(session('diskonadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Diskon",
	});
</script>
@endif
@if(session('diskonup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Diskon Berhasil di Ubah.",
	});
</script>
@endif
@if(session('diskondel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Diskon Berhasil di Hapus",
	});
</script>
@endif

@if(session('paymentadd'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Data Payment",
	});
</script>
@endif
@if(session('paymentup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Update Data",
		text: "Data Payment Berhasil di Ubah.",
	});
</script>
@endif
@if(session('paymentdel'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Berhasil Delete Data",
		text: "Data Payment Berhasil di Hapus.",
	});
</script>
@endif

@if(session('statusup'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Ubah Status",
		text: "Data Status User Berhasil di Ubah.",
	});
</script>
@endif

@if(session('digunakan') || session('digunakan2'))
<script type="text/javascript">
	var message = '';
	@if(session('digunakan')) 
		message += '{{ session('digunakan') }} <br>';
	@endif

	@if(session('digunakan2')) 
		message += '{{ session('digunakan2') }}';
	@endif

	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Lapangan Sudah di Booking",
		html: message
	});
</script>
@endif

@if(session('digunakanpb'))
<script type="text/javascript">
	document.getElementById('warning');
	Swal.fire({
		icon: "warning",
		title: "Lapangan Sudah di Booking",
		text: "Silahkan Cari Jam Lain"
	});
</script>
@endif

@if(session('addkegiatan'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menambah Kegiatan"
	});
</script>
@endif

@if(session('addbokingpb'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Lapangan Berhasil Dipesan"
	});
</script>
@endif

@if(session('addboking'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Lapangan Berhasil Dipesan",
		text: "Segera Melakukan Pembayaran Pada Tombol Berwarna Hijau!"
	});
</script>
@endif
@if(session('sewadel'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Hapus Data",
		text: "Data Sewa Berhasil di Hapus.",
	});
</script>
@endif

@if(session('lengkapi'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menyimpan Data",
		text: "Data Profil Berhasil di di Simpan.",
	});
</script>
@endif

@if(session('keterangan'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Ubah Keterangan",
	});
</script>
@endif

@if(session('expired'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Mengubah Data Menjadi Expired",
	});
</script>
@endif

@if(session('batal'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Membatalkan Transaksi Sewa",
	});
</script>
@endif

@if(session('bataluser'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Membatalkan Persetujuan User",
	});
</script>
@endif

@if(session('batalkan'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Membatalkan Transaksi Sewa",
	});
</script>
@endif

@if(session('selesai'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Mengubah Data Menjadi Selesai",
	});
</script>
@endif

@if(session('bukti_tf'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Upload Pembayaran",
		text: "Tunggu Konfirmasi dari Admin.",
	});
</script>
@endif

@if(session('setuju'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Menyetujui",
		text: "Penyewaan di Setujui",
	});
</script>
@endif

@if(session('konfirmasi'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Confirm",
		text: "Penyewaan di Konfirmasi",
	});
</script>
@endif

@if(session('hanyadp'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Mengubah Status Hanya DP",
		text: "Mengubah Status",
	});
</script>
@endif

@if(session('pembayaran'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Berhasil Mengirim Data",
		text: "Data Transaksi berhasil di Terkirim",
	});
</script>
@endif

@if(session('oketgl'))
<script type="text/javascript">
	document.getElementById('success');
	Swal.fire({
		icon: "success",
		title: "Data Berhasil",
		text: "Berhasil Ubah Waktu Penyewaan",
	});
</script>
@endif