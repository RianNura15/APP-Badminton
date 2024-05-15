<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nama_lapangan extends Model
{
    use HasFactory;

    protected $table = "nama_lapangan";
    protected $guarded = ['id_lapangan'];

    public function jenis_lapangan()
    {
        return $this->belongsTo(Jenis_lapangan::class, 'jenis_id', 'id_lapangan');
    }

    public function data_sewa()
    {
        return $this->hasMany(Data_sewa::class, 'lap_id', 'id_lapangan');
    }

    public function data_jadwal()
    {
        return $this->hasMany(Jadwal::class, 'id_lap', 'id_lapangan');
    }
    
    public function jam()
    {
        return $this->belongsTo(Jam::class, 'lapangan_id', 'id_lapangan');
    }
}
