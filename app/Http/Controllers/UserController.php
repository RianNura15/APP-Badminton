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
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			if (Auth::user()->status_user !== "Aktif") {
				Auth::logout();
				return redirect('loginpelanggan')->with('non-aktif', '-');
			} else {
				if (Auth::user()->level == "Pelanggan" && "Member") {
					return redirect('/')->with('loginpelanggan', '-');
				} else {
					return redirect('/')->with('loginpelanggan', '-');                    
				}
			}
		} else {
			return redirect()->back()->with('salah', '-');
		}
	}

	public function registerpelanggan()
	{
		return view('registerpelanggan');
	}

	public function addregpelanggan(RegistrasiPelangganRequest $request)
	{
		$cek = DB::table('users')->where('email', $request->email)->first();

		if ($cek) {
			return redirect()->back()->with('sama', '-');
		} else {
			$users = new User();
			$users->name = $request->name;
			$users->email = $request->email;
			$users->password = Hash::make($request->password);
			$users->level = 'Pelanggan';
			$users->status_user = 'Aktif';
			$users->member = '0';
			$users->pengajuan_member = '0';
			$users->save();

			DB::table('datauser')->insert([
				'user_id' => $users->id,
			]);

			return redirect('loginpelanggan')->with('regispelanggan', '-');
		}
	}

	public function logoutpelanggan()
	{
    	Auth::logout();
    	request()->session()->invalidate();
    	request()->session()->regenerateToken();

    	return redirect('/');
    }

    public function logoutpel()
	{
    	Auth::logout();
    	request()->session()->invalidate();
    	request()->session()->regenerateToken();

    	return redirect('registermember');
    }

	public function index()
	{
		$lapangan = DB::table('nama_lapangan')->join('jenis_lapangan', 'jenis_lapangan.id_jenis', '=',  'nama_lapangan.jenis_id')->get();

		return view('halaman/index', ['lapangan' => $lapangan]);
	}
	
	public function cek_boking($id_lapangan, Request $request)
	{	
		$search = $request['search'] ?? "";
		$lapangan = Nama_lapangan::where('id_lapangan', $id_lapangan)->get();
		if ($search != "") {
			// Daftar jam dari 08:00 sampai 22:00
			$daftar_jam = Jam::with('nama_lapangan')->where('jam.lapangan_id',$id_lapangan)->pluck('jam_mulai')->toArray();
	
			// Daftar jadwal
			$jadwal = Jadwal::with('data_sewa')
								->where('data_jadwal.id_lap', $id_lapangan)
								->where('tanggalmain', 'LIKE', "%$search%")
								->where(function($query) {
									$query->where('keterangan', '-')
										->orWhere('keterangan', 'Mulai')
										->orWhere('keterangan', 'Aktif');
								})
								->get();

			$today = date('Y-m-d');
			
			if ($search >= $today) {
				$penanda_jam = array_fill_keys($daftar_jam, ['color' => 'LimeGreen', 'namapb' => 'Tersedia']);			
			} else if ($search < $today) {
				$penanda_jam = array_fill_keys($daftar_jam, ['color' => '#383838', 'namapb' => 'Tidak Tersedia']);
			}

			$penetapanwaktu = strtotime(date('08:00:00'));
			$waktu = strtotime(date('H:i:s'));

			for ($j = $penetapanwaktu; $j < $waktu; $j += 60) { 
				$hasiljam = date('H:i:s', $j);
				if ($search == $today) {
					if (array_key_exists($hasiljam, $penanda_jam)) {
						$penanda_jam[$hasiljam] = ['color' => '#383838', 'namapb' => 'Tidak Tersedia'];
					}
				}
			}
	
			foreach ($jadwal as $j) {
				$jam_mulai = strtotime($j->jam_mulai);
				$jam_selesai = strtotime($j->jam_selesai);
				
				for ($i = $jam_mulai; $i < $jam_selesai; $i += 3600) { 
					$jam = date('H:i:s', $i);
					if (array_key_exists($jam, $penanda_jam)) {
						if ($j->keterangan == 'Aktif') {
							$penanda_jam[$jam] = ['color' => 'red', 'namapb' => $j->data_sewa->namapb];
						} else if ($j->keterangan == '-') {
							$penanda_jam[$jam] = ['color' => 'yellow', 'namapb' => $j->data_sewa->namapb];
						} else if ($j->keterangan == 'Mulai') {
							$penanda_jam[$jam] = ['color' => '#0078D7', 'namapb' => $j->data_sewa->namapb];
						}
					}
				}
			}

		} else {
			$today = date('Y-m-d');
			$daftar_jam = Jam::where('lapangan_id', $id_lapangan)->pluck('jam_mulai')->toArray();
			$jadwal = Jadwal::with('data_sewa')
								->where('data_jadwal.id_lap', $id_lapangan)
								->where('tanggalmain', 'LIKE', $today)
								->where(function($query) {
									$query->where('keterangan', '-')
										->orWhere('keterangan', 'Mulai')
										->orWhere('keterangan', 'Aktif');
								})
								->get();

        	$penanda_jam = array_fill_keys($daftar_jam, ['color' => 'LimeGreen', 'namapb' => 'Tersedia']);

			$penetapanwaktu = strtotime(date('08:00:00'));
			$waktu = strtotime(date('H:i:s'));

			for ($j = $penetapanwaktu; $j < $waktu; $j += 60) { 
				$hasiljam = date('H:i:s', $j);
				if (array_key_exists($hasiljam, $penanda_jam)) {
					$penanda_jam[$hasiljam] = ['color' => '#383838', 'namapb' => 'Tidak Tersedia'];
				}
			}

			foreach ($jadwal as $j) {
				$jam_mulai = strtotime($j->jam_mulai);
				$jam_selesai = strtotime($j->jam_selesai);
				
				for ($i = $jam_mulai; $i < $jam_selesai; $i += 3600) { 
					$jam = date('H:i:s', $i);
					if (array_key_exists($jam, $penanda_jam)) {
						if ($j->keterangan == 'Aktif') {
							$penanda_jam[$jam] = ['color' => 'red', 'namapb' => $j->data_sewa->namapb];
						} else if ($j->keterangan == '-') {
							$penanda_jam[$jam] = ['color' => 'yellow', 'namapb' => $j->data_sewa->namapb];
						} else if ($j->keterangan == 'Mulai') {
							$penanda_jam[$jam] = ['color' => '#0078D7', 'namapb' => $j->data_sewa->namapb];
						}
					}
				}
			}
		}
        
		return view('halaman/cek', [
			'search' => $search, 
			'penanda_jam' => $penanda_jam, 
			'lapangan' => $lapangan
		]);
	}

	public function visit($id_lapangan)
	{
		$data = DB::table('nama_lapangan')
				->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
				->join('image_lapangan', 'image_lapangan.lapangan_id', '=', 'nama_lapangan.id_lapangan')
				->where('image_lapangan.lapangan_id', $id_lapangan)
				->get();
		$id = DB::table('nama_lapangan')
				->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
				->where('nama_lapangan.id_lapangan', $id_lapangan)
				->get();

		return view('halaman/visit', ['data' => $data,'id' => $id]);
	}

	public function pilihjam($id_lapangan)
	{
		$data = Jam::with('nama_lapangan')->where('jam.lapangan_id', $id_lapangan)->get();
		$fr = DB::table('nama_lapangan')
				->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
				->where('nama_lapangan.id_lapangan', $id_lapangan)
				->get();
		$lap = Nama_lapangan::get();
		$list = DB::table('nama_lapangan')
				->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
				->join('data_sewa', 'data_sewa.lap_id', '=', 'nama_lapangan.id_lapangan')
				->where('data_sewa.lap_id', $id_lapangan)
				->where('Keterangan', 'Aktif')
				->get();

		return view('halaman/coba', [
			'data' => $data, 
			'lap' => $lap, 
			'list' => $list, 
			'fr' => $fr
		]);
	}

	public function bokingjam($id_jam)
	{
		$data = DB::table('jam')
				->join('nama_lapangan', 'jam.lapangan_id', '=', 'nama_lapangan.id_lapangan')
				->where('jam.id_jam', $id_jam)
				->get();
		$fr = DB::table('nama_lapangan')
				->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
				->where('nama_lapangan.id_lapangan', $id_jam)
				->get();
		$lap = Nama_lapangan::get();
		$lengkap = DB::table('datauser')->where('user_id', Auth::user()->id)->get();
		$dis = DB::table('diskons')->get();
		$pay = DB::table('payment')->get();

		return view('halaman/addsewa', [
			'data' => $data, 
			'lengkap' => $lengkap, 
			'dis' => $dis, 
			'pay' => $pay, 
			'fr' => $fr
		]);
	}

	public function boking($id_lapangan)
	{
		$data = DB::table('nama_lapangan')
				->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
				->where('nama_lapangan.id_lapangan', $id_lapangan)
				->get();
		$lengkap = DB::table('datauser')->where('user_id', Auth::user()->id)->get();
		$pay = DB::table('payment')->get();
		$jam = Jam::with('nama_lapangan')->where('jam.lapangan_id', $id_lapangan)->get();
		$disc = Diskon::get();
		$list = DB::table('nama_lapangan')
				->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
				->join('data_sewa', 'data_sewa.lap_id', '=', 'nama_lapangan.id_lapangan')
				->where('data_sewa.lap_id', $id_lapangan)
				->where('Keterangan', 'Aktif')
				->get();

		return view('halaman/tambahsewa', [
			'data' => $data, 
			'lengkap' => $lengkap, 
			'list' => $list, 
			'pay' => $pay, 
			'jam' => $jam, 
			'disc' => $disc
		]);
	}

	public function ambilData()
	{
		$cek = Jadwal::where('keterangan', '-')
					->orWhere('keterangan', 'Aktif')
					->orWhere('keterangan', 'Mulai')
					->get();

		return response()->json($cek);
	}

	public function dataJadwal($id_lapangan)
	{
		$daftar_jam = Jam::where('lapangan_id', $id_lapangan)->get();
		$jadwal = Jadwal::where('keterangan', '-')
						->orWhere('keterangan', 'Aktif')
						->orWhere('keterangan', 'Mulai')
						->get();

		return response()->json([
            $daftar_jam, $jadwal
        ]);
	}

	public function add_sewa(Request $request)
	{
		$jatuhtempo = Carbon::now()->addMinutes(3)->format('H:i:s');
		$hargasewa = $request->hargasewa;
		$mulai = strtotime($request->jam_mulai);
		$selesai = strtotime($request->jam_selesai);
		$diff = $selesai - $mulai;
		$jam = floor($diff / (60 * 60));
		$total = ($hargasewa * $jam);

		$sewa = new Data_sewa();
		$sewa->id_user = $request->id_user;
		$sewa->lap_id = $request->lap_id;
		$sewa->id_payment = $request->id_payment;
		$sewa->namapb = $request->namapb;
		$sewa->tanggal = $request->tanggal;
		$sewa->tempo = $jatuhtempo;
		$sewa->keterangan = '-';
		$sewa->total = $request->total;
		$sewa->bukti_tf = 'Belum di Bayar';
		$sewa->dp = $request->dp;
		$sewa->save();

		Jadwal::create([
			'id_datasewa' => $sewa->id,
			'id_lap' => $request->id_lap1,
			'hari' => $request->hari1,
			'expired' => $jatuhtempo,
			'tanggalmain' => $request->tanggal1,
			'jam_mulai' => $request->jam_mulai1,
			'jam_selesai' => $request->jam_selesai1,
			'keterangan' => '-',
			'status' => '1',
		]);

		if ($request->id_payment == 1 ) {
			// Set your Merchant Server Key
			\Midtrans\Config::$serverKey = config('midtrans.server_key');
			// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
			\Midtrans\Config::$isProduction = true;
			// Set sanitization on (default)
			\Midtrans\Config::$isSanitized = true;
			// Set 3DS transaction for credit card to true
			\Midtrans\Config::$is3ds = true;
			\Midtrans\Config::$overrideNotifUrl = config('app.url').'/api/payment-callback';

			$params = array(
				'transaction_details' => array(
					'order_id' => $sewa->id,
					'gross_amount' => $sewa->dp,
				),
				'customer_details' => array(
					'first_name' => $request->name,
					'last_name' => '',
					'email' => $request->email,
					'phone' => $request->phone,
				),
			);

			$snapToken = \Midtrans\Snap::getSnapToken($params);
			Data_sewa::where('id_sewa', $sewa->id)->update([
				'snap_token' => $snapToken,
			]);
		} else {
			// Set your Merchant Server Key
			\Midtrans\Config::$serverKey = config('midtrans.server_key');
			// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
			\Midtrans\Config::$isProduction = true;
			// Set sanitization on (default)
			\Midtrans\Config::$isSanitized = true;
			// Set 3DS transaction for credit card to true
			\Midtrans\Config::$is3ds = true;
			\Midtrans\Config::$overrideNotifUrl = config('app.url').'/api/payment-callback';

			$params = array(
				'transaction_details' => array(
					'order_id' => $sewa->id,
					'gross_amount' => $sewa->total,
				),
				'customer_details' => array(
					'first_name' => $request->name,
					'last_name' => '',
					'email' => $request->email,
					'phone' => $request->phone,
				),
			);

			$snapToken = \Midtrans\Snap::getSnapToken($params);
			Data_sewa::where('id_sewa', $sewa->id)->update([
				'snap_token' => $snapToken,
			]);
		}

		return redirect('user/data_sewa')->with('addboking', '-');
	}

	public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
		$cekPayment = Data_sewa::where('id_sewa', $request->order_id)->first();
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
				if ($cekPayment->id_payment == 1) {
					$sewa = Data_sewa::where('id_sewa', $request->order_id)->update([
						'bukti_tf' => 'DP Terbayar',
						'keterangan' => 'DP'
					]);
					$jadwal = Jadwal::where('id_datasewa', $request->order_id)->update([
						'keterangan' => 'Aktif',
					]);
				} else {
					$sewa = Data_sewa::where('id_sewa', $request->order_id)->update([
						'bukti_tf' => 'Terbayar',
						'keterangan' => 'Clear'
					]);
					$jadwal = Jadwal::where('id_datasewa', $request->order_id)->update([
						'keterangan' => 'Aktif',
						'status' => '1',
					]);
	
					$pembayaran = new Pembayaran();
					$pembayaran->sewa_id = $request->order_id;
					$pembayaran->nominal = $request->gross_amount;
					$pembayaran->tanggal = $request->settlement_time;
					$pembayaran->status_pembayaran = 'Lunas';
					$pembayaran->save();
				}
            }
        }
    }

	public function jadwal($id_sewa)
	{
		$data = Jadwal::with('data_sewa')->where('data_jadwal.id_datasewa', $id_sewa)->get();
		$trs = Data_sewa::where('data_sewa.id_sewa', $id_sewa)->get();

		return view('halaman/jadwal', ['data' => $data, 'trs' => $trs]);
	}

	public function struk($id_sewa)
	{
		$data = Data_sewa::with('nama_lapangan', 'user')->where('data_sewa.id_sewa', $id_sewa)->get();
		$jwl = Jadwal::with('data_sewa')->where('data_jadwal.id_datasewa', $id_sewa)->get();

		return view('halaman/struknota', ['data' => $data, 'jwl' => $jwl]);
	}

	public function data_sewa()
	{
		$data = Data_sewa::with('nama_lapangan', 'payment')
						->where('data_sewa.id_user', Auth::user()->id)
						->latest()
						->get();
		$kode = DB::table('payment')->get();
		$id_user = Auth::user()->id;
		$disc = Diskon::where('nama_diskon', 'Member / Pelajar')->get();
		$jmlSelesai = Jadwal::with('data_sewa')->whereHas('data_sewa', function ($query) use ($id_user) {
                        $query->where('id_user', $id_user);
                    })->where('data_jadwal.keterangan', 'Selesai')->count();
		
		return view('halaman/sewa', [
			'data' => $data, 
			'kode' => $kode, 
			'jmlSelesai' => $jmlSelesai, 
			'disc' => $disc
		]);
	}
	
	public function batal($id_sewa, Request $request)
	{
		Data_sewa::where('id_sewa', $id_sewa)->update([
			'keterangan' => 'Di Batalkan Pelanggan',
		]);

		Jadwal::where('id_datasewa', $id_sewa)->update([
			'keterangan' => 'Di Batalkan Pelanggan',
			'status' => '0',
		]);

		return redirect()->back()->with('batalkan', '-');
	}
	
	public function profil()
	{
		$data = DB::table('users')
					->join('datauser', 'users.id', '=', 'datauser.user_id')
					->where('users.id', Auth::user()->id)
					->get();

		return view('halaman/profil', compact('data'));
	}

	public function daftarmember()
	{
		DB::table('users')->where('id', Auth::user()->id)->update([
			'pengajuan_member' => '1',
		]);

		return redirect()->back()->with('daftarmember', '-');
	}

	public function lengkapi(ProfilRequest $request)
	{
		if ($request->hasFile('gambar_ktp') && !empty($request->file('gambar_ktp'))) {
			$ambil = $request->file('gambar_ktp');
			$name = $ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/gambarktp", $namaFileBaru);
			$save = DB::table('datauser')->where('user_id', Auth::user()->id)->update([
				'username' => $request->username,
				'no_telp' => $request->no_telp,
				'jenis_kelamin' => $request->jenis_kelamin,
				'ktp' => $request->ktp,
				'alamat_penyewa' => $request->alamat_penyewa,
				'gambar_ktp' => $namaFileBaru,		
			]);
			DB::table('users')->where('id', Auth::user()->id)->update([
				'name' => $request->name,
				'email' => $request->email,
			]);

			return redirect()->back()->with('lengkapi', '-');
		} else {
			DB::table('datauser')->where('user_id', Auth::user()->id)->update([
				'username' => $request->username,
				'no_telp' => $request->no_telp,
				'jenis_kelamin' => $request->jenis_kelamin,
				'ktp' => $request->ktp,
				'alamat_penyewa' => $request->alamat_penyewa,		
			]);
			DB::table('users')->where('id', Auth::user()->id)->update([
				'name' => $request->name,
				'email' => $request->email,
			]);

			return redirect()->back()->with('lengkapi', '-');
		}
	}
	public function upload_bukti(Request $request)
	{
		if ($request->hasFile('gambar')) {
			$ambil = $request->file('gambar');
			$name = $ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/upload", $namaFileBaru);
			$save = DB::table('data_sewa')->where('id_sewa', $request->id_sewa)->update([
				'bukti_tf' => $namaFileBaru,		
				'keterangan' => 'Sedang di Cek',
			]);

			Jadwal::where('id_datasewa', $request->id_sewa)->update([
				'keterangan' => 'Pending',
			]);

			return redirect()->back()->with('bukti_tf', '-');
		}
	}
}
