<?php

namespace App\Services;

use App\Dao\TbLoginUsersDao;
use App\Models\TbLoginUsers;
use Illuminate\Http\Request;

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
        return $this->tbLoginUsersDao->create($tbLoginUsers);
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
