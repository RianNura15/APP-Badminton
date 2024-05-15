<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = "data_jadwal";
    protected $guarded = ['id_jadwal'];

    public function data_sewa()
    {
        return $this->belongsTo(Data_sewa::class, 'id_datasewa', 'id_sewa')->join('nama_lapangan','nama_lapangan.id_lapangan', '=', 'data_sewa.lap_id')->join('users', 'users.id', '=', 'data_sewa.id_user');
    }

    public function lapangan()
    {
        return $this->belongsTo(Nama_lapangan::class, 'id_lap', 'id_lapangan');
    }
}
