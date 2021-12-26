<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationCreateForm;
use App\Http\Requests\OrganizationUpdateForm;
use App\Services\OrganizationsService;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
{
    private $organizationsService;

    /**
     * Class Constructor
     *
     * @param OrganizationsService $organizationsService
     */
    public function __construct(OrganizationsService $organizationsService)
    {
        $this->organizationsService = $organizationsService;
    }

    /**
     * 組織登録
     *
     * @param App\Http\Requests\OrganizationCreateForm  $request
     * @return \Illuminate\Http\Response
     */
    public function create(OrganizationCreateForm $request)
    {
        return $this->organizationsService->create($request);
    }

    /**
     * 組織一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        return $this->organizationsService->list($request);
    }

    /**
     * 組織編集
     *
     * @param  App\Http\Requests\OrganizationUpdateForm  $request
     * @param int $id organization_id
     * @return \Illuminate\Http\Response
     */
    public function update(OrganizationUpdateForm $request, $id)
    {
        return $this->organizationsService->update($request, $id);
    }

    /**
     * 組織削除
     *
     * @param  int  $id organization_id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return $this->organizationsService->delete($id);
    }

    /**
     * グループ一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function groupList()
    {
        return $this->organizationsService->groupList();
    }

    /**
     * チーム一覧
     *
     * @return \Illuminate\Http\Response
     */
    public function teamList()
    {
        return $this->organizationsService->teamList();
    }
}
