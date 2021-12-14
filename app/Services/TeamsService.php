<?php

namespace App\Services;

use App\Dao\MstTeamsCategoriesDao;
use App\Dao\TbPostsDao;
use App\Models\TbPosts;

class TeamsService
{
    private $tbPostsDao;
    private $mstTeamsCategoriesDao;

    /**
     * Class Constructor
     *
     * @param TeamsDao $teamsDao、MstTeamsCategoriesDao $mstTeamsCategoriesDao
     */
    public function __construct(TbPostsDao $tbPostsDao, MstTeamsCategoriesDao $mstTeamsCategoriesDao)
    {
        $this->tbPostsDao = $tbPostsDao;
        $this->mstTeamsCategoriesDao = $mstTeamsCategoriesDao;
    }

    /**
     * チームカテゴリ一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        return $this->mstTeamsCategoriesDao->getCategories();
    }

    /**
     * 投稿一覧
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list($request)
    {
        $tbPosts = new TbPosts();
        $tbPosts->limit = $request->limit;
        $tbPosts->page = $request->page;
        return $this->tbPostsDao->list($tbPosts);
    }
}
