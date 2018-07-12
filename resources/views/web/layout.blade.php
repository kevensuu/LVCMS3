<!DOCTYPE html>
<html lang="zh-CN">
<head>
@include('web.common.meta')
</head>
<body>
@include('web.common.nav')
@include('web.common.log')
@include('web.common.menu')
<div class="container main">
    <div class="row">
        @yield('content')
        @include('web.common.rightsidebar')
    </div>
</div>
@include('web.common.footer')
@include('web.common.end')
</body>
</html>