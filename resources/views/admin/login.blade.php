<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" name="viewport"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site Properities -->
    <meta name="generator" content="Visual Studio 2015"/>
    <title>Stagb Admin Template</title>
    <meta name="description" content="Stagb Admin Template"/>
    <meta name="keywords"
          content="html5, ,semantic,ui, library, framework, javascript,jquery,template,blog,stagb,template"/>
    <link href="{{asset('semantic/dist/semantic.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/main.css')}}" rel="stylesheet"/>
</head>
<body>
<div class="ui container" style="padding-top:10%">
    <div class="ui grid center aligned">
        <div class="row">
            <div class="sixteen wide tablet six wide computer column">
                <div class="ui left aligned segment">

                    <div id="form" class="ui form">
                        <h1 class="ui header center aligned">
                            <img src="{{asset('img/logo.png')}}" alt="stagblogo" class="ui small image">

                            <div class="content">

                            </div>
                        </h1>

                        <div class="field">
                            <label>
                                账号:
                            </label>
                            <div class="ui fluid icon input">
                                <input name="account" id="account" type="text" autocomplete="off"
                                       style="width:100%!important;min-width:100%;width:100%;">
                                <i class="icon mail outline"></i>
                            </div>
                        </div>
                        <div class="field">
                            <label>
                                密码:
                            </label>
                            <div class="ui fluid icon input">
                                <input name="password" id="password" type="password" autocomplete="off"
                                       style="width:100%!important;min-width:100%;width:100%;">
                                <i class="icon key"></i>
                            </div>
                        </div>
                        <div class="field">

                            <a class="ui teal right labeled icon button fluid" id="login" data-action="{{url('admin/login')}}">
                                登录
                                <i class="icon sign in"></i>
                            </a>

                            <a class="ui blue right labeled icon button fluid">
                                注册
                                <i class="icon spy"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery-2.1.4.min.js')}}"></script>

<script>
    var colors = ["#F25F5C", "#247BA0", "#8e44ad", "#ED6A5A", "#32936F", "#2c3e50", "#E83F6F", "#32936F", "#2E294E"];
    var rand = Math.floor(Math.random() * colors.length);
    $('body').css("background-color", colors[rand]);

    $("#login").click(function () {
        var account = $("#account").val()
        var upass = $("#password").val()
        var url = $(this).data('action')
        $.ajax({
            type: "POST",
            url: url,
            data: {account:account,password:upass},
            success: function (data) {
                console.log(data)
                if (data.code===1){
                    window.location.href="{{url('admin')}}"
                }
            },
            error: function (e) {
                console.log(e.responseText);
            },
            beforeSend: function () {

            }
        })
    })
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>
