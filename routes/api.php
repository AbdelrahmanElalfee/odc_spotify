<?php

use App\Http\Controllers\ArtistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MusicController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('refresh', [AuthController::class, 'refresh']);
    Route::get('me', [AuthController::class, 'me']);
});

Route::group([
    'prefix' => 'music'
], function ($router) {
    Route::post('add', [MusicController::class, 'addMusic']);
    Route::get('', [MusicController::class, 'allMusic']);
    Route::post('edit/{id}', [MusicController::class, 'editMusic']);
    Route::get('{id}', [MusicController::class, 'showMusic']);
    Route::delete('delete/{id}', [MusicController::class, 'deleteMusic']);
    Route::get('artist/{id}', [MusicController::class, 'artistMusic']);
});
Route::group([
    'prefix' => 'artist'
], function ($router) {
    Route::post('add', [ArtistController::class, 'addArtist']);
    Route::get('', [ArtistController::class, 'allArtist']);
    Route::post('edit/{id}', [ArtistController::class, 'editArtist']);
    Route::get('/{id}', [ArtistController::class, 'showArtist']);
    Route::delete('delete/{id}', [ArtistController::class, 'deleteArtist']);
});
