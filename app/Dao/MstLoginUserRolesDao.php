<?php

namespace App\Dao;

use App\Models\MstLoginUserRoles;

class MstLoginUserRolesDao
{
    /**
     * マスタユーザーロル一覧取得
     *
     * @return App\Models\MstLoginUserRoles
     */
    public function getUserRoles()
    {
        return MstLoginUserRoles::where('del_flg', '=', 0)->get();
    }
}
