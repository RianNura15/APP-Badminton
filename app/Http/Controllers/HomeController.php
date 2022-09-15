<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Image;
use App\Models\Data_sewa;
use App\Models\Datauser;
use App\Models\Diskon;
use App\Models\Image_lapangan;
use App\Models\Jenis_lapangan;
use App\Models\PB;
use App\Models\Jadwal;
use App\Models\Nama_lapagan;
use App\Models\Payment;
use App\Models\Pembayaran;
use App\Models\Peralatan;
use App\Models\Profil;

class HomeController extends Controller
{
  public function loginmember()
  {
   return view('loginmember');
 }
 public function cekloginmember(Request $request)
 {
   if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])) {
    if (Auth::user()->status_user!=="Aktif") {
     Auth::logout();
     return redirect('loginmember')->with('non-aktif','-');
   }else{
    if (Auth::user()->level=="Member") {
      return redirect('/')->with('loginmember','-');
    }else{
      return redirect('/')->with('loginmember','-');                    
    }
  }
}else{
  return redirect()->back()->with('salah','-');
}
}
public function registermember()
{
 return view('registermember');
}
public function addregmember(Request $request)
{
 $cek=DB::table('users')->where('email', $request->email)->first();
 if ($cek) {
  return redirect()->back()->with('sama','-');
}else{
  $users = new User();
  $users -> name = $request -> name;
  $users -> email = $request -> email;
  $users -> password = Hash::make($request -> password);
  $users -> level = 'Member';
  $users -> status_user = 'Aktif';
  $users -> save();
  DB::table('datauser')->insert([
    'user_id'=>$users->id,
    'username' => $users->username,
  ]);;
  return redirect()->back()->with('regismember','-');
}
}
public function home()
{
  $pending=Data_sewa::where('keterangan','Sedang di Cek')->count();
  $aktif=Data_sewa::where('keterangan','Aktif')->count();
  $lapangan=DB::table('nama_lapangan')->count();
  $pb=PB::count();
  $sewa=Pembayaran::count();
  $data=Jadwal::with('data_sewa')->where('keterangan','Aktif')->orWhere('keterangan','Mulai')->latest()->get();
  return view('page/home/index',['pending'=>$pending,'lapangan'=>$lapangan,'aktif'=>$aktif,'data'=>$data,'sewa'=>$sewa,'pb'=>$pb]);
}

public function logoutmember(){
      Auth::logout();
      request()->session()->invalidate();
      request()->session()->regenerateToken();
      return redirect('/');
    }
}
