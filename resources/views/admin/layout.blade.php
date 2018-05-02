<!DOCTYPE html>
<html lang="en">
<head>
    <title>墨书后台管理系统</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link href="{{asset('semantic/dist/semantic.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/ionicons/css/ionicons.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/main.css')}}" rel="stylesheet"/>
    <link href="{{asset('plugins/pacejs/pace.css')}}" rel="stylesheet"/>
    <script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
    <style type="text/css">
        .resizeHeight {
            height: -webkit-fill-available;
        }
    </style>
</head>
<body onKeyDown="return disableKey()">
<div id="contextWrap">
    <!--sidebar-->
@include("admin.sidebar")
<!--sidebar-->
    <div class="pusher">
        <!--navbar-->
        <div class="navslide navwrap">
            <div class="ui menu icon borderless grid" data-color="inverted white">
                <a class="item labeled openbtn">
                    <i class="ion-navicon-round big icon"></i>
                </a>
                {{--<a class="item labeled expandit" onclick="toggleFullScreen(document.body)">--}}
                {{--<i class="ion-arrow-expand big icon"></i>--}}
                {{--</a>--}}
                <div class="item ui colhidden">
                    <div class="ui icon input">
                        <input type="text" placeholder="搜索">
                        <i class="search icon"></i>
                    </div>
                </div>
                <div class="right menu colhidden">
                    <div class="ui dropdown item labeled icon">
                        <i class="bell icon"></i>
                        <div class="ui red label mini circular">1</div>
                        <div class="menu">
                            <div class="header">
                                People You Might Know
                            </div>
                            <div class="item">
                                <img class="ui avatar image" src="img/avatar/people/enid.png" alt="label-image"/> Janice
                                Robinson
                            </div>
                        </div>
                    </div>
                    <div class="ui dropdown item">
                        更换主题 <i class="dropdown icon"></i>
                        <div class="menu">
                            <a class="item">蓝天</a>
                            <a class="item">草绿</a>
                            <a class="item">红色</a>
                        </div>
                    </div>
                    <div class="ui dropdown item">
                        <img class="ui mini circular image" src="img/avatar/people/enid.png" alt="label-image"/>
                        <div class="menu">
                            {{--<div class="ui divider"></div>--}}
                            <a class="item" href="{{url('admin/logout')}}">退出</a>
                        </div>
                    </div>
                    {{--<a class="item labeled rightsidebar computer only">--}}
                    {{--<i class="ion-wrench large icon"></i>--}}
                    {{--</a>--}}
                </div>
            </div>
        </div>
        <!--navbar-->
        <!--maincontent-->
        <div class="mainWrap navslide" style="height: 100%">
            {{--<div class="ui equal width left aligned padded grid stackable">--}}
            @yield('content')
            {{--</div>--}}
            {{--<div class="row">--}}
            {{--<div class="sixteen wide column">--}}
            {{--<div class="ui segments">--}}
            {{--<div class="ui segment">--}}
            {{--<h5 class="ui header">--}}
            {{--Fluid Inputs--}}
            {{--</h5>--}}
            {{--</div>--}}
            {{--<div class="ui segment">--}}

            {{--<div class="ui fluid action input">--}}
            {{--<input type="text" placeholder="Search...">--}}
            {{--<div class="ui button">Search</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>
        <!--maincontent-->
    </div>
</div>
<script src="{{asset('semantic/dist/semantic.min.js')}}"></script>
<script src="{{asset('plugins/cookie/js.cookie.js')}}"></script>
<script src="{{asset('plugins/nicescrool/jquery.nicescroll.min.js')}}"></script>
<script data-pace-options='{ "ajax": false }' src="{{asset('plugins/pacejs/pace.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
{{--左侧item点击后，右侧加载相应的URL--}}
<script>
    var iframe = $("#poker-main-content");
    $(".poker-sidebar-item").click(function () {
        var data = $(this).data("iframe-target");
        iframe.attr("src", data)
        iframe.addClass('resizeHeight')
    })
    $(document).ready(function () {
        iframe.css('min-height', $(window).height())
    })


    function disableKey() {
        //8   退格键
        //116       F5 刷新键
        //82  Ctrl + R
        //121       shift+F10
        //115       屏蔽Alt+F4
        //屏蔽 shift 加鼠标左键新开一网页
        if (window.event.keyCode === 8
            || event.keyCode === 116
            || event.keyCode === 82
            || event.keyCode === 121
            || event.keyCode === 115
            || (window.event.srcElement.tagName === "A" && window.event.shiftKey)) {
            console.log('刷新按钮已被禁用!');
            window.event.returnValue = false;
        }
    }
</script>
{{--左侧item点击后，右侧加载相应的URL--}}

</body>
</html>
