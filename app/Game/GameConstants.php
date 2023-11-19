<?php
namespace App\Game;

use App\Models\PvP;
use App\Models\OneVsOne;
use App\Models\SurvivalGames;
use App\Http\Resources\PvPResource;
use App\Http\Resources\OneVsOneResource;
use App\Http\Resources\SurvivalGamesResource;

class GameConstants {
    const LEADERBOARD = [
        "sg" => SurvivalGames::class,
        'pvp' => PvP::class,
        'onevsone' => OneVsOne::class
    ];
    const GAMES = [
        "onevsone" => "oneVsOne",
        "sg" => "survivalgames",
        "pvp" => "pvp"
    ];

    const GAMES_RESOURCES = [
        'oneVsOne' => OneVsOneResource::class,
        'survivalgames' => SurvivalGamesResource::class,
        'pvp' => PvPResource::class
    ];
    
}
?>