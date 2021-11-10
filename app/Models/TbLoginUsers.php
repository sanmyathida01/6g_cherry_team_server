<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TbLoginUsers extends Model
{
    use HasFactory;

    protected $table = 'tb_login_users';
    const CREATED_AT = 'created_datetime';
    const UPDATED_AT = 'updated_datetime';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'login_users_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login_user_email',
        'password',
        'first_name',
        'last_name',
        'login_user_roles_id',
        'organization_id',
    ];
}
