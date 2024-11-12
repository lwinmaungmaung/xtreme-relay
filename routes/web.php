<?php

use App\Http\Controllers\XtremeUIController;
use Illuminate\Support\Facades\Route;

Route::get('get.php',[XtremeUIController::class,'get']);
Route::get('player_api.php',[XtremeUIController::class,'player_api']);
Route::get('play/{slug}/{type?}',[XtremeUIController::class,'play']);
