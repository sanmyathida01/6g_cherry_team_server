<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbOrganizations extends Model
{
    protected $table = 'tb_organizations';
    const CREATED_AT = 'created_datetime';
    const UPDATED_AT = 'updated_datetime';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization_id',
        'organization_name',
    ];
}
