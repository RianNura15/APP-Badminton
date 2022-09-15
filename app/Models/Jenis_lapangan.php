<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_lapangan extends Model
{
    use HasFactory;

    protected $table="jenis_lapangan";
    protected $guarded = ['id_jenis'];

    public function lapangan()
    {
        return $this->belongsTo(Nama_lapangan::class);
    }
}
