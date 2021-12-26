<?php

use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\TeamsController;
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
 * マスタデータ取得
 */
// チームカテゴリ一覧取得
Route::get('/teams/categories', [TeamsController::class, 'getCategories'])->name('teams_categories');
// マスタユーザーロル一覧取得
Route::get('/user/roles', [UsersController::class, 'getUserRoles'])->name('user_roles');

/**
 * ユーザ
 */
Route::post('/users', [UsersController::class, 'create'])->name('users_create');
Route::get('/users', [UsersController::class, 'list'])->name('users_list');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users_update');
Route::delete('/users/{id}', [UsersController::class, 'delete'])->name('users_delete');

/**
 * 投稿一覧
 */
Route::get('/posts', [TeamsController::class, 'list'])->name('teams_list');

/**
 * 組織
 */
Route::post('/organizations', [OrganizationsController::class, 'create'])->name('organization_create');
Route::get('/organizations', [OrganizationsController::class, 'list'])->name('organization_list');
Route::put('/organizations/{id}', [OrganizationsController::class, 'update'])->name('organization_update');
Route::delete('/organizations/{id}', [OrganizationsController::class, 'delete'])->name('organization_delete');
// グループ一覧取得
Route::get('/groups', [OrganizationsController::class, 'groupList'])->name('organization_groupList');
// チーム一覧取得
Route::get('/teams', [OrganizationsController::class, 'teamList'])->name('organization_teamList');
