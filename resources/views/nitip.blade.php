$data=DB::table('data_sewa')->join('nama_lapangan','data_sewa.lap_id','=','nama_lapangan.id_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id','=','jenis_lapangan.id_jenis')->join('diskons','data_sewa.diskon_id','=','diskons.id')->join('payment','data_sewa.id_payment','=','payment.id_payment')->where('data_sewa.id_user',Auth::user()->id)->get();

$dis=floor($dt->hargadiskon);