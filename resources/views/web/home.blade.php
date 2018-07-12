@extends('web.layout')
@section('content')
<div class="col-md-8 col-left article-list">
    <div class="top-list visible-lg">
        <div style="width:300px;height: 250px;background: gray;float: left;">
            <img src="./static/test/aliyun2.jpg">
        </div>
        <div style="float: right;width: 430px;">
            @if($topPvLastweek)
            <ul>
                @foreach($topPvLastweek as $key=>$value)
                    <li @if($key<7)class="margin-bottom-8"@endif><a href="{{ articleUrlInfo($value->id) }}">{{ $value->title }}</a></li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    @include('web.common.list')
</div>
@endsection