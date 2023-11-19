<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PvP extends Model
{
    use HasFactory;
    const DEFAULT_ORDERBY = 'points';
    const POSSIBLE_ORDERBY = ["points", "kills"];
    protected $table = 'PvP';

    public function player(){
        return $this->belongsTo(Player::class);
    }

    public function leaderboard($orderBy = SELF::DEFAULT_ORDERBY){
        return self::orderBy($orderBy, 'desc')->take(10)->get();
    }
}
