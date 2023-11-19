<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OneVsOne extends Model
{
    use HasFactory;
    const DEFAULT_ORDERBY = 'wins';
    const POSSIBLE_ORDERBY = ["wins", "unrankedwins"];
    protected $table = '1vs1';

    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function leaderboard($orderBy = SELF::DEFAULT_ORDERBY){
        return self::orderBy($orderBy, 'desc')->take(10)->get();
    }
}
