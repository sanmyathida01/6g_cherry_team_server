<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MstTeamsCategories extends Model
{
    protected $table = 'mst_teams_categories';
    const CREATED_AT = 'created_datetime';
    const UPDATED_AT = 'updated_datetime';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'teams_categories_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'teams_categories_name',
    ];
}
