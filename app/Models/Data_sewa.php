<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_sewa extends Model
{
    use HasFactory;

    protected $table = "data_sewa";
    protected $guarded = ['id_sewa'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id')->join('datauser', 'datauser.user_id', '=', 'users.id');
    }

    public function nama_lapangan()
    {
        return $this->belongsTo(Nama_lapangan::class, 'lap_id', 'id_lapangan')->join('jenis_lapangan','nama_lapangan.jenis_id', '=', 'jenis_lapangan.id_jenis');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'sewa_id', 'id_pembayaran');
    }

    public function datauser()
    {
        return $this->belongsTo(Datauser::class, 'id_user', 'user_id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment', 'id_payment');
    }

    public function data_jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_sewa', 'id_datasewa');
    }
}
