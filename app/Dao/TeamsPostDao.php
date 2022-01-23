<?php

namespace App\Dao;

use Illuminate\Http\Request;
use App\Models\TbPosts;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TeamsPostDao
{
    //投稿登録
    public function create(TbPosts $tbpost) //request:フロントから情報を取得するためのもの、遷移先が無ければconstructは要らない
    {
        //DB連携
        DB::beginTransaction();

        //エラー処理
        $data = null;
        try {
            info($tbpost);
            $data = TbPosts::create([

                //テーブル定義書のカラム名通りに作る(インクリメントでできるものとかはここに書く必要はない)
                'from_user_id' => $tbpost->from_user_id, //DBのカラム名＝＞画面入力されたリクエストの中から
                'to_user_id' => $tbpost->to_user_id,
                'teams_categories_id' => $tbpost->teams_categories_id,
                'content' => $tbpost->content,
                'created_user_id' => $tbpost->from_user_id, //from_user_idと同じになるのでこう書く
                'created_datetime' => date("Y-m-d h:i:s"), //現在時刻を取得
                //正しいとTrueを返す
                //returnの後ろはModelの名前
            ]);

            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            Log::error($ex);
        }
        return $data;
    }
    //投稿編集
    public function update(Request $request) //request:フロントから情報を取得するためのもの、遷移先が無ければconstructは要らない
    {
        //DB連携
        DB::beginTransaction();

        //エラー処理
        $data = null;
        // try {
        //     $data = Tbposts::update([
        //         'updated_user_id' => $request->updated_user_id, //DBのカラム名＝＞画面入力されたリクエストの中から
        //         'update_datetime' => date("Y-m-d h:i:s"), //更新時刻を取得
        //     ]);
        //     DB::commit();
        // } catch (Exception $ex) {
        //     DB::rollback();
        //     Log::error($ex);
        // }
        return $data;
    }
    //投稿削除    
    public function delete(Request $request) //request:フロントから情報を取得するためのもの、遷移先が無ければconstructは要らない
    {
        //DB連携
        DB::beginTransaction();

        //エラー処理
        $data = null;
        // try {
        //     $data = Tbposts::delete([
        //         'del_flg' => $request->del_flg //DBのカラム名＝＞画面入力されたリクエストの中から
        //     ]);
        //     DB::commit();
        // } catch (Exception $ex) {
        //     DB::rollback();
        //     Log::error($ex);
        // }
        return $data;
    }
}
