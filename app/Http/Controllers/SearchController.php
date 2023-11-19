<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlayerResource;
use App\Models\Player;
use App\Services\ApiResponseService;

class SearchController extends Controller
{
 
    public function show($name = null){
        $searchResults = Player::like('playerName', $name)->take(10)->get();
        if($searchResults->isEmpty()){
            return (new ApiResponseService())->error(404, "There is no player that matches this name", "PLAYER_SEARCH_NOT_FOUND");
        }
        return PlayerResource::collection($searchResults);
    }

}
