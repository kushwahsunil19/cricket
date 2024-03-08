<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';
    protected $fillable = [
        'ranking', 'team_flag_link','team','points','matches','type_id','menu_type_id','ref','team_ref','year','month','format','filename'
    ];
    public function type()
    {
        return $this->belongsTo(teamType::class,'type_id');
    }

    public function menutype()
    {
        return $this->belongsTo(menuType::class,'menu_type_id');
    }
}
