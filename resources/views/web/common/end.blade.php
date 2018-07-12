<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@if(isset($pageType) && $pageType=='detail')
    <script>
        $.ajax({type:'get',timeout: 2000,url:'{{ env('APP_URL') }}/upArticlePv?callback=?', data:{aid:aid}, dataType:'jsonp'})
    </script>
@endif