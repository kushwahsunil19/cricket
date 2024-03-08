<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    use HasFactory;
    protected $table = 'players';
    protected $fillable = [
        'ranking', 'player_id','player_image_link','player','team_flag_link','team','player_type_id','team_type_id','points','ref','player_ref','team_ref','matches','menu_type_id','year','month','format','category','filename'
    ];
    public function typeP()
    {
        return $this->belongsTo(playerType::class,'player_type_id');
    }
    public function typeT()
    {
        return $this->belongsTo(teamType::class,'team_type_id');
    }
    public function menuT(){
        
         return $this->belongsTo(menuType::class,'menu_type_id');
    }
    public function Ttype(){
    	
    	 return $this->hasMany(teamType::class,'team_type_id');
    }
}
