<?php

namespace App\Dao;

use App\Models\TbPosts;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TbPostsDao
{
    /**
     * 投稿一覧
     *
     * @param  App\Models\TbPosts $tbPosts
     * @return \Illuminate\Http\Response
     */
    public function list(TbPosts $tbPosts)
    {
        DB::beginTransaction();
        try {
            $dataList = TbPosts::join('mst_teams_categories', 'tb_posts.team_categories_id', '=', 'mst_teams_categories.teams_categories_id');

            $dataList = $dataList->join('tb_login_users as from_user', 'tb_posts.from_user_id', '=', 'from_user.login_users_id');

            $dataList = $dataList->join('tb_login_users as to_user', 'tb_posts.to_user_id', '=', 'to_user.login_users_id');

            $dataList = $dataList->select([
                'tb_posts.posts_id',
                'tb_posts.from_user_id',
                'tb_posts.to_user_id',
                'tb_posts.team_categories_id',
                'tb_posts.content',
                'mst_teams_categories.teams_categories_name',
                'from_user.first_name as from_user_first_name',
                'from_user.last_name as from_user_last_name',
                'to_user.first_name as to_user_first_name',
                'to_user.last_name as to_user_last_name',
            ]);

            $dataList = $dataList->orderBy('tb_posts.posts_id');
            $dataList = $dataList->where('tb_posts.del_flg', '=', 0);
            if (!is_null($tbPosts->limit)) {
                $dataList = $dataList->paginate($tbPosts->limit, ['*'], 'Page', $tbPosts->page);
            } else {
                $dataList = $dataList->get();
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
        }
        return $dataList;
    }
}
