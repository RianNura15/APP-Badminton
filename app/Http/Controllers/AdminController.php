<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\RegistrasiAdminRequest;
use App\Models\Image;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Data_sewa;
use App\Models\Datauser;
use App\Models\Diskon;
use App\Models\Image_lapangan;
use App\Models\Jenis_lapangan;
use App\Models\Karyawan;
use App\Models\Nama_lapangan;
use App\Models\Payment;
use App\Models\Pembayaran;
use App\Models\Jam;
use App\Models\Jadwal;
use App\Models\PB;
use App\Models\Peralatan;
use App\Models\Profil;
use PDF;
use Carbon\Carbon;

class AdminController extends Controller
{
	public function login()
	{
		return view('login');
	}

	public function ceklogin(LoginAdminRequest $request)
	{
		if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
			if (Auth::user()->status_user !== "Aktif") {
				Auth::logout();
				return redirect('login')->with('non-aktif', '-');
			} else {
				if (Auth::user()->level == "Admin") {
					return redirect('page/home')->with('login', '-');
				} else {
					return redirect('login');                    
				}
			}
		} else {
			return redirect()->back()->with('salah', '-');
		}
	}

	public function register()
	{
		return view('register');
	}

	public function addreg(RegistrasiAdminRequest $request)
	{
		$cek=DB::table('users')->where('email', $request->email)->first();

		if ($cek) {
			return redirect()->back()->with('sama', '-');
		} else {
			$users = new User();
			$users->name = $request->name;
			$users->email = $request->email;
			$users->password = Hash::make($request->password);
			$users->level = 'Admin';
			$users->status_user = 'Aktif';
			$users->member = '0';
			$users->pengajuan_member = '0';
			$users->save();

			DB::table('datauser')->insert([
				'user_id' => $users->id,
			]);

			return redirect('login')->with('regis', '-');
		}
	}

	public function logout()
	{
    	Auth::logout();
    	request()->session()->invalidate();
    	request()->session()->regenerateToken();

    	return redirect('/login');
    }

	public function dashboardJadwal(Request $request)
	{   
		$search = $request['search'] ?? date('Y-m-d');
		$lapanganList = Nama_lapangan::all();
		$result = [];

		foreach ($lapanganList as $lapangan) {
			$id_lapangan = $lapangan->id_lapangan;
			$daftar_jam = Jam::with('nama_lapangan')->where('jam.lapangan_id', $id_lapangan)->pluck('jam_mulai')->toArray();

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
							$interval_start = strtotime($j->jam_mulai);
							$interval_end = strtotime($j->jam_selesai);
							$current_time = strtotime(date('H:i:s'));

							$interval_colors = [];
							for ($i = $interval_start; $i < $interval_end; $i += 3600) {
								$interval_colors[date('H:i:s', $i)] = 'red';
							}

							foreach ($interval_colors as $interval_time => $color) {
								if ($current_time >= strtotime($interval_time) && $current_time < strtotime('+1 hour', strtotime($interval_time))) {
									$interval_colors[$interval_time] = '#0078D7';
								} elseif ($current_time < strtotime($interval_time)) {
									break;
								} else {
									$interval_colors[$interval_time] = '#383838';
								}
							}

							foreach ($interval_colors as $interval_time => $color) {
								$namapb = ($color == '#383838') ? 'Tidak Tersedia' : $j->data_sewa->namapb;
								$penanda_jam[$interval_time] = ['color' => $color, 'namapb' => $namapb];
							}
						}
					}
				}
			}

			$result[$id_lapangan] = [
				'nama_lapangan' => $lapangan->nama_lap,
				'penanda_jam' => $penanda_jam,
			];
		}

		return response()->json($result);
	}

	public function jenis_lapangan()
	{
		$data = DB::table('jenis_lapangan')->get();

		return view('page/jenis/jenis', ['data' => $data]);
	}

	public function add_jenis(Request $request)
	{
		DB::table('jenis_lapangan')->insert([
			'nama_jenis' => $request->nama_jenis,
		]);

		return redirect()->back()->with('jenisadd', '-');
	}

	public function update_jenis(Request $request)
	{
		DB::table('jenis_lapangan')->where('id_jenis', $request->id_jenis)->update([
			'nama_jenis' => $request->nama_jenis,
		]);

		return redirect()->back()->with('jenisup', '-');
	}

	public function delete_jenis($id_jenis)
	{
		DB::table('jenis_lapangan')->where('id_jenis', $id_jenis)->delete();

		return redirect()->back()->with('jenisdel', '-');
	}

	public function pb()
	{
		$data = PB::all();

		return view('page/pb/pb', ['data' => $data]);
	}

	public function add_pb(Request $request)
	{
		$this->validate($request, [
            'nama_pb' => 'required',
            'nama_ketua' => 'required',
        ]);

		PB::create([
			'nama_pb' => $request->nama_pb,
			'nama_ketua' => $request->nama_ketua,
		]);

		return redirect()->back()->with('addpb', '-');
	}

	public function delete_pb($id_pb)
	{
		PB::where('id_pb', $id_pb)->delete();

		return redirect()->back()->with('delpb', '-');
	}

	public function update_pb(Request $request)
	{
		PB::where('id_pb', $request->id_pb)->update([
			'nama_pb' => $request->nama_pb,
			'nama_ketua' => $request->nama_ketua,
		]);

		return redirect()->back()->with('uppb', '-');
	}

	public function add_jam(Request $request)
	{
		$this->validate($request, [
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'lapangan_id' => 'required',
        ]);

		$jam_mulai = strtotime($request->jam_mulai);
		$jam_selesai = strtotime($request->jam_selesai);

		if ($jam_selesai - $jam_mulai != 3600) {
			return redirect()->back()->with('cekjam', '-');
		}

		Jam::create([
			'jam_mulai' => $request->jam_mulai,
			'jam_selesai' => $request->jam_selesai,
			'lapangan_id' => $request->lapangan_id,
		]);

		return redirect()->back()->with('jamadd', '-');
	}

	public function update_jam(Request $request)
	{	
		$jam_mulai = strtotime($request->jam_mulai);
		$jam_selesai = strtotime($request->jam_selesai);

		if ($jam_selesai - $jam_mulai != 3600) {
			return redirect()->back()->with('cekjam', '-');
		}
		
		DB::table('jam')->where('id_jam', $request->id_jam)->update([
			'jam_mulai' => $request->jam_mulai,
			'jam_selesai' => $request->jam_selesai,
			'lapangan_id' => $request->lapangan_id,
		]);

		return redirect()->back()->with('jamup', '-');
	}
	public function delete_jam($id_jam)
	{
		DB::table('jam')->where('id_jam', $id_jam)->delete();

		return redirect()->back()->with('jamdel', '-');
	}

	public function jam($id_lapangan)
	{
		$data = Jam::with('nama_lapangan')->where('jam.lapangan_id', $id_lapangan)->latest()->get();
		$lapangan = Nama_lapangan::where('nama_lapangan.id_lapangan', $id_lapangan)->get();

		return view('page/lapangan/jam', ['data' => $data, 'lapangan' => $lapangan]);
	}

    public function lapangan()
	{
		$data = DB::table('nama_lapangan')
					->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
					->get();
		$jenis = DB::table('jenis_lapangan')->get();

		return view('page/lapangan/lapangan', ['data' => $data, 'jenis' => $jenis]);
	}

	public function add_lapangan(Request $request)
	{
		if ($request->hasFile('gambar')) {
			$ambil = $request->file('gambar');
			$name = $ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/gambar", $namaFileBaru);
			$save = DB::table('nama_lapangan')->insert([
				'nama_lap' => $request->nama_lap,
				'jenis_id' => $request->jenis_id,
				'harga_pagi' => $request->harga_pagi,
				'harga_malam' => $request->harga_malam,
				'gambar' => $namaFileBaru,
				'kegiatan' => $request->kegiatan,  		
				'det_lapangan' => $request->det_lapangan,  		
			]);

			return redirect()->back()->with('lapanganadd', '-');
		}
	}

	public function update_lapangan(Request $request)
	{
		if ($request->hasFile('gambar') && !empty($request->file('gambar'))) {
			$ambil = $request->file('gambar');
			$name = $ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/gambar", $namaFileBaru);
			$save = DB::table('nama_lapangan')->where('id_lapangan', $request->id_lapangan)->update([
				'nama_lap' => $request->nama_lap,
				'jenis_id' => $request->jenis_id,
				'harga_pagi' => $request->harga_pagi,
				'harga_malam' => $request->harga_malam,
				'gambar' => $namaFileBaru,
				'kegiatan' => $request->kegiatan,  		
				'det_lapangan' => $request->det_lapangan,  		
			]);

			return redirect()->back()->with('lapanganup', '-');
		}else{
			DB::table('nama_lapangan')->where('id_lapangan', $request->id_lapangan)->update([
				'nama_lap' => $request->nama_lap,
				'jenis_id' => $request->jenis_id,
				'harga_pagi' => $request->harga_pagi,
				'harga_malam' => $request->harga_malam,
				'kegiatan' => $request->kegiatan,  		
				'det_lapangan' => $request->det_lapangan,  		
			]);

			return redirect()->back()->with('lapanganup', '-');
		}
	}

	public function delete_lapangan($id_lapangan)
	{
		DB::table('nama_lapangan')->where('id_lapangan', $id_lapangan)->delete();

		return redirect()->back()->with('lapangandel', '-');
	}

	public function image_lapangan($id_lapangan)
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

		return view('page/lapangan/image', ['data' => $data, 'id' => $id]);
	}

	public function store(Request $request)
	{
		$files = $request->file('file');

		foreach ($files as $file) {
			$foto = md5($file->getClientOriginalName());
			DB::table('image_lapangan')->insert([
				'lapangan_id' => $request->id_lapangan,
				'filename' => $foto,
				'path' => $file->move(\base_path()."/public/image", $foto),
			]);
		}

		return redirect()->back()->with('success', 'File telah diupload');
	}

	public function delete_image($id_image)
	{
		DB::table('image_lapangan')->where('id_image', $id_image)->delete();

		return redirect()->back();
	}

	public function payment()
	{
		$data = DB::table('payment')->get();

		return view('page/payment/payment', ['data' => $data]);
	}

	public function add_payment(Request $request)
	{
		DB::table('payment')->insert([
			'metode_payment' => $request->metode_payment,
			'dp' => $request->dp,
		]);

		return redirect()->back()->with('paymentadd', '-');
	}

	public function update_payment(Request $request)
	{
		Payment::where('id_payment', $request->id_payment)->update([
			'dp' => $request->dp,
		]);

		return redirect()->back()->with('paymentup', '-');
	}

	public function delete_payment($id_payment)
	{
		DB::table('payment')->where('id_payment', $id_payment)->delete();

		return redirect()->back()->with('paymentdel', '-');
	}

	public function user()
	{
		$data = DB::table('users')
					->join('datauser', 'datauser.user_id', '=', 'users.id')
					->where('level', 'Pelanggan')
					->get();

		return view('page/user/user', ['data' => $data]);
	}

	public function pengguna()
	{
		$data = DB::table('users')
					->join('datauser', 'datauser.user_id', '=', 'users.id')
					->where('level', 'Member')
					->get();

		return view('page/user/pengguna', ['data' => $data]);
	}

	public function validasiuser($id)
	{
		$user = DB::table('users')
					->join('datauser', 'users.id', '=', 'datauser.user_id')
					->where('users.id', $id)
					->get();
		$data = Data_sewa::with('nama_lapangan', 'data_jadwal')
					->where('data_sewa.id_user', $id)
					->latest()
					->get();

		return view('page/user/cek', ['data' => $data, 'user' => $user]);
	}

	public function gantilevel($id, Request $request)
	{	
		$jangkawaktu = Carbon::now()->addYears(1)->format('Y-m-d H:i:s');
		$pengingat = Carbon::parse($jangkawaktu)->subDays(3)->format('Y-m-d H:i:s');
		$datauser = Datauser::where('user_id', $id)->get();

		User::where('id', $id)->update([
			'member' => '1',
		]);

		foreach ($datauser as $dt) {
			if ($dt->jml_jadimember != NULL) {
				Datauser::where('user_id', $id)->update([
					'jml_jadimember' => intval($dt->jml_jadimember) + 1,
				]);
			} else {
				Datauser::where('user_id', $id)->update([
					'jml_jadimember' => 1,
				]);
			}
		}

		Datauser::where('user_id', $id)->update([
			'jangka_waktu' => $jangkawaktu,
			'pengingat' => $pengingat,
			'status_bayar' => 'Terbayar',
			'setuju_admin' => 0,
		]);

		return redirect()->back()->with('gantilevel', '-');
	}

	public function edit_pengguna(Request $request, $id)
	{
		if ($request->password == "") {
			DB::table('users')->where('id', $id)->update([
				'name' => $request->name,
				'username' => $request->username,
			]);

			return redirect()->back();
		}else{
			DB::table('users')->where('id', $id)->update([
				'name' => $request->name,
				'username' => $request->username,
				'password' => hash::make($request->password),
			]);
		}

		return redirect()->back();
	}

	public function status_user($id)
	{
		$data = DB::table('users')->where('id', $id)->first();

		if ($data) {
			if ($data->status_user == "Aktif") {
				DB::table('users')->where('id', $id)->update([
					'status_user' => 'Non-Aktif',
				]);

				return redirect()->back()->with('statusup', '-');
			} else {
				DB::table('users')->where('id', $id)->update([
					'status_user' => 'Aktif',
				]);

				return redirect()->back()->with('statusup', '-');
			}
		}
	}

	public function bataluser($id, Request $request)
	{
		User::where('id', $id)->update([
			'cek'=>'0',
		]);

		return redirect()->back()->with('bataluser', '-');
	}

	public function tambahsewa(){
		$lap = Nama_lapangan::get();
		$pb = PB::get();
		$jam = Jam::get();

		return view('page/sewa/tambahsewa', ['lap' => $lap, 'pb' => $pb, 'jam' => $jam]);
	}

	public function tambahkegiatan()
	{
		$lap = Nama_lapangan::get();
		$jam = Jam::get();

		return view('page/sewa/tambahkegiatan', ['lap' => $lap, 'jam' => $jam]);
	}

	public function tambah_kegiatan(Request $request)
	{
		$sewa = new Data_sewa();
		$sewa->id_user = $request->id_user;
		$sewa->lap_id = $request->lap_id;
		$sewa->namapb = $request->namapb;
		$sewa->hargasewa = $request->hargasewa;
		$sewa->tanggal = $request->tanggal;
		$sewa->keterangan = 'Aktif';
		$sewa->total = $request->total;
		$sewa->konfirmasi = 'Sudah di Konfirmasi';
		$sewa->isadmin = '1';
		$sewa->setuju = '1';
		$sewa->save();

		Jadwal::create([
			'id_datasewa' => $sewa->id,
			'id_lap' => $request->lap_id,
			'hari' => $request->hari,
			'tanggalmain' => $request->tanggalmain,
			'jam_mulai' => $request->jam_mulai,
			'jam_selesai' => $request->jam_selesai,
			'keterangan' => 'Aktif',
			'status' => '1',
		]);

		return redirect()->back()->with('addkegiatan', '-');
	}

	public function ambilData()
	{
		$cek = Jadwal::where('keterangan', '-')
					->orWhere('keterangan', 'Pending')
					->orWhere('keterangan', 'Aktif')
					->orWhere('keterangan', 'Mulai')
					->get();

		return response()->json($cek);
	}

	public function tambah_sewapb(Request $request)
	{
		$hargasewa = $request->hargasewa;
		$mulai = strtotime($request->jam_mulai);
		$selesai = strtotime($request->jam_selesai);
		$diff = $selesai - $mulai;
		$jam = floor($diff / (60 * 60));
		$total = ($hargasewa * $jam);

		$sewa = new Data_sewa();
		$sewa -> id_user = $request -> id_user;
		$sewa -> lap_id = $request -> lap_id;
		$sewa -> namapb = $request -> namapb;
		$sewa -> hargasewa = $request -> hargasewa;
		$sewa -> tanggal = $request -> tanggal;
		$sewa -> keterangan = 'Sedang di Cek';
		$sewa -> total = $request -> total;
		$sewa -> konfirmasi = 'Belum di Konfirmasi';
		$sewa -> isadmin = '1';
		$sewa -> setuju = '1';
		$sewa -> save();

		Jadwal::create([
			'id_datasewa' => $sewa->id,
			'id_lap' => $request->id_lap1,
			'hari' => $request->hari1,
			'tanggalmain' => $request->tanggal1,
			'jam_mulai' => $request->jam_mulai1,
			'jam_selesai' => $request->jam_selesai1,
			'keterangan' => 'Pending',
			'status' => '1',
		]);

		Jadwal::create([
			'id_datasewa' => $sewa->id,
			'id_lap' => $request->id_lap2,
			'hari' => $request->hari2,
			'tanggalmain' => $request->tanggal2,
			'jam_mulai' => $request->jam_mulai2,
			'jam_selesai' => $request->jam_selesai2,
			'keterangan' => 'Pending',
			'status' => '1',
		]);

		Jadwal::create([
			'id_datasewa' => $sewa->id,
			'id_lap' => $request->id_lap3,
			'hari' => $request->hari3,
			'tanggalmain' => $request->tanggal3,
			'jam_mulai' => $request->jam_mulai3,
			'jam_selesai' => $request->jam_selesai3,
			'keterangan' => 'Pending',
			'status' => '1',
		]);

		Jadwal::create([
			'id_datasewa' => $sewa->id,
			'id_lap' => $request->id_lap4,
			'hari' => $request->hari4,
			'tanggalmain' => $request->tanggal4,
			'jam_mulai' => $request->jam_mulai4,
			'jam_selesai' => $request->jam_selesai4,
			'keterangan' => 'Pending',
			'status' => '1',
		]);

		Jadwal::create([
			'id_datasewa' => $sewa->id,
			'id_lap' => $request->id_lap5,
			'hari' => $request->hari5,
			'tanggalmain' => $request->tanggal5,
			'jam_mulai' => $request->jam_mulai5,
			'jam_selesai' => $request->jam_selesai5,
			'keterangan' => 'Pending',
			'status' => '1',
		]);

		Jadwal::create([
			'id_datasewa' => $sewa->id,
			'id_lap' => $request->id_lap6,
			'hari' => $request->hari6,
			'tanggalmain' => $request->tanggal6,
			'jam_mulai' => $request->jam_mulai6,
			'jam_selesai' => $request->jam_selesai6,
			'keterangan' => 'Pending',
			'status' => '1',
		]);

		Jadwal::create([
			'id_datasewa' => $sewa->id,
			'id_lap' => $request->id_lap7,
			'hari' => $request->hari7,
			'tanggalmain' => $request->tanggal7,
			'jam_mulai' => $request->jam_mulai7,
			'jam_selesai' => $request->jam_selesai7,
			'keterangan' => 'Pending',
			'status' => '1',
		]);

		Jadwal::create([
			'id_datasewa' => $sewa->id,
			'id_lap' => $request->id_lap8,
			'hari' => $request->hari8,
			'tanggalmain' => $request->tanggal8,
			'jam_mulai' => $request->jam_mulai8,
			'jam_selesai' => $request->jam_selesai8,
			'keterangan' => 'Pending',
			'status' => '1',
		]);

		return redirect('page/data_sewapb')->with('addbokingpb', '-');
	}

	public function sewa()
	{
		$data = Data_sewa::with('nama_lapangan', 'user', 'data_jadwal')->latest()->get();

		return view('page/sewa/sewa', ['data' => $data]);
	}

	public function sewapb()
	{
		$data = Data_sewa::with('nama_lapangan', 'user')->where('isadmin', '=', '1')->latest()->get();

		return view('page/sewa/sewapb', ['data' => $data]);
	}

	public function datajadwal()
	{
		$data = Jadwal::with('data_sewa')->latest()->get();

		return view('page/jadwal/jadwal', ['data' => $data]);
	}

	public function jadwal_pb($id_sewa)
	{
		$data = Jadwal::with('data_sewa')->where('data_jadwal.id_datasewa', $id_sewa)->get();
		$trs = Data_sewa::where('data_sewa.id_sewa', $id_sewa)->get();

		return view('page/sewa/jadwalpb', ['data' => $data, 'trs' => $trs]);
	}

	public function cek_data($id_sewa)
	{
		$data = DB::table('nama_lapangan')
					->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
					->join('data_sewa', 'data_sewa.lap_id', '=', 'nama_lapangan.id_lapangan')
					->join('users', 'users.id', '=', 'data_sewa.id_user')
					->join('datauser', 'datauser.user_id', '=', 'users.id')
					->where('data_sewa.id_sewa', $id_sewa)
					->get();
		$jwl = Jadwal::with('data_sewa')->where('data_jadwal.id_datasewa', $id_sewa)->get();

		return view('page/sewa/cek', ['data' => $data, 'jwl' => $jwl]);
	}

	public function lihatsewapb($id_sewa)
	{
		$data = DB::table('nama_lapangan')
					->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
					->join('data_sewa', 'data_sewa.lap_id', '=', 'nama_lapangan.id_lapangan')
					->join('users', 'users.id', '=', 'data_sewa.id_user')
					->join('datauser', 'datauser.user_id', '=', 'users.id')
					->where('data_sewa.id_sewa', $id_sewa)
					->get();

		return view('page/sewa/cekpb', ['data' => $data]);
	}

	public function nota($id_sewa)
	{
		$data = Data_sewa::with('nama_lapangan', 'user')->where('data_sewa.id_sewa', $id_sewa)->get();
		$jwl = Jadwal::with('data_sewa')->where('data_jadwal.id_datasewa', $id_sewa)->get();

		return view('page/sewa/nota', ['data' => $data, 'jwl' => $jwl]);
	}

	public function notapb($id_sewa)
	{
		$data = Data_sewa::with('nama_lapangan', 'user')->where('data_sewa.id_sewa', $id_sewa)->get();
		$jwl = Jadwal::with('data_sewa')->where('data_jadwal.id_datasewa', $id_sewa)->get();

		return view('page/sewa/notapb', ['data' => $data, 'jwl' => $jwl]);
	}

	public function deletesewa($id_sewa)
	{
		DB::table('data_sewa')->where('id_sewa', $id_sewa)->delete();

		return redirect()->back()->with('sewadel', '-');
	}

	public function keterangan(Request $request)
	{
		DB::table('data_sewa')->where('id_sewa', $request->id_sewa)->update([
			'keterangan' => $request->keterangan,
		]);

		return redirect('page/data_sewa')->with('keterangan', '-');
	}

	public function konfirmasi($id_sewa, Request $request)
	{
		DB::table('data_sewa')->where('id_sewa', $id_sewa)->update([
			'keterangan' => 'Clear',
			'bukti_tf' => 'Terbayar',
		]);

		Jadwal::where('id_datasewa', $id_sewa)->update([
			'keterangan' => 'Aktif',
			'status' => '1',
		]);

		Pembayaran::create([
			'sewa_id' => $request->sewa_id,
			'nominal' => $request->nominal,
			'tanggal' => date("Y-m-d"),
			'status_pembayaran' => $request->status_pembayaran,
		]);

		return redirect('page/data_sewa')->with('konfirmasi', '-');
	}

	public function hanyadp($id_sewa, Request $request)
	{
		Data_sewa::where('id_sewa', $id_sewa)->update([
			'keterangan' => 'Hanya DP',
		]);

		Jadwal::where('id_datasewa', $id_sewa)->update([
			'keterangan' => 'Hanya DP',
			'status' => '0',
		]);

		Pembayaran::create([
			'sewa_id' => $id_sewa,
			'nominal' => $request->nominal,
			'tanggal' => date("Y-m-d"),
			'status_pembayaran' => 'Hanya DP',
		]);

		return redirect('page/data_sewa')->with('hanyadp', '-');
	}

	public function konfirmasipb($id_sewa, Request $request)
	{
		DB::table('data_sewa')->where('id_sewa', $id_sewa)->update([
			'konfirmasi' => 'Sudah di Konfirmasi',
			'keterangan' => 'Aktif',
		]);

		Jadwal::where('id_datasewa', $id_sewa)->update([
			'keterangan' => 'Aktif',
			'status' => '1',
		]);

		Pembayaran::create([
			'sewa_id' => $request->sewa_id,
			'tanggal' => $request->tanggal,
			'nominal' => $request->nominal,
			'status_pembayaran' => $request->status_pembayaran,
		]);

		return redirect('page/data_sewapb')->with('konfirmasi', '-');
	}

	public function setuju($id_sewa, Request $request)
	{
		Data_sewa::where('id_sewa', $id_sewa)->update([
			'setuju' => '1',
		]);

		return redirect('page/data_sewa')->with('setuju', '-');
	}

	public function expired($id_sewa, Request $request)
	{
		Data_sewa::where('id_sewa', $id_sewa)->update([
			'keterangan' => 'Expired',
		]);

		Jadwal::where('id_datasewa', $id_sewa)->update([
			'keterangan' => 'Expired',
			'status' => '0',
		]);

		return redirect('page/data_sewa')->with('expired', '-');
	}

	public function jadwalselesai($id_jadwal)
	{
		Jadwal::where('id_jadwal', $id_jadwal)->update([
			'keterangan' => 'Selesai',
			'status' => '0',
		]);

		return redirect('page/data/jadwal')->with('selesai', '-');
	}

	public function batalkan($id_sewa, Request $request)
	{
		Data_sewa::where('id_sewa', $id_sewa)->update([
			'keterangan' => 'Di Batalkan Admin',
		]);

		Jadwal::where('id_datasewa',$id_sewa)->update([
			'keterangan' => 'Di Batalkan Admin',
			'status' => '0',
		]);

		return redirect('page/data_sewa')->with('batal', '-');
	}

	public function batalkanpb($id_sewa, Request $request)
	{
		Data_sewa::where('id_sewa', $id_sewa)->update([
			'konfirmasi' => 'Batal',
			'keterangan' => 'Di Batalkan',
		]);

		Jadwal::where('id_datasewa', $id_sewa)->update([
			'keterangan' => 'Di Batalkan',
			'status' => '0',
		]);

		return redirect('page/data_sewapb')->with('batal', '-');
	}

	public function selesai($id_sewa, Request $request)
	{
		Data_sewa::where('id_sewa',$id_sewa)->update([
			'konfirmasi' => 'Sudah di Konfirmasi',
			'keterangan' => 'Selesai',
		]);

		return redirect('page/data_sewa')->with('selesai', '-');
	}

	public function entry(Request $request)
	{
		DB::table('pembayaran')->insert([
			'sewa_id' => $request->sewa_id,
			'nominal' => $request->nominal,
			'status_pembayaran' => $request->status_pembayaran,
		]);

		return redirect()->back()->with('pembayaran', '-');
	}

	public function laporan()
	{
		$data = Pembayaran::with('data_sewa','user', 'nama_lapangan')->latest()->get();
		$sum_total = Pembayaran::sum('nominal');

		return view('page/laporan/laporan', ['data' => $data, 'sum_total' => $sum_total]);
	}

	public function cetaklaporan(Request $request)
	{
		$tgl_mulai = $request->tgl_mulai;
		$tgl_selesai = $request->tgl_selesai;

		if($tgl_mulai AND $tgl_selesai){
			$data = Pembayaran::with('data_sewa', 'user', 'nama_lapangan')
								->whereBetween('tanggal', [$tgl_mulai, $tgl_selesai])
								->get();
			$sum_total = Pembayaran::whereBetween('tanggal', [$tgl_mulai, $tgl_selesai])->sum('nominal');
		}else{
			$data = Pembayaran::with('data_sewa', 'user', 'nama_lapangan')->get();
		}

		return view('page.laporan.pdf', compact('data', 'sum_total', 'tgl_mulai', 'tgl_selesai'));
	}

	public function print()
	{
        $data = DB::table('data_sewa')
					->join('nama_lapangan', 'data_sewa.lap_id', '=', 'nama_lapangan.id_lapangan')
					->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
					->join('payment', 'data_sewa.id_payment', '=', 'payment.id_payment')
					->join('pembayaran', 'pembayaran.sewa_id', '=', 'data_sewa.id_sewa')
					->join('users', 'users.id', '=', 'data_sewa.id_user')
					->join('datauser', 'datauser.user_id', '=', 'users.id')
					->get();
		$omset = DB::table('nama_lapangan')
					->join('jenis_lapangan', 'nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis')
					->join('data_sewa', 'data_sewa.lap_id', '=', 'nama_lapangan.id_lapangan')
					->join('users', 'users.id', '=', 'data_sewa.id_user')
					->join('datauser', 'datauser.user_id', '=', 'users.id')
					->join('pembayaran', 'pembayaran.sewa_id', '=', 'data_sewa.id_sewa')
					->limit('1')
					->get();

        return view('page/laporan/pdf', ['data' => $data, 'omset' => $omset]);
    }

	public function profil_lapangan()
	{
		$profil = DB::table('profil')->get();

		return view('page/profil', ['profil' => $profil]);
	}

	public function setting(Request $request,$id_profil)
	{
		DB::table('profil')->where('id_profil', $id_profil)->update([
			'nama_profil' => $request->nama_profil,
			'jenis_apk' => $request->jenis_apk,
			'lokasi' => $request->lokasi,
			'no_profil' => $request->no_profil,
		]);

		return redirect()->back()->with('setting', '-');
	}

	public function karyawan()
	{
		$data = DB::table('karyawan')->get();

		return view('page/karyawan/karyawan', ['data' => $data]);
	}

	public function addkaryawan(Request $request)
	{
		if ($request->hasFile('ktp')) {
			$ambil = $request->file('ktp');
			$name = $ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/karyawan", $namaFileBaru);
			Karyawan::create([
				'nama' => $request->nama,
				'bagian' => $request->bagian,
				'alamat' => $request->alamat,
				'notlp' => $request->notlp,
				'ktp' => $namaFileBaru,		
			]);

			return redirect()->back()->with('karyawanadd', '-');
		}
	}

	public function updatekaryawan(Request $request)
	{
		if ($request->hasFile('ktp') && !empty($request->file('ktp'))) {
			$ambil = $request->file('ktp');
			$name = $ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/karyawan", $namaFileBaru);
			$save = DB::table('karyawan')->where('id', $request->id)->update([
				'nama' => $request->nama,
				'bagian' => $request->bagian,
				'alamat' => $request->alamat,
				'notlp' => $request->notlp,
				'ktp' => $namaFileBaru,	 		
			]);

			return redirect()->back()->with('karyawanup', '-');
		}else{
			DB::table('karyawan')->where('id', $request->id)->update([
				'nama' => $request->nama,
				'bagian' => $request->bagian,
				'alamat' => $request->alamat,
				'notlp' => $request->notlp,  		
			]);

			return redirect()->back()->with('karyawanup', '-');
		}
	}

	public function deletekaryawan($id)
	{
		DB::table('karyawan')->where('id',$id)->delete();
		return redirect()->back()->with('karyawandel','-');
	}

	public function peralatan()
	{
		$data = Peralatan::latest()->get();

		return view('page/peralatan/peralatan', ['data' => $data]);
	}

	public function add_peralatan(Request $request)
	{
		if ($request->hasFile('gambar')) {
			$ambil = $request->file('gambar');
			$name = $ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/peralatan", $namaFileBaru);
			$save = Peralatan::create([
				'nama' => $request->nama,
				'jumlah' => $request->jumlah,
				'tempat' => $request->tempat,
				'deskripsi' => $request->deskripsi,
				'gambar' => $namaFileBaru,		
			]);

			return redirect()->back()->with('peralatanadd', '-');
		}
	}

	public function update_peralatan(Request $request)
	{
		if ($request->hasFile('gambar') && !empty($request->file('ktp'))) {
			$ambil = $request->file('gambar');
			$name = $ambil->getClientOriginalName();
			$namaFileBaru = uniqid();
			$namaFileBaru .= $name;
			$ambil->move(\base_path()."/public/peralatan", $namaFileBaru);
			$save = DB::table('peralatan')->where('id', $request->id)->update([
				'nama' => $request->nama,
				'jumlah' => $request->jumlah,
				'tempat' => $request->tempat,
				'deskripsi' => $request->deskripsi,
				'gambar' => $namaFileBaru,	 		
			]);

			return redirect()->back()->with('peralatanup', '-');
		}else{
			DB::table('peralatan')->where('id', $request->id)->update([
				'nama' => $request->nama,
				'jumlah' => $request->jumlah,
				'tempat' => $request->tempat,
				'deskripsi' => $request->deskripsi,
				'gambar' => $namaFileBaru,	  		
			]);

			return redirect()->back()->with('peralatanup', '-');
		}
	}

	public function delete_peralatan($id)
	{
		DB::table('peralatan')->where('id', $id)->delete();

		return redirect()->back()->with('peralatandel', '-');
	}

	public function diskon()
	{
		$data = DB::table('diskons')->get();
		$jumlah = Diskon::count();

		return view('page/diskon/diskon', ['data' => $data, 'jumlah' => $jumlah]);
	}
	public function add_diskon(Request $request)
	{
		Diskon::create([
			'nama_diskon' => 'Member / Pelajar',
			'hargadiskon' => $request->hargadiskon,
		]);

		return redirect()->back()->with('diskonadd', '-');
	}

	public function update_diskon(Request $request)
	{
		DB::table('diskons')->where('id', $request->id)->update([
			'nama_diskon' => 'Member / Pelajar',
			'hargadiskon' => $request->hargadiskon,
		]);

		return redirect()->back()->with('diskonup', '-');
	}

	public function delete_diskon($id)
	{
		DB::table('diskons')->where('id', $id)->delete();

		return redirect()->back()->with('diskondel', '-');
	}
}
