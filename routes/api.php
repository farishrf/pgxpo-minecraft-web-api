<?php

use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SearchController;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
mc.pgxpo.com/api/player/{name}   // DONE
mc.pgxpo.com/api/player/{name}/{gameName} // DONE
mc.pgxpo.com/api/leaderboard/{gameName} // DONE
mc.pgxpo.com/api/search/{name}
 */

Route::get('/', function () {
    return (new ApiResponseService())->error(400, 'Unsupported API Location.', 'INVALID_ARGUMENT');
});

Route::get('/player/{player}/{game?}', [PlayerController::class, 'show'])->where('player', "^\w{3,16}$")
    ->missing(function (Request $request) {
        return (new ApiResponseService())->error(404, 'Player not found.', 'PLAYER_NOT_FOUND');
    });

Route::get('/leaderboard/{game}/{orderby?}', [LeaderboardController::class, 'show'])->whereAlphaNumeric('game');

Route::get('/search/{name}', [SearchController::class, 'show'])->where('name', "^\w{3,16}$")
    ->missing(function (Request $request) {
        return (new ApiResponseService())->error(404, 'Player not found.', 'PLAYER_NOT_FOUND');
    });

// Route::get('/config-cache', function() {
//     $exitCode = Artisan::call('config:cache');
//     return '<h1>Clear Config cleared</h1>';
// });

Route::fallback(function () {
    return (new ApiResponseService())->error(404, 'Not Found.', 'NOT_FOUND');

});
