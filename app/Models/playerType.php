<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playerType extends Model
{
    use HasFactory;
    public function playerType()
    {
        return $this->hasMany(playerType::class,'player_type_id');
    }
}
