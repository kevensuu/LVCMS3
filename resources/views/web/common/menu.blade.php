<div class="container menu visible-lg">
    <div class="row" style="padding: 0 15px;">
        <ul class="main-menu" style="background: #379be9;">
            <li class="active"><a href="{{ env('APP_URL') }}">首页</a></li>
            @foreach($pCat as $value)<li>{!! categoryUrlInfo($value['id']) !!}</li>@endforeach
        </ul>
    </div>
    <div class="row" style="padding: 0 15px;">
        <ul class="sub-menu" style="background: #f8f8f8;">@foreach($sCat as $value)<li>{!! categoryUrlInfo($value['id']) !!}</li>@endforeach</ul>
    </div>
</div>