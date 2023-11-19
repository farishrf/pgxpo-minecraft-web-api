<?php

namespace App\Http\Resources;

use App\Http\Resources\DefaultInterface;
use Illuminate\Http\Resources\Json\JsonResource;

class SurvivalGamesResource extends JsonResource implements DefaultInterface
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function default(){
        return [];
    }

    public function toArray($request)
    {
        return [
            'sg' => [
                'crates' => $this->crates ?? 0,
                'games_played' => $this->games_played ?? 0,
                'wins' => $this->wins ?? 0,
                'points' => $this->points ?? 0,
                'kills' => $this->kills ?? 0,
                'deaths' => $this->deaths ?? 0,
                'deathmatches' => $this->deathmatches ?? 0,
            ]
        ];
    }
}
