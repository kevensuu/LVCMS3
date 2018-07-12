<div class="col-md-4 col-right">
    <div class="panel panel-default">
        <div class="panel-heading">热门文章</div>
        <div class="panel-body">
            <ul>
                @if($topPv)
                    @foreach($topPv as $key=>$value)
                    <li><em class="color-red">{{ $key+1 }}</em><a href="{{ articleUrlInfo($value->id) }}">{{ $value->title }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">最新文章</div>
        <div class="panel-body">
            <ul>
                @if($rnewest)
                    @foreach($rnewest as $key=>$value)
                        <li><em class="color-red">{{ $key+1 }}</em><a href="{{ articleUrlInfo($value->id) }}">{{ $value->title }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>