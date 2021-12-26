<?php

namespace App\Services;

use App\Dao\MstLoginUserRolesDao;
use App\Dao\TbLoginUsersDao;
use App\Models\TbLoginUsers;
use Illuminate\Support\Facades\Mail;

class UsersService
{
    private $tbLoginUsersDao;
    private $mstLoginUserRoleDao;

    /**
     * Class Constructor
     *
     * @param TeamsDao $teamsDao
     */
    public function __construct(TbLoginUsersDao $tbLoginUsersDao, MstLoginUserRolesDao $mstLoginUserRoleDao)
    {
        $this->tbLoginUsersDao = $tbLoginUsersDao;
        $this->mstLoginUserRoleDao = $mstLoginUserRoleDao;
    }

    /**
     * マスタユーザーロル一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserRoles()
    {
        return $this->mstLoginUserRoleDao->getUserRoles();
    }

    /**
     * ユーザ登録
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create($request)
    {
        $tbLoginUsers = new TbLoginUsers();
        $tbLoginUsers->login_user_email    = $request->login_user_email;
        $tbLoginUsers->first_name 			   = $request->first_name;
        $tbLoginUsers->last_name 					 = $request->last_name;
        $tbLoginUsers->login_user_roles_id = $request->login_user_roles_id;
        $tbLoginUsers->organization_id		 = $request->organization_id;

        $loginUserData = $this->tbLoginUsersDao->create($tbLoginUsers);

        $data = [];
        if ($tbLoginUsers) {
            $data = [
                'hostName' => url('/'),
                'pathURL' => 'change_password',
                'password' => $loginUserData->password,
                'loginUserId' => encrypt($loginUserData->login_users_id)
            ];
            // メール送信
            Mail::to($loginUserData->login_user_email)->send(new \App\Mail\VerifyMail($data));
        }

        return (count($data) > 0) ? true : false;
    }

    /**
     * ユーザ一覧
     *
     * @param  App\Http\Requests\UserCreateForm  $request
     * @return \Illuminate\Http\Response
     */
    public function list($request)
    {
        $tbLoginUsers = new TbLoginUsers();
        $tbLoginUsers->limit = config('constant.LIMIT');
        $tbLoginUsers->page = $request->page;
        return $this->tbLoginUsersDao->list($tbLoginUsers);
    }

    /**
     * ユーザー編集
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id login_users_id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $tbLoginUsers = new TbLoginUsers();
        $tbLoginUsers->login_users_id      = $id;
        $tbLoginUsers->login_user_email    = $request->login_user_email;
        $tbLoginUsers->first_name 			   = $request->first_name;
        $tbLoginUsers->last_name 					 = $request->last_name;
        $tbLoginUsers->login_user_roles_id = $request->login_user_roles_id;
        $tbLoginUsers->organization_id		 = $request->organization_id;
        return $this->tbLoginUsersDao->update($tbLoginUsers);
    }

    /**
     * ユーザ削除
     *
     * @param  int  $id login_users_id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->tbLoginUsersDao->delete($id);
    }
}
