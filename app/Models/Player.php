<?php

namespace App\Models;

use App\Models\PvP;
use App\Models\SurvivalGames;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/* 
    System table for player basic data.
*/

class Player extends Model
{
    use HasFactory;

    protected $table = 'System';

    public function getRouteKeyName()
    {
        return 'playerName';
    }

    /*
        Relationships.
    */

    public function oneVsOne(){
        return $this->hasOne(OneVsOne::class, "UUID", "UUID");
    }
    
    public function survivalgames(){
        return $this->hasOne(SurvivalGames::class, "UUID", "UUID");
    }

    public function pvp(){
        return $this->hasOne(PvP::class, "UUID", "UUID");
    }

    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @param  string|null  $field
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value, $field = null)
    {
        return Cache::remember('player:'.$value, 300, function () use ($value) {
            return $this->select('UUID', 'playerName', 'memberSince', 'tokens', 'luckyCrates')->where('playerName', $value)->firstOrFail();
        });
    }
}
