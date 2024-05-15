<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = "pembayaran";
    protected $guarded = ['id_pembayaran'];

    public function data_sewa()
    {
        return $this->belongsTo(Data_sewa::class, 'sewa_id', 'id_sewa')->join('users', 'users.id', '=', 'data_sewa.id_user')->join('nama_lapangan', 'nama_lapangan.id_lapangan', '=', 'data_sewa.lap_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function nama_lapangan()
    {
        return $this->belongsTo(Nama_lapangan::class);
    }
}
