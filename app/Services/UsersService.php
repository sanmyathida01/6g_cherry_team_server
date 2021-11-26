<?php

namespace App\Services;

use App\Dao\TbLoginUsersDao;
use App\Models\TbLoginUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UsersService
{
    private $tbLoginUsersDao;

    /**
     * Class Constructor
     *
     * @param TeamsDao $teamsDao
     */
    public function __construct(TbLoginUsersDao $tbLoginUsersDao)
    {
        $this->tbLoginUsersDao = $tbLoginUsersDao;
    }

    /**
     * ユーザ登録
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
     * ユーザー編集
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id login_users_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
