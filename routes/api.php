<?php

use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('users/location', function (Request $request) {
    $longitude = $request->longitude;
    $latitude = $request->latitude;

    $request->user()->update([
        'user_log' => compact('longitude', 'latitude'),
    ]);

    // return response()->json([
    //     'message' => 'asdasd'
    // ]);
});
