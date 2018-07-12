<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleStatistics extends Model
{
    protected $table = 'article_statistics';

    public static function topPv($num=10)
    {
        return (new static())
            ->leftJoin('article_base', 'article_base.id', '=', 'article_statistics.aid')
            ->select(['article_base.id', 'article_base.title'])
            ->where('article_base.is_delete', '=', 0)
            ->where('article_base.is_examine', '=', 1)
            ->orderBy('article_statistics.pv', 'desc')
            ->limit($num)
            ->get();
    }

    public static function topPvLastweek($num=10)
    {
        return (new static())
            ->leftJoin('article_base', 'article_base.id', '=', 'article_statistics.aid')
            ->select(['article_base.id', 'article_base.title'])
            ->where('article_base.is_delete', '=', 0)
            ->where('article_base.is_examine', '=', 1)
            ->where('article_base.add_time', '>', strtotime('-7 days'))
            ->orderBy('article_statistics.pv', 'desc')
            ->limit($num)
            ->get();
    }

    public static function one($aid)
    {
        return (new static())
            ->select(['pv'])
            ->where('aid', '=', $aid)
            ->first();
    }
}
