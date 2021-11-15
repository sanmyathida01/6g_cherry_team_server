<?php

namespace App\Services;

use App\Dao\TbOrganizationsDao;
use App\Models\TbOrganizations;
use Illuminate\Http\Request;

class OrganizationsService
{
    private $tbOrganizationsDao;

    /**
     * Class Constructor
     *
     * @param TeamsDao $teamsDao
     */
    public function __construct(TbOrganizationsDao $tbOrganizationsDao)
    {
        $this->tbOrganizationsDao = $tbOrganizationsDao;
    }

    /**
     * 組織登録
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tbOrganizations = new TbOrganizations();
        $tbOrganizations->organization_id = $request->parent_organization_id			;
        $tbOrganizations->organization_name = $request->organization_name;
        $tbOrganizations->created_user_id = $request->login_user_id;
        return $this->tbOrganizationsDao->create($tbOrganizations);
    }
}
