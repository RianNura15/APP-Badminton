<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PB extends Model
{
    use HasFactory;

    protected $table = "data_pb";
    protected $guarded = ['id_pb'];
}
