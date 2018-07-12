<div class="clear" style="margin-bottom: 10px;"></div>
<ul style="background: #fafafa;border-top: 1px solid #eee;padding: 10px;">
    @if($newest)
    @foreach($newest as $value)
    <li class="margin-bottom-8" style="border-bottom: 1px solid #eee;padding: 10px 0;">
        <div>
            <div class="list-title"><a href="{{ articleUrlInfo($value->id) }}">{{ $value->title }}</a></div>
            <div class="list-desc"><span>{{ $value->summary }}</span></div>
            <div class="list-other">
                <span>{{ date('Y-m-d H:i', $value->add_time) }}</span>
                <em class="f_right">栏目：@if($value->p_cid){!!  categoryUrlInfo($value->p_cid) !!}@endif
                    @if($value->s_cid){!!  categoryUrlInfo($value->s_cid) !!}@endif</em>
            </div>
        </div>
    </li>
    @endforeach
    @endif
</ul>{!! $fpage !!}