<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateForm;
use App\Http\Requests\UserUpdateForm;
use App\Services\UsersService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $usersService;

    /**
     * Class Constructor
     *
     * @param UsersService $usersService
     */
    public function __construct(UsersService $usersService)
    {
        $this->usersService = $usersService;
    }

    /**
     * マスタユーザーロル一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserRoles()
    {
        return $this->usersService->getUserRoles();
    }

    /**
     * ユーザ登録
     *
     * @param  App\Http\Requests\UserCreateForm  $request
     * @return \Illuminate\Http\Response
     */
    public function create(UserCreateForm $request)
    {
        return $this->usersService->create($request);
    }

    /**
     * ユーザ一覧
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        return $this->usersService->list($request);
    }

    /**
     * ユーザー編集
     *
     * @param  App\Http\Requests\UserUpdateForm  $request
     * @param int $id login_users_id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateForm $request, $id)
    {
        return $this->usersService->update($request, $id);
    }

    /**
     * ユーザ削除
     *
     * @param  int  $id login_users_id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->usersService->delete($id);
    }
}
