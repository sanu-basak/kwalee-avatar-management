<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/get-category-with-items','API\DressUpController@categoryWithItems');
Route::get('/get-current-avatar-user-state','API\DressUpController@currentUserAvatarState');
Route::post('/buy-item','API\DressUpController@buyItem');
Route::post('/dress-up-avatar','API\DressUpController@dressUpAvatar');



