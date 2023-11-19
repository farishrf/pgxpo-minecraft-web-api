<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Game\GameConstants;
use App\Services\ApiResponseService;
use App\Http\Resources\PlayerResource;

class PlayerController extends Controller
{
 
    public function show(Player $player, $game = null)
    {
        $gameRelationShip = null;
        if (!empty($game)) {
            if(!array_key_exists($game, GameConstants::GAMES)){
                return (new ApiResponseService())->error(404, "Game not supported.", "GAME_NOT_SUPPORTED");
            }
            $player->load(GameConstants::GAMES[$game]);
            $gameRelationShip = $game;
        }
        return (PlayerResource::make($player))
        ->additional([
            'relationshipPassed'=> $gameRelationShip
        ]);
        
    }

}
