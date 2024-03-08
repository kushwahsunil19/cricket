<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teamType extends Model
{
    use HasFactory;
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
    public function player()
    {
        return $this->hasMany(Players::class,'team_type_id');
    }
    // Define the inverse relationship with Log
    public function logs()
    {
        return $this->hasMany(Log::class, 'team_type_id');
    }
}
