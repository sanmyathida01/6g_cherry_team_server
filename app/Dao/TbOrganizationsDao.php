<?php

namespace App\Dao;

use App\Models\TbOrganizations;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TbOrganizationsDao
{
    /**
     * 組織登録
     *
     * @param  App\Models\TbOrganizations $tbOrganizations
     * @return \Illuminate\Http\Response
     */
    public function create(TbOrganizations $tbOrganizations)
    {
        DB::beginTransaction();

        try {
            $data = TbOrganizations::create([
                'organization_id' => $tbOrganizations->organization_id,
                'organization_name' => $tbOrganizations->organization_name,
                'created_user_id' => $tbOrganizations->created_user_id,
                'del_flg' => false,
            ]);
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
        }
        return ($data) ? true : false;
    }
}
