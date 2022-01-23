<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamsPostController;

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

/*Teams投稿登録*/
Route::post('/posts', [TeamsPostController::class, 'create'])->name('posts.create');

//Teams投稿編集
Route::put('/posts', [TeamsPostController::class, 'update'])->name('posts.update');

//Teams投稿削除
Route::delete('/posts', [TeamsPostController::class, 'delete'])->name('posts.delete');
