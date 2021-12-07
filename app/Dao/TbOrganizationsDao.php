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

    /**
     * 組織一覧
     *
     * @param  App\Models\TbOrganizations $tbOrganizations
     * @return \Illuminate\Http\Response
     */
    public function list(TbOrganizations $tbOrganizations)
    {
        DB::beginTransaction();
        try {
            $dataList = TbOrganizations::select([
                'tb_organizations.id',
                'tb_organizations.organization_id',
                'tb_organizations.organization_name'
            ]);

            $dataList = $dataList->orderBy('tb_organizations.organization_id');
            $dataList = $dataList->where('tb_organizations.del_flg', '=', 0);
            $dataList = $dataList->where('tb_organizations.organization_id', '!=', null);
            $dataList = $dataList->with('parent:id,organization_name');
                        
            if (!is_null($tbOrganizations->limit)) {
                $dataList = $dataList->paginate($tbOrganizations->limit, ['*'], 'Page', $tbOrganizations->page);
            } else {
                $dataList = $dataList->get();
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error($ex);
        }
        return $dataList;
    }

    /**
     * 組織編集
     *
     * @param  App\Models\TbOrganizations $tbOrganizations
     * @return \Illuminate\Http\Response
     */
    public function update(TbOrganizations $tbOrganizations)
    {
        DB::beginTransaction();

        try {
            $data = TbOrganizations::find($tbOrganizations->id);
            if ($data) {
                $data->update([
                    'organization_id' => $tbOrganizations->organization_id,
                    'organization_name' => $tbOrganizations->organization_name,
                    'updated_user_id' => $tbOrganizations->login_users_id,
                    'updated_datetime' => now(),
                ]);
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            Log::error($ex);
        }
        return ($data) ? true : false;
    }

    /**
     * 組織削除
     *
     * @param  int  $id organization_id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $data = TbOrganizations::find($id);
            if ($data) {
                $data->del_flg = 1;
                $data->updated_datetime = now();
                $data->save();
            }
            DB::commit();
        } catch (Exception $ex) {
            DB::rollback();
            Log::error($ex);
        }
        return ($data) ? true : false;
    }
}
