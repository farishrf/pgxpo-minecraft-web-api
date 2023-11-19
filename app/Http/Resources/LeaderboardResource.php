<?php

namespace App\Http\Resources;

use App\Models\PvP;
use App\Models\OneVsOne;
use App\Game\GameConstants;
use App\Models\SurvivalGames;
use Illuminate\Http\Resources\Json\JsonResource;

class LeaderboardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function sg(){
        return [
            'playerName' => $this->playerName,
            'UUID' => $this->UUID,
            'wins' => $this->wins,
            'points' => $this->points,
            'kills' => $this->kills,
            'deaths' => $this->deaths,
            'crates' => $this->crates,
            'deathmatches' => $this->deathmatches,

        ];
    }

    public function pvp(){
        return [
            'playerName' => $this->playerName,
            'UUID' => $this->UUID,
            'points' => $this->points,
            'kills' => $this->kills,
            'deaths' => $this->deaths,
            'shards' => $this->shards
        ];
    }

    public function onevsone(){
        return [
            'playerName' => $this->playerName,
            'UUID' => $this->UUID,
            'wins' => $this->wins,
            'loses' => $this->loses,
            'unrankedwins' => $this->unrankedwins
        ];  
    }

    public function toArray($request)
    {
        foreach(GameConstants::LEADERBOARD as $gameName => $gameModel){
            if($this->resource instanceof $gameModel){
                return $this->$gameName();
            }
        }
        
        // if($this->resource instanceof SurvivalGames){
        //     return $this->survivalGames();
        // } else if($this->resource instanceof OneVsOne){
        //     return $this->oneVsOne();
        // } else if($this->resource instanceof PvP){
        //     return $this->pvp();
        // }

    }
}
