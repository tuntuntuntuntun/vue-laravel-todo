<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', [ToDoController::class, 'index']);
Route::post('/', [ToDoController::class, 'store']);
Route::get('/{todo}', [ToDoController::class, 'show']);
Route::put('/{todo}', [ToDoController::class, 'update']);
Route::delete('/{todo}', [ToDoController::class, 'destroy']);