<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbPosts extends Model
{
    protected $table = "tb_posts"; //DBのテーブル名
    const CREATED_AT = 'created_datetime';
    const UPDATED_AT = 'updated_datetime';

    protected $fillable = ['from_user_id','to_user_id','content','teams_categories_id'];
}