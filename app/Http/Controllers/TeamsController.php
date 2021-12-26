<?php

namespace App\Http\Controllers;

use App\Services\TeamsService;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    private $teamsService;

    /**
     * Class Constructor
     *
     * @param TeamsService $teamsService
     */
    public function __construct(TeamsService $teamsService)
    {
        $this->teamsService = $teamsService;
    }

    /**
     * チームカテゴリ一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function getCategories()
    {
        return $this->teamsService->getCategories();
    }

    /**
     * 投稿一覧
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        return $this->teamsService->list($request);
    }
}
