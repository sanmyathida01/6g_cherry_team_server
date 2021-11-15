<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbPosts extends Model
{
    protected $table = 'tb_posts';
    const CREATED_AT = 'created_datetime';
    const UPDATED_AT = 'updated_datetime';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'posts_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'to_user_id',
        'teams_categories_id',
        'content',
    ];
}
