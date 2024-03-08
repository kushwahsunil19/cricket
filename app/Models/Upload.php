<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $table = 'uploads';
    protected $fillable = [
        'name', 'path','extension','caption','hash','public','user_id'
    ];
}
