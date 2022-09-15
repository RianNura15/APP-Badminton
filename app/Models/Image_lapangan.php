<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image_lapangan extends Model
{
    use HasFactory;

    protected $table="image_lapangan";
    protected $guarded = ['id_image'];
}
