<?php

use App\Http\Controllers\UsersController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * ユーザ
 */
Route::post('/users', [UsersController::class, 'create'])->name('users_create');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users_update');
Route::delete('/users/{id}', [UsersController::class, 'delete'])->name('users_delete');

/**
 * Teams
 */
// Route::get('/posts', [TeamsPostsController::class, 'list'])->name('teams.posts.list');
