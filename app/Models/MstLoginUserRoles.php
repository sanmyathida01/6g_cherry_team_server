<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstLoginUserRoles extends Model
{
    protected $table = 'mst_login_user_roles';
    const CREATED_AT = 'created_datetime';
    const UPDATED_AT = 'updated_datetime';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'login_user_roles_id';
}
