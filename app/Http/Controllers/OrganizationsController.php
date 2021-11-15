<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganizationCreateForm;
use App\Services\OrganizationsService;

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
}
