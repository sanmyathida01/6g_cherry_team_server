<?php

namespace App\Dao;

use App\Models\TbLoginUsers;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TbLoginUsersDao
{
    /**
     * ユーザ登録
     *
     * @param  App\Models\TbLoginUsers $tbLoginUsers
     * @return \Illuminate\Http\Response
     */
    public function create(TbLoginUsers $tbLoginUsers)
    {
        DB::beginTransaction();
        $data = null;
        try {
            $password = $this->generatePassword();
            $data = TbLoginUsers::create([
                'login_user_email' => $tbLoginUsers->login_user_email,
                'password' => Hash::make($password),
                'first_name' => $tbLoginUsers->first_name,
                'last_name' => $tbLoginUsers->last_name,
                'login_user_roles_id' => $tbLoginUsers->login_user_roles_id,
                'organization_id' => $tbLoginUsers->organization_id,
                'del_flg' => false,
            ]);
            $data->password = $password;
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
        }
        return $data;
    }

    /**
     * パスワードの自動生成
     *
     * @param int $len
     * @return $password password
     */
    private function generatePassword($len = 8)
    {
        return substr(str_shuffle(config('constant.PWD_CHAR')), 0, $len);
    }

    /**
     * ユーザー編集
     *
     * @param  App\Models\TbLoginUsers $tbLoginUsers
     * @return \Illuminate\Http\Response
     */
    public function update(TbLoginUsers $tbLoginUsers)
    {
        DB::beginTransaction();

        try {
            $data = TbLoginUsers::find($tbLoginUsers->login_users_id);
            if ($data) {
                $data->update([
                    'login_user_email' => $tbLoginUsers->login_user_email,
                    'first_name' => $tbLoginUsers->first_name,
                    'last_name' => $tbLoginUsers->last_name,
                    'login_user_roles_id' => $tbLoginUsers->login_user_roles_id,
                    'organization_id' => $tbLoginUsers->organization_id,
                    'updated_user_id' => $tbLoginUsers->login_users_id,
                    'updated_datetime' => now(),
                ]);
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            Log::error($ex);
        }
        return ($data) ? true : false;
    }

    /**
     * ユーザ削除
     *
     * @param  int  $id login_users_id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $data = TbLoginUsers::find($id);
            if ($data) {
                $data->del_flg = 1;
                $data->updated_datetime = now();
                $data->save();
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            Log::error($ex);
        }
        return ($data) ? true : false;
    }
}
