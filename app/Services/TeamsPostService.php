<?php

namespace App\Services;　//お約束
use App\Dao\TeamsPostDao;　//宣言


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

    public function create(Request $request)　//request:フロントから情報を取得するためのもの
    {
      return $this->teamsPostDao->create($request);
    }

    public function update(Request $request)　//request:フロントから情報を取得するためのもの
    {
      return $this->teamsPostDao->update($request);
    }

    public function delete(Request $request)　//request:フロントから情報を取得するためのもの
    {
      return $this->teamsPostDao->delete($request);
    }
      
}   