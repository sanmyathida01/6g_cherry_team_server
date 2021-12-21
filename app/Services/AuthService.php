<?php

namespace App\Services;

use App\Dao\TbLoginUsersDao;
use App\Models\TbLoginUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthService
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
     * ログイン
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $tbLoginUsers = new TbLoginUsers();
        $tbLoginUsers->login_user_email    = $request->login_user_email;
        $tbLoginUsers->password    = $request->password;

        $loginUserData = $this->tbLoginUsersDao->login($tbLoginUsers);

        if (!$loginUserData) {
            //ログイン失敗
            return redirect("/login")->withErrors([
                "login" => "このメールアドレスは使えません。"
            ]);
        }

        return $loginUserData;
    }

    /**
     * ユーザ削除
     *
     * @param  int  $id login_users_id
     * @return \Illuminate\Http\Response
     */
    public function logout($id)
    {
        return $this->tbLoginUsersDao->delete($id);
    }
}
