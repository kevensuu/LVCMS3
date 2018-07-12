<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleDetail extends Model
{
    protected $table = 'article_detail';

    public static function one($aid, $page=1)
    {
        return (new static())
            ->select(['content'])
            ->where('aid', '=', $aid)
            ->where('page', '=', $page)
            ->first();
    }
}
