<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $table = 'logs';
    protected $fillable = [
        'filename', 'menu_type_id','team_type_id','player_type_id','total_csv_row'
    ];

    // Define the relationship with MenuType
    public function menuTypeName()
    {
        return $this->belongsTo(menuType::class, 'menu_type_id');
    }

    // Define the relationship with TeamType
    public function teamTypeName()
    {
        return $this->belongsTo(teamType::class, 'team_type_id');
    }
     // Define the relationship with TeamType
    public function playerTypeName()
    {
        return $this->belongsTo(playerType::class, 'player_type_id');
    }
    
}
