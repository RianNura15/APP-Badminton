<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    use HasFactory;

    protected $table = "jam";

    protected $guarded = ['id_jam'];

    public function nama_lapangan()
    {
        return $this->belongsTo(Nama_lapangan::class, 'lapangan_id', 'id_lapangan');
    }
}
