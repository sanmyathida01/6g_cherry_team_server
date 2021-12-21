<?php

use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\TeamsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
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
 * ログイン
 */
Route::post('/login',[AuthController::class, 'login'])->name('login');
/**
 * ログアウト
 */
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
/**
 * ユーザ
 */
Route::post('/users', [UsersController::class, 'create'])->name('users_create');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users_update');
Route::delete('/users/{id}', [UsersController::class, 'delete'])->name('users_delete');

/**
 * 投稿一覧
 */
Route::get('/posts', [TeamsController::class, 'list'])->name('teams_list');

/**
 * 組織
 */
Route::post('/organizations', [OrganizationsController::class, 'create'])->name('teams_list');
