<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datauser extends Model
{
    use HasFactory;

    protected $table = "datauser";
    protected $guarded = ['id_datauser'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
