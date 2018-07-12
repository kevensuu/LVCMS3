<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleBase extends Model
{
    protected $table = 'article_base';

    public static function all($cpage=1, $num=15, $columns=['id','title','p_cid','s_cid','summary','add_time'])
    {
        return (new static())
            ->select($columns)
            ->where('is_delete', '=', 0)
            ->where('is_examine', '=', 1)
            ->orderBy('add_time', 'desc')
            ->orderBy('id', 'desc')
            ->offset(($cpage-1)*$num)
            ->limit($num)
            ->get();
    }

    public static function newest($num=10)
    {
        return (new static())
            ->select(['id', 'title'])
            ->where('is_delete', '=', 0)
            ->where('is_examine', '=', 1)
            ->orderBy('add_time', 'desc')
            ->orderBy('id', 'desc')
            ->limit($num)
            ->get();
    }

    public static function catNewest($cid, $cpage=1, $num=10, $columns=['id','title','p_cid','s_cid','summary','add_time'])
    {
        $cid = (int)$cid;
        if(!$cid) return [];

        return (new static())
            ->select($columns)
            ->where('s_cid', '=', $cid)
            ->orwhere('p_cid', '=', $cid)
            ->where('is_delete', '=', 0)
            ->where('is_examine', '=', 1)
            ->orderBy('add_time', 'desc')
            ->orderBy('id', 'desc')
            ->offset(($cpage-1)*$num)
            ->limit($num)
            ->get();
    }

    public static function total($cid=0)
    {
        if($cid)
        {
            return (new static())
                ->where('s_cid', '=', $cid)
                ->orwhere('p_cid', '=', $cid)
                ->where('is_delete', '=', 0)
                ->where('is_examine', '=', 1)
                ->count();
        }

        return (new static())
            ->where('is_delete', '=', 0)
            ->where('is_examine', '=', 1)
            ->count();
    }

    public static function rand($num=10)
    {

    }

    public static function one($aid, $columns=['id','title','p_cid','s_cid','summary','add_time'])
    {
        return (new static())
            ->select($columns)
            ->where('id', '=', $aid)
            ->where('is_delete', '=', 0)
            ->where('is_examine', '=', 1)
            ->first();
    }
}
