<?php

namespace App\Http\Controllers;//ここまではお約束で書くもの


//ここら辺で使うものの宣言してる
use App\Services\TeamsPostService;
use Illuminate\Http\Request;

use App\Http\Requests\TeamsPostForm;

class TeamsPostController extends Controller
{
    private $teamsPostService;

    /**
     * Class Constructor
     *
     * @param TeamsPostService $teamsPostService
     * @return
     */
    public function __construct(TeamsPostService $teamsPostService) //これがないと他のファイルに移動できない
    {
        $this->teamsPostService = $teamsPostService;
    }
    //createの機能
    public function create(TeamsPostForm $request)//request:フロントから情報を取得するためのもの
    {
      return $this->teamsPostService->create($request); //コントローラーからサービスに情報を渡すためのもの
  
    }
    //updateの機能
    public function update(TeamsPostForm $request)//request:フロントから情報を取得するためのもの
    {
      return $this->teamsPostService->update($request); //コントローラーからサービスに情報を渡すためのもの
  
    }
    //deleteの機能
    public function delete(Request $request)//request:フロントから情報を取得するためのもの
    {
      return $this->teamsPostService->delete($request); //コントローラーからサービスに情報を渡すためのもの
  
    }

}
