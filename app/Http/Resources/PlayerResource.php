<?php

namespace App\Http\Resources;

use App\Game\GameConstants;
use App\Http\Resources\OneVsOneResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PlayerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        $arrayData = [
            'uuid' => $this->UUID,
            'name' => $this->playerName,
            'tokens' => $this->tokens,
            'luckyCrates' => $this->luckyCrates,
            'memberSince' => $this->memberSince,
            'color' => '#FA474B'
        ];
        if(isset($this->additional['relationshipPassed'])) {
            $arrayData['games'] = [];
        }
        if(isset($this->additional['relationshipPassed']) && $this->additional['relationshipPassed'] !== null){
            foreach(GameConstants::GAMES_RESOURCES as $resourceName => $resourceClass){
                if ($this->relationLoaded($resourceName)){
                    $gameResource = new $resourceClass($this->$resourceName ?? $resourceClass::default());
                    $arrayData['games'] = $gameResource;
                }
            }
        }

        return $arrayData;
    }
}
