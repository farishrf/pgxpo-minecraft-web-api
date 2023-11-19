<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SurvivalGames extends Model
{
    use HasFactory;
    const DEFAULT_ORDERBY = 'wins';
    const POSSIBLE_ORDERBY = ["wins", "points"];
    protected $table = 'SurvivalGames';
    
    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function leaderboard($orderBy = SELF::DEFAULT_ORDERBY){
        return self::orderBy($orderBy, 'desc')->take(10)->get();
    }

}