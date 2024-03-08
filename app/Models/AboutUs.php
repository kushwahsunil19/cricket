<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'aboutus'; // Set the table name if it's different from the default
    protected $fillable = ['aboutUsContent']; // Specify the fillable fields in the table
}
