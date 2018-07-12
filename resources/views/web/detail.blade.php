@extends('web.layout')
@section('content')
<style type="text/css">
    .article-content{padding: 10px 28px 5px;background: #f5f8fd;border-bottom: 0 none;border-color: #c8d8f2;}
    .article-content .sherry_title{display:block;font-size:18px;overflow:hidden;padding:0 0 0 2px;font-family:Microsoft yahei;color:#343436;font-weight:700}
    .article-content .sherry_title h1{display:block;border-bottom:0 none;font-weight: 700;font-family: Microsoft yahei;color: #c30;font-size: 20px;height: 60px;line-height: 60px;overflow: hidden;text-align: center;}
    .article-content .source{font-size: 12px;color: #666;font-weight: 400;text-align: center;border-bottom: 1px solid #eee;padding: 0 0 10px;}
    .article-content .detail{padding: 20px 0 0;line-height: 1.6;text-align: left;font-size: 16px;}
    .article-content .detail p{line-height: 30px;margin-bottom: 16px;}
    .article-content .detail a{color: #379be9}
</style>
<div class="col-md-8 col-left article-content">
    <div class="sherry_title">
        <h1>{{ $articleBaseInfo['title'] }}</h1>
        <div class="source">&nbsp;
            发布时间：<time pubdate="pubdate">2018-05-09 11:50</time>&nbsp;&nbsp;
            文章分类：@if($articleBaseInfo->p_cid){!!  categoryUrlInfo($articleBaseInfo->p_cid) !!}@endif
            @if($articleBaseInfo->s_cid){!!  categoryUrlInfo($articleBaseInfo->s_cid) !!}@endif
            @if($articleStaticInfo)浏览数:<span>{{ $articleStaticInfo['pv'] }}</span>@endif
        </div>
    </div>
    <div class="detail">{!! $articleDetailInfo !!}</div><div class="clear"></div>
</div>
@endsection