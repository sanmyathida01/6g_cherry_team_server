<?php

namespace App\Services;

use App\Dao\TbPostsDao;
use App\Models\TbPosts;
use Illuminate\Http\Request;

class TeamsService
{
    private $tbPostsDao;

    /**
     * Class Constructor
     *
     * @param TeamsDao $teamsDao
     */
    public function __construct(TbPostsDao $tbPostsDao)
    {
        $this->tbPostsDao = $tbPostsDao;
    }

    /**
     * 投稿一覧
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $tbPosts = new TbPosts();
        $tbPosts->limit = $request->limit;
        $tbPosts->page = $request->page;
        return $this->tbPostsDao->list($tbPosts);
    }
}
