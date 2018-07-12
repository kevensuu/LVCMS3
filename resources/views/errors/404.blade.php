@extends('web.layout')
@section('content')
<div class="col-md-8 col-left article-list">
    <div style="margin: 20px auto;text-align: center;">
        <h1>404</h1>
        <p>很抱歉，您要访问的页面不存在。</p>
        <p>1、请检查您输入的地址是否正确。</p>
        <p>2、请通过 <a href="{{ env('APP_URL') }}">{{ env('WEB_NAME') }}</a> 进行浏览。</p>
    </div>
</div>
@endsection