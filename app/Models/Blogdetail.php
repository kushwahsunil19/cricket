<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogdetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description','date','content','tag','category','image','slug','tableContent'
    ];
    protected $dates = ['created_at', 'updated_at'];
}
