<?php

namespace App\Http\Controllers\Web;

use App\Model\ArticleBase;
use App\Model\ArticleDetail;
use App\Model\ArticleStatistics;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    public function show($aid, $cpage=1)
    {
        $aid = (int)$aid;
        $cpage = (int)$cpage;
        if(!$aid) abort(404);
        if($cpage < 1) $cpage=1;

        $data = [];
        $data['pageType'] = 'detail';

        $data['articleBaseInfo'] = ArticleBase::one($aid);
        if(!$data['articleBaseInfo']) abort(404);

        $content = ArticleDetail::one($aid, $cpage);
        if(!$content) abort(404);
        $content = $content['content'];

        $keywords = config('keywords');
        if ($keywords)
        {
            foreach ($keywords as $value)
            {
                $content = preg_replace("/([\x{4e00}-\x{9fa5}]+)[ ]?({$value['word']})[ ]?([\x{4e00}-\x{9fa5}]+)/u", "$1 <a href='{$value['url']}'>$2</a> $3", $content, 1);
            }
        }
        $data['articleDetailInfo'] = $content;
        $data['articleStaticInfo'] = ArticleStatistics::one($aid);
        $data['catNewest'] = ArticleBase::catNewest($data['articleBaseInfo']['s_cid'], 1, 10, ['id', 'title'], $aid);

        return view('web/detail', $data);
    }

    public function upPv(Request $request)
    {
        $aid = (int)$request->input('aid');
        if(!$aid) return;

        ArticleStatistics::upPv($aid);

        return response()
            ->json(['ret'=>1])
            ->withCallback($request->input('callback'));
    }
}
