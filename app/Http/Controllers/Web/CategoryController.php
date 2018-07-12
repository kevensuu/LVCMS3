<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Model\ArticleBase;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function all($cpage=1)
    {
        $cpage = (int)$cpage;
        if($cpage < 1) $cpage = 1;
        $pnum = env('APP_PNUM');
        $data['newest'] = ArticleBase::all($cpage, $pnum);
        $baseUrl = env('APP_URL').'/newest';
        $data['fpage'] = $this->fpage($cpage, ArticleBase::total(), $baseUrl, $pnum);

        return view('web/category', $data);
    }

    public function cnewest($cid, $cpage=1)
    {
        $cid = (int)$cid;
        if(!isset(config('category')[$cid]))
        {
            abort(404);
        }

        $cpage = (int)$cpage;
        if($cpage < 1) $cpage = 1;
        $pnum = env('APP_PNUM');
        $data['newest'] = ArticleBase::catNewest($cid, $cpage, $pnum);
        $baseUrl = env('APP_URL').'/c/'.$cid;
        $data['fpage'] = $this->fpage($cpage, ArticleBase::total($cid), $baseUrl, $pnum);

        return view('web/category', $data);
    }
}
