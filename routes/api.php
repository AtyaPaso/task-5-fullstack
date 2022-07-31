<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\UserAuthController;

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




Route::prefix('v1')->group(function () {
    //Authentication
    Route::post('/register', [UserAuthController::class, 'register']);
    Route::post('/login', [UserAuthController::class, 'login']);

    //Articles
    Route::post('/articles/create', [ArticlesController::class, 'create']);
    Route::get('/articles/all', [ArticlesController::class, 'all']);
    Route::get('/articles/detail/{articlesId}', [ArticlesController::class, 'detail']);
    Route::post('/articles/update', [ArticlesController::class, 'update']);
    Route::post('/articles/delete', [ArticlesController::class, 'delete']);

});


Route::get('/api/v1/getAllArticles', function () {
    return view('welcome');
});

