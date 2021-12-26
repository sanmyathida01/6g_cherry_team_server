<?php

namespace App\Dao;

use App\Models\MstTeamsCategories;

class MstTeamsCategoriesDao
{
    /**
     * チームカテゴリ一覧取得
     *
     * @return App\Models\MstLoginUserRoles
     */
    public function getCategories()
    {
        return MstTeamsCategories::all();
    }
}
