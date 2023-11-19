<?php

namespace App\Http\Controllers;

use App\Game\GameConstants;
use App\Services\ApiResponseService;
use App\Http\Resources\LeaderboardResource;

class LeaderboardController extends Controller
{

    public function show($game = null, $orderBy = null)
    {
        if(!array_key_exists($game, GameConstants::LEADERBOARD)){
            return (new ApiResponseService())->error(404, 'Game not supported.', 'GAME_NOT_SUPPORTED');
        }
        $chosenGame = GameConstants::LEADERBOARD[$game];
        $gameModelObject = new $chosenGame();
        if($orderBy !== null){
            if(!in_array($orderBy, $gameModelObject::POSSIBLE_ORDERBY)){
                return (new ApiResponseService())->error(404, 'Unsupported ORDERBY Type.', 'ORDER_TYPE_NOT_SUPPORTED');
            }
        }

        $gameLeaderboard = $gameModelObject->leaderboard(
            $orderBy !== null ? $orderBy
            : $gameModelObject::DEFAULT_ORDERBY
        );
        
        return LeaderboardResource::collection($gameLeaderboard, $game);
        
    }

}