<?php

namespace App\Http\Controllers\Web;

use App\Model\ArticleBase;
use App\Model\ArticleStatistics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function show()
    {
        $data = [];
        $data['pageType'] = 'home';
        $data['topPvLastweek'] = ArticleStatistics::topPvLastweek(8);

        $pnum = env('APP_PNUM');
        $cpage = 1;
        $data['newest'] = ArticleBase::all($cpage, $pnum);
        $baseUrl = env('APP_URL').'/newest';
        $data['fpage'] = $this->fpage($cpage, ArticleBase::total(), $baseUrl, $pnum);

        return view('web/home', $data);
    }
}