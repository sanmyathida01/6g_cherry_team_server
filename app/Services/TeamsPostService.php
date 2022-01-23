<?php
namespace App\Services;//お約束
use App\Dao\TeamsPostDao;  //宣言
use App\Models\TbPosts;
class TeamsPostService
 {
    private $teamsPostDao;
    /**
     * Class Constructor
     *
     * @param TeamsPostDao $teamsPostDao
     * @return
     */
    public function __construct(TeamsPostDao $teamsPostDao) //ServiceからDaoにいくためには(遷移先がある場合)Constructが必要
    {
        $this->teamsPostDao = $teamsPostDao;
    }
    public function create($request)
    {
        $tbpost = new TbPosts();
        $tbpost->from_user_id = $request->from_user_id;
        $tbpost->to_user_id = $request->to_user_id;
        $tbpost->created_user_id = $request->from_user_id;
        $tbpost->content = $request->content;
        $tbpost->teams_categories_id = $request->teams_categories_id;
        return $this->teamsPostDao->create($tbpost);
    }
    public function update($request)//request:フロントから情報を取得するためのもの
    {
      $tbpost = new TbPosts();
        $tbpost->from_user_id = $request->from_user_id;
        $tbpost->to_user_id = $request->to_user_id;
        $tbpost->created_user_id = $request->from_user_id;
        $tbpost->content = $request->content;
        $tbpost->teams_categories_id = $request->teams_categories_id;
      return $this->teamsPostDao->update($request);
    }
    public function delete($request)//request:フロントから情報を取得するためのもの
    {
      return $this->teamsPostDao->delete($request);
    }
  }