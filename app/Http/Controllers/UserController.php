<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use App\Http\Requests\LoginPelangganRequest;
use App\Http\Requests\RegistrasiPelangganRequest;
use App\Http\Requests\ProfilRequest;
use App\Models\Data_sewa;
use App\Models\Datauser;
use App\Models\Diskon;
use App\Models\Image_lapangan;
use App\Models\Jenis_lapangan;
use App\Models\Karyawan;
use App\Models\Nama_lapangan;
use App\Models\Payment;
use App\Models\Pembayaran;
use App\Models\Peralatan;
use App\Models\Profil;
use App\Models\Jam;
use App\Models\Jadwal;

class UserController extends Controller
{
	public function loginpelanggan()
  	{
   return view('loginpelanggan');
	 }
	 public function cekloginpelanggan(LoginPelangganRequest $request)
	 {
	   if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
	    if (Auth::user()->status_user!=="Aktif") {
	     Auth::logout();
	     return redirect('loginpelanggan')->with('non-aktif','-');
	   }else{
	    if (Auth::user()->level=="Pelanggan" && "Member") {
	      return redirect('/')->with('loginpelanggan','-');
	    }else{
	      return redirect('/')->with('loginpelanggan','-');                    
	    }
	  }
	}else{
	  return redirect()->back()->with('salah','-');
	}
	}
	public function registerpelanggan()
	{
	 return view('registerpelanggan');
	}
	public function addregpelanggan(RegistrasiPelangganRequest $request)
	{
	 $cek=DB::table('users')->where('email', $request->email)->first();
	 if ($cek) {
	  return redirect()->back()->with('sama','-');
	}else{
	  $users = new User();
	  $users -> name = $request -> name;
	  $users -> email = $request -> email;
	  $users -> password = Hash::make($request -> password);
	  $users -> level = 'Pelanggan';
	  $users -> status_user = 'Aktif';
	  $users -> save();
	  DB::table('datauser')->insert([
	    'user_id'=>$users->id,
	    // 'username' => $users->username,
	  ]);
	  // Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
	  return redirect('loginpelanggan')->with('regispelanggan','-');
	}
	}
	public function logoutpelanggan(){
    	Auth::logout();
    	request()->session()->invalidate();
    	request()->session()->regenerateToken();
    	return redirect('/');
    }

    public function logoutpel(){
    	Auth::logout();
    	request()->session()->invalidate();
    	request()->session()->regenerateToken();
    	return redirect('registermember');
    }

	public function index()
	{
		$lapangan=DB::table('nama_lapangan')->join('jenis_lapangan','jenis_lapangan.id_jenis','=','nama_lapangan.jenis_id')->get();
		// $data=DB::table('users')->join('datauser','users.id','=','datauser.user_id')->get();
		return view('halaman/index',['lapangan'=>$lapangan]);
	}
	public function cek_boking($id_lapangan, Request $request)
	{	
		$search = $request['search'] ?? "";
		if ($search != "") {
			$data = Jadwal::with('data_sewa')->where('data_jadwal.id_lap',$id_lapangan)->where('tanggalmain','LIKE', "%$search%")->latest()->get();
		} else {
			$data=Jadwal::with('data_sewa')->where('data_jadwal.id_lap',$id_lapangan)->latest()->get();
		}
		return view('halaman/cek',['data'=>$data,'search'=>$search]);
	}
	public function visit($id_lapangan)
	{
		$data=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->join('image_lapangan','image_lapangan.lapangan_id','=','nama_lapangan.id_lapangan')->where('image_lapangan.lapangan_id',$id_lapangan)->get();
		$id=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->where('nama_lapangan.id_lapangan',$id_lapangan)->get();
		return view('halaman/visit',['data'=>$data,'id'=>$id]);
	}
	public function pilihjam($id_lapangan){
		$data=Jam::with('nama_lapangan')->where('jam.lapangan_id',$id_lapangan)->get();
		$fr=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->where('nama_lapangan.id_lapangan',$id_lapangan)->get();
		$lap=Nama_lapangan::get();
		$list=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->join('data_sewa','data_sewa.lap_id','=','nama_lapangan.id_lapangan')->where('data_sewa.lap_id',$id_lapangan)->where('Keterangan','Aktif')->get();
		return view('halaman/coba',['data'=>$data,'lap'=>$lap,'list'=>$list,'fr'=>$fr]);
	}
	public function bokingjam($id_jam)
	{
		$data=DB::table('jam')->join('nama_lapangan','jam.lapangan_id','=','nama_lapangan.id_lapangan')->where('jam.id_jam',$id_jam)->get();
		$fr=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->where('nama_lapangan.id_lapangan',$id_jam)->get();
		$lap=Nama_lapangan::get();
		$lengkap=DB::table('datauser')->where('user_id',Auth::user()->id)->get();
		$dis=DB::table('diskons')->get();
		$pay=DB::table('payment')->get();
		return view('halaman/addsewa',['data'=>$data,'lengkap'=>$lengkap,'dis'=>$dis,'pay'=>$pay,'fr'=>$fr]);
	}

	public function boking($id_lapangan)
	{
		$data=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->where('nama_lapangan.id_lapangan',$id_lapangan)->get();
		$lengkap=DB::table('datauser')->where('user_id',Auth::user()->id)->get();
		$pay=DB::table('payment')->get();
		$jam=Jam::get();
		$list=DB::table('nama_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->join('data_sewa','data_sewa.lap_id','=','nama_lapangan.id_lapangan')->where('data_sewa.lap_id',$id_lapangan)->where('Keterangan','Aktif')->get();
		return view('halaman/tambahsewa',['data'=>$data,'lengkap'=>$lengkap,'list'=>$list,'pay'=>$pay,'jam'=>$jam]);
	}

	public function add_sewa(Request $request)
	{
		$cek=Jadwal::where('id_lap',$request->id_lap1 AND $request->id_lap2)->orWhere('tanggalmain',$request->tanggal1 AND $request->tanggal2)->orWhere('status','=','1')->first();
		$jatuhtempo=Carbon::now()->addMinutes(15)->format('H:i:s');
		$hargasewa=$request->hargasewa;
		$mulai=strtotime($request->jam_mulai);
		$selesai=strtotime($request->jam_selesai);
		$diff= $selesai-$mulai;
		$jam=floor($diff/(60*60));
		$total= ($hargasewa * $jam);

		if ($cek) {
			if ($request->jam_mulai1>=$cek->jam_mulai1 AND $request->jam_selesai1<=$cek->jam_selesai1 AND $request->jam_mulai2>=$cek->jam_mulai2 AND $request->jam_selesai2<=$cek->jam_selesai2) {
				return redirect()->back()->with('digunakan','-');
			}
		}else{
			$sewa = new Data_sewa();
			$sewa -> id_user = $request -> id_user;
			$sewa -> lap_id = $request -> lap_id;
			$sewa -> id_payment = $request -> id_payment;
			$sewa -> namapb = $request -> namapb;
			$sewa -> hargasewa = $request -> hargasewa;
			$sewa -> tanggal = $request -> tanggal;
			$sewa -> tempo = $jatuhtempo;
			$sewa -> keterangan = '-';
			$sewa -> total = $request -> total;
			$sewa -> konfirmasi = 'Belum di Konfirmasi';
			$sewa -> bukti_tf = '-';
			$sewa -> save();

			Jadwal::create([
				'id_datasewa'=>$sewa->id,
				'id_lap'=>$request->id_lap1,
				'hari'=>$request->hari1,
				'expired'=>$jatuhtempo,
				'tanggalmain'=>$request->tanggal1,
				'jam_mulai'=>$request->jam_mulai1,
				'jam_selesai'=>$request->jam_selesai1,
				'keterangan'=>'-',
				'status'=>'1',
			]);

			Jadwal::create([
				'id_datasewa'=>$sewa->id,
				'id_lap'=>$request->id_lap2,
				'hari'=>$request->hari2,
				'expired'=>$jatuhtempo,
				'tanggalmain'=>$request->tanggal2,
				'jam_mulai'=>$request->jam_mulai2,
				'jam_selesai'=>$request->jam_selesai2,
				'keterangan'=>'-',
				'status'=>'1',
			]);
			return redirect('user/data_sewa')->with('addboking','-');
		}
	}

	public function jadwal($id_sewa){
		$data=Jadwal::with('data_sewa')->where('data_jadwal.id_datasewa',$id_sewa)->get();
		$trs=Data_sewa::where('data_sewa.id_sewa',$id_sewa)->get();
		return view('halaman/jadwal',['data'=>$data,'trs'=>$trs]);
	}

	public function struk($id_sewa){
		$data=Data_sewa::with('nama_lapangan','user')->where('data_sewa.id_sewa',$id_sewa)->get();
		$jwl=Jadwal::with('data_sewa')->where('data_jadwal.id_datasewa',$id_sewa)->get();
		return view('halaman/struknota',['data'=>$data, 'jwl'=>$jwl]);
	}

	public function data_sewa()
	{
		$data=Data_sewa::with('nama_lapangan','payment')->where('data_sewa.id_user',Auth::user()->id)->latest()->get();
		$kode=DB::table('payment')->get();
		// $diskon=DB::table('diskons')->get();
		return view('halaman/sewa',['data'=>$data,'kode'=>$kode]);
	}
	
	public function batal($id_sewa, Request $request)
	{
		Data_sewa::where('id_sewa',$id_sewa)->update([
			'konfirmasi'=>'Batal',
			'keterangan'=>'Di Batalkan',
		]);

		Jadwal::where('id_datasewa',$id_sewa)->update([
			'keterangan'=>'Di Batalkan',
			'status'=>'0',
		]);

		return redirect()->back()->with('batalkan','-');
	}
	
	public function profil()
	{
		$data=DB::table('users')->join('datauser','users.id','=','datauser.user_id')->where('users.id',Auth::user()->id)->get();
		return view('halaman/profil',compact('data'));
	}

	public function daftarmember(Request $request)
	{
		DB::table('users')->where('id',Auth::user()->id)->update([
			'level'=>$request->level,
		]);
		return redirect()->back()->with('daftarmember','-');
	}
	public function lengkapi(ProfilRequest $request)
	{
		if ($request->hasFile('gambar_ktp') && !empty($request->file('gambar_ktp'))) {
			$ambil=$request->file('gambar_ktp');
			$name=$ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/gambarktp", $namaFileBaru);
			$save=DB::table('datauser')->where('user_id',Auth::user()->id)->update([
				'username'=>$request->username,
				'no_telp'=>$request->no_telp,
				'jenis_kelamin'=>$request->jenis_kelamin,
				'ktp'=>$request->ktp,
				'alamat_penyewa'=>$request->alamat_penyewa,
				'gambar_ktp'=>$namaFileBaru,		
			]);
			DB::table('users')->where('id',Auth::user()->id)->update([
				'name'=>$request->name,
				'email'=>$request->email,
			]);
			return redirect()->back()->with('lengkapi','-');
		}else{
			DB::table('datauser')->where('user_id',Auth::user()->id)->update([
				'username'=>$request->username,
				'no_telp'=>$request->no_telp,
				'jenis_kelamin'=>$request->jenis_kelamin,
				'ktp'=>$request->ktp,
				'alamat_penyewa'=>$request->alamat_penyewa,		
			]);
			DB::table('users')->where('id',Auth::user()->id)->update([
				'name'=>$request->name,
				'email'=>$request->email,
			]);
			return redirect()->back()->with('lengkapi','-');
		}
	}
	public function upload_bukti(Request $request)
	{
		if ($request->hasFile('gambar')) {
			$ambil=$request->file('gambar');
			$name=$ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/upload", $namaFileBaru);
			$save=DB::table('data_sewa')->where('id_sewa',$request->id_sewa)->update([
				'bukti_tf'=>$namaFileBaru,		
				'keterangan'=>'Sedang di Cek',
			]);

			Jadwal::where('id_datasewa',$request->id_sewa)->update([
				'keterangan'=>'Pending',
			]);
			return redirect()->back()->with('bukti_tf','-');
		}
	}
	public function ubah_waktu(Request $request,$id_sewa)
	{
		$cek=DB::table('data_sewa')->where('lap_id',$request->id_lapangan)->where('tanggal',$request->tanggal)->where('keterangan','!=','Selesai')->first();
		$harga=$request->harga;
		$dis=$request->diskon;
		$mulai=strtotime($request->jam_mulai);
		$selesai=strtotime($request->jam_selesai);
		$diff= $selesai-$mulai;
		$jam=floor($diff/(60*60));
		$total= ($harga * $jam - $dis);
		if ($cek) {
			if ($request->jam_mulai>=$cek->jam_mulai AND $request->jam_selesai<=$cek->jam_selesai) {
				return redirect()->back()->with('digunakan','-');
			}DB::table('data_sewa')->where('id_sewa',$id_sewa)->update([
				'diskon'=>$request->diskon,
				'hargasewa'=>$request->harga,
				'tanggal'=>$request->tanggal,
				'jam_mulai'=>$request->jam_mulai,
				'jam_selesai'=>$request->jam_selesai,
				'totaljam'=>$jam,
				'total'=>$total,
			]);
			return redirect()->back()->with('oketgl','-');
		}else{
			DB::table('data_sewa')->where('id_sewa',$id_sewa)->update([
				'diskon'=>$request->diskon,
				'hargasewa'=>$request->harga,
				'tanggal'=>$request->tanggal,
				'jam_mulai'=>$request->jam_mulai,
				'jam_selesai'=>$request->jam_selesai,
				'totaljam'=>$jam,
				'total'=>$total,
			]);
			return redirect()->back()->with('oketgl','-');
		}
	}
}
