<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PeralatanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('clear_cache', function () {
	\Artisan::call('cache:clear');
	\Artisan::call('config:cache');
	\Artisan::call('view:clear');
	dd("Sudah Bersih nih!, Silahkan Kembali ke Halaman Utama");
});

//===================================AUTH ADMIN=========================================
Route::get('page/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('login', [AdminController::class, 'login'])->name('login');
Route::post('login/cek', [AdminController::class, 'ceklogin'])->name('ceklogin');
Route::get('register', [AdminController::class, 'register'])->name('register');
Route::post('register/addreg', [AdminController::class, 'addreg'])->name('addreg');

//===================================AUTH PELANGGAN=====================================
Route::get('page/logoutpelangan', [UserController::class, 'logoutpelanggan'])->name('logoutpelanggan');
Route::get('loginpelanggan', [UserController::class, 'loginpelanggan'])->name('loginpelanggan');
Route::post('loginpelanggan/cek', [UserController::class, 'cekloginpelanggan'])->name('cekloginpelanggan');
Route::get('registerpelanggan', [UserController::class, 'registerpelanggan'])->name('registerpelanggan');
Route::post('registerpelanggan/addreg', [UserController::class, 'addregpelanggan'])->name('addregpelanggan');
Route::get('logoutpel', [UserController::class, 'logoutpel'])->name('logoutpel');

//===================================AUTH MEMBER========================================
Route::get('page/logoutmember', [HomeController::class, 'logoutmember'])->name('logoutmember');
Route::get('loginmember', [HomeController::class, 'loginmember'])->name('loginmember')->middleware('guest');
Route::post('loginmember/cek', [HomeController::class, 'cekloginmember'])->name('cekloginmember');

//====================================== UMUM ==========================================
Route::get('/', [UserController::class, 'index'])->name('index');
Route::get('lapangan/visit/{id_lapangan}', [UserController::class, 'visit'])->name('visit');
Route::get('lapangan/cek_boking/{id_lapangan}', [UserController::class, 'cek_boking'])->name('cek_boking');
Route::get('/prosedur', function () {
    return view('halaman.prosedur');
});
Route::get('/kartu', function (){
	return view('page.user.kartumember');
});
Route::get('/location', function () {
    return view('halaman.location');
});

Route::group(['middleware'=>['auth','ceklevel:Admin']],function()
{
	Route::get('page/home', [HomeController::class, 'home'])->name('home');
	Route::get('/adminjadwal', [AdminController::class, 'dashboardJadwal'])->name('dashboardJadwal');

	//===========================================PROFIL======================================================
	Route::get('page/profil', [AdminController::class, 'profil_lapangan'])->name('profil_lapangan');
	Route::post('page/profil/{id_profil}', [AdminController::class, 'setting'])->name('setting');

	//============================================USER=======================================================
	Route::get('page/user', [AdminController::class, 'user'])->name('user');
	Route::get('page/pengguna', [AdminController::class, 'pengguna'])->name('pengguna');
	Route::post('page/pengguna/update/{id}', [AdminController::class, 'edit_pengguna'])->name('edit_pengguna');
	Route::get('page/user/status_user/{id}', [AdminController::class, 'status_user'])->name('status_user');
	Route::get('page/user/cek/{id}', [AdminController::class, 'validasiuser'])->name('cek');
	Route::get('page/user/cek/update/{id}', [AdminController::class, 'gantilevel'])->name('gantilevel');
	Route::get('page/user/cek/batalkan/{id}', [AdminController::class, 'bataluser'])->name('bataluser');

	//==============================================PB=======================================================
	Route::get('page/pb', [AdminController::class, 'pb'])->name('pb');
	Route::post('page/pb/add', [AdminController::class, 'add_pb'])->name('add_pb');
	Route::post('page/pb/update', [AdminController::class, 'update_pb'])->name('update_pb');
	Route::get('page/pb/delete/{id_pb}', [AdminController::class, 'delete_pb'])->name('delete_pb');

	//========================================JENIS LAPANGAN=================================================
	Route::get('page/jenis_sarana', [AdminController::class, 'jenis_lapangan'])->name('jenis_lapangan');
	Route::post('page/jenis_lapangan/add', [AdminController::class, 'add_jenis'])->name('add_jenis');
	Route::post('page/jenis_lapangan/update', [AdminController::class, 'update_jenis'])->name('update_jenis');
	Route::get('page/jenis_sarana/delete/{id_jenis}', [AdminController::class, 'delete_jenis'])->name('delete_jenis');

	//==========================================LAPANGAN=====================================================
	Route::get('page/lapangan', [AdminController::class, 'lapangan'])->name('lapangan');
	Route::post('page/lapangan/add', [AdminController::class, 'add_lapangan'])->name('add_lapangan');
	Route::post('page/lapangan/update', [AdminController::class, 'update_lapangan'])->name('update_lapangan');
	Route::get('page/lapangan/delete/{id_lapangan}', [AdminController::class, 'delete_lapangan']);
	Route::get('page/sarana/image/{id_lapangan}', [AdminController::class, 'image_lapangan'])->name('image');
	Route::post('page/lapangan/image/store', [AdminController::class, 'store'])->name('store');
	Route::delete('page/lapangan/image/delete/{id_image}', [AdminController::class, 'delete_image'])->name('delete_image');
	Route::get('page/lapangan/jam/{id_lapangan}', [AdminController::class, 'jam'])->name('jam');
	Route::post('page/lapangan/jam/add_jam', [AdminController::class, 'add_jam'])->name('add_jam');

	//===========================================PAYMENT=====================================================
	Route::get('page/payment', [AdminController::class, 'payment'])->name('payment');
	Route::post('page/payment/add', [AdminController::class, 'add_payment'])->name('add_payment');
	Route::post('page/payment/update', [AdminController::class, 'update_payment'])->name('update_payment');
	Route::get('page/payment/delete/{id_payment}', [AdminController::class, 'delete_payment'])->name('delete_payment');

	//==========================================DATA SEWA====================================================
	Route::get('page/data_sewa', [AdminController::class, 'sewa'])->name('sewa');
	Route::get('page/data_sewa/cek_data/{id_sewa}', [AdminController::class, 'cek_data'])->name('cek_data');
	Route::get('page/data_sewa/delete/{id_sewa}', [AdminController::class, 'deletesewa'])->name('deletesewa');
	Route::post('page/data_sewa/cek_data/keterangan', [AdminController::class, 'keterangan'])->name('keterangan');
	Route::get('page/data_sewa/cek_data/konfirmasi/{id_sewa}', [AdminController::class, 'konfirmasi'])->name('konfirmasi');
	Route::post('page/data_sewa/pembayaran/entry', [AdminController::class, 'entry'])->name('entry');
	Route::get('page/data_sewa/cek_data/batalkan/{id_sewa}', [AdminController::class, 'batalkan'])->name('batalkan');
	Route::get('page/data_sewa/expired/{id_sewa}', [AdminController::class, 'expired'])->name('expired');
	Route::get('page/data_sewa/cek_data/selesai/{id_sewa}', [AdminController::class, 'selesai'])->name('selesai');
	Route::get('page/data_sewa/cek_data/setuju/{id_sewa}', [AdminController::class, 'setuju'])->name('setuju');
	Route::get('page/data_sewapb/cek_sewapb/batalkan/{id_sewa}', [AdminController::class, 'batalkanpb'])->name('batalkanpb');
	Route::get('page/data_sewa/nota/{id_sewa}', [AdminController::class, 'nota'])->name('nota');
	Route::get('page/data_sewapb/notapb/{id_sewa}', [AdminController::class, 'notapb'])->name('notapb');
	Route::get('/ambildatapb', [AdminController::class, 'ambilData'])->name('ambilDataPB');
	Route::get('page/data/laporan/cetaklaporan', [AdminController::class, 'cetaklaporan'])->name('cetaklaporan');
	Route::get('page/data_sewapb', [AdminController::class, 'sewapb'])->name('sewapb');
	Route::get('page/data_sewapb/cek_sewapb/{id_sewa}', [AdminController::class, 'lihatsewapb'])->name('lihatsewapb');
	Route::get('page/data_sewapb/cek_sewapb/{id_sewa}', [AdminController::class, 'konfirmasipb'])->name('konfirmasipb');
	Route::get('page/data_sewapb/jadwalpb/{id_sewa}', [AdminController::class, 'jadwal_pb'])->name('jadwal_pb');

	// ===========================================TAMBAH====================================================
	Route::get('page/tambahsewa', [AdminController::class, 'tambahsewa'])->name('tambahsewa');
	Route::get('page/tambahkegiatan', [AdminController::class, 'tambahkegiatan'])->name('tambahkegiatan');
	Route::post('page/tambahsewa/tambah', [AdminController::class, 'tambah_sewapb'])->name('tambah_sewapb');
	Route::post('page/tambahkegiatan/tambahkegiatan', [AdminController::class, 'tambah_kegiatan'])->name('tambah_kegiatan');

	//===========================================JADWAL=====================================================
	Route::get('page/data/jadwal', [AdminController::class, 'datajadwal'])->name('datajadwal');
	Route::get('page/data/jadwal/selesai/{id_sewa}', [AdminController::class, 'jadwalselesai'])->name('jadwalselesai');

	//==========================================LAPORAN=====================================================
	Route::get('page/data/laporan', [AdminController::class, 'laporan'])->name('laporan');
	Route::get('page/data/laporan/pdf', [AdminController::class, 'print'])->name('print');
	Route::get('page/data/laporan/pdf/{tglawal}/{tglakhir}', [AdminController::class, 'cetak'])->name('cetak');

	//============================================JAM=======================================================
	// Route::get('page/jam',[AdminController::class,'jam'])->name('jam');
	// Route::post('page/jam/add',[AdminController::class,'add_jam'])->name('add_jam');
	Route::post('page/jam/update', [AdminController::class, 'update_jam'])->name('update_jam');
	Route::get('page/jam/delete/{id_jam}', [AdminController::class, 'delete_jam'])->name('delete_jam');

	//==========================================KARYAWAN====================================================
	Route::get('page/karyawan', [AdminController::class, 'karyawan'])->name('karyawan');
	Route::post('page/karyawan/add', [AdminController::class, 'addkaryawan'])->name('addkaryawan');
	Route::post('page/karyawan/update', [AdminController::class, 'updatekaryawan'])->name('updatekaryawan');
	Route::get('page/karyawan/delete/{id_karyawan}', [AdminController::class, 'deletekaryawan']);

	//==========================================PERALATAN===================================================
	Route::get('page/peralatan', [AdminController::class, 'peralatan'])->name('peralatan');
	Route::post('page/peralatan/add', [AdminController::class, 'add_peralatan'])->name('add_peralatan');
	Route::post('page/peralatan/update', [AdminController::class, 'update_peralatan'])->name('update_peralatan');
	Route::get('page/peralatan/delete/{id}', [AdminController::class, 'delete_peralatan']);

	//============================================DISKON====================================================
	Route::get('page/diskon', [AdminController::class, 'diskon'])->name('diskon');
	Route::post('page/diskon/add', [AdminController::class, 'add_diskon'])->name('adddiskon');
	Route::post('page/diskon/update', [AdminController::class, 'update_diskon'])->name('updatediskon');
	Route::get('page/diskon/delete/{id}', [AdminController::class, 'delete_diskon']);
});

Route::group(['middleware' => ['auth','ceklevel:Pelanggan,Member']],function()
{
	Route::get('/ambildata', [UserController::class, 'ambilData'])->name('ambilData');
	Route::get('/datajadwal/{id_lapangan}', [UserController::class, 'dataJadwal'])->name('dataJadwal');
	Route::get('lapangan/user/boking/{id_lapangan}', [UserController::class, 'boking'])->name('boking');
	Route::post('lapangan/user/boking/add', [UserController::class, 'add_sewa'])->name('add_sewa');
	Route::get('lapangan/user/bokingjam/{id_lapangan}', [UserController::class, 'bokingjam'])->name('bokingjam');
	Route::get('/cekjadwal/{id_lapangan}', [UserController::class, 'cekJadwal'])->name('cekJadwal');
	Route::get('lapangan/user/pilihjam/{id_lapangan}', [UserController::class, 'pilihjam'])->name('pilihjam');
	Route::get('user/data_sewa/', [UserController::class, 'data_sewa'])->name('data_sewa');
	Route::get('user/data_sewa/delete/{id_sewa}', [UserController::class, 'delete_sewa'])->name('delete_sewa');
	Route::post('user/data_sewa/upload', [UserController::class, 'upload_bukti'])->name('upload_bukti');
	Route::post('user/data_sewa/ubah-waktu/{id_sewa}', [UserController::class, 'ubah_waktu'])->name('ubah_waktu');
	Route::get('user/data_sewa/jadwal/{id_sewa}', [UserController::class, 'jadwal'])->name('jadwal');
	Route::get('user/data_sewa/batalkan/{id_sewa}', [UserController::class, 'batal'])->name('batal');
	Route::get('user/data_sewa/cetak/{id_sewa}', [UserController::class, 'struk'])->name('struk');
	Route::get('user/profil/', [UserController::class, 'profil'])->name('profil');
	Route::post('user/profil/lengkapi', [UserController::class, 'lengkapi'])->name('lengkapi');
	Route::get('user/profil/daftarmember', [UserController::class, 'daftarmember'])->name('daftarmember');
	Route::get('registermember', [HomeController::class, 'registermember'])->name('registermember');
	Route::post('registermember/addreg', [HomeController::class, 'addregmember'])->name('addregmember');
});