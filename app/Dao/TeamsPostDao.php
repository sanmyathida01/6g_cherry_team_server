<?php

namespace App\Dao;

//投稿登録
class TeamsPostDao
{
    public function create(Request $request)　//request:フロントから情報を取得するためのもの、遷移先が無ければconstructは要らない
    {
        //returnの後ろはModelの名前
        return Tbposts::create([
            //テーブル定義書のカラム名通りに作る(インクリメントでできるものとかはここに書く必要はない)
			'from_user_id' => $request->from_user_id 　//DBのカラム名＝＞画面入力されたリクエストの中から
            'to_user_id'=> $request->to_user_id
            'teams_categories_id'=> $request->teams_categories_id
            'content'=> $request->content
            'created_user_id'=> $request->from_user_id　//from_user_idと同じになるのでこう書く
            'created_datetime'=> date("Y-m-d h:i:s") //現在時刻を取得
            //正しいとTrueを返す

        ]);

    }

  
}
//投稿編集
class TeamsEditDao
{
    public function update(Request $request)　//request:フロントから情報を取得するためのもの、遷移先が無ければconstructは要らない
    {
        //returnの後ろはModelの名前
        return Tbposts::update([
            //テーブル定義書のカラム名通りに作る
			'updated_user_id' => $request->updated_user_id 　//DBのカラム名＝＞画面入力されたリクエストの中から
            'update_datetime'=> date("Y-m-d h:i:s") //更新時刻を取得
            //正しいとTrueを返す

        ]);

    }

  
}
//投稿削除
class TeamsDeleteDao
{
    public function delete(Request $request)　//request:フロントから情報を取得するためのもの、遷移先が無ければconstructは要らない
    {
        //returnの後ろはModelの名前
        return Tbposts::delete([
            //テーブル定義書のカラム名通りに作る(インクリメントでできるものとかはここに書く必要はない)
			'del_flg' => $request->del_flg 　//DBのカラム名＝＞画面入力されたリクエストの中から
            //正しいとTrueを返す

        ]);

    }
  
}