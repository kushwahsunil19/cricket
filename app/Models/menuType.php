<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menuType extends Model
{
    use HasFactory;
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
    public function player()
    {
        return $this->hasMany(Players::class,'menu_type_id');
    }
    public function logs()
    {
        return $this->hasMany(Log::class, 'menu_type_id');
    }
}
