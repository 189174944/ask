@extends('admin.contentLayout')

@section('content')
    {{--<div class="ui segment">--}}
    {{--<h5 class="ui  header">--}}
    {{--话题管理--}}
    {{--</h5>--}}
    {{--</div>--}}
    <div class="ui segment" id="app">
        <div class="ui top attached tabular menu stackable">
            <a class="item active" data-tab="one">所有话题
                <i onclick="window.location.reload()" class="refresh gray large icon"></i>
            </a>
            <a class="item" data-tab="two">增加话题</a>
            <a class="item" data-tab="three">One</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="one">
            {{--<div class="ui segment">--}}
            {{--<div class="ui fluid action input">--}}
            {{--<input type="text" placeholder="Search...">--}}
            {{--<div class="ui button">Search</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            @if(!request()->get('edit'))
                <table id="data_table" class="ui compact selectable striped celled table tablet stackable"
                       cellspacing="0"
                       width="100%">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>名称</th>
                        <th>简介</th>
                        <th>封面</th>
                        <th>预留</th>
                        <th>公开</th>
                        <th>推荐</th>
                        <th>精选</th>
                        <th>热门</th>
                        <th>粉丝</th>
                        <th>创建时间</th>
                        <th></th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($topic as $t)
                        <tr>
                            <td>{{$t->id}}</td>
                            <td>{{$t->name}}</td>
                            <td>{{$t->introduce}}</td>
                            <td>{{$t->image or '未设置'}}</td>
                            <td>
                                @if($t->type)
                                    <i class="check green icon"></i>
                                @else
                                    <i class="minus red icon"></i>
                                @endif
                            </td>
                            <td>
                                @if($t->is_public)
                                    <i class="check green icon"></i>
                                @else
                                    <i class="minus red icon"></i>
                                @endif
                            </td>
                            <td>
                                @if($t->is_home)
                                    <i class="check green icon"></i>
                                @else
                                    <i class="minus red icon"></i>
                                @endif
                            </td>
                            <td>
                                @if($t->is_choice)
                                    <i class="check green icon"></i>
                                @else
                                    <i class="minus red icon"></i>
                                @endif
                            </td>
                            <td>
                                @if($t->is_hot)
                                    <i class="check green icon"></i>
                                @else
                                    <i class="minus red icon"></i>
                                @endif
                            </td>

                            <td>{{$t->subscribe}}</td>
                            <td>{{$t->created_at}}</td>
                            <td>
                                <a class="ui btn green button mini"
                                   href="?edit=yes&id={{$t->id}}&from={{URL::current()}}">编辑</a>
                            </td>
                            <td>
                                <a class="ui btn redli button mini">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$topic->links()}}
            @else
                <form class="ui form segment" id="topic-update-form"
                      data-url="{{url('admin/topic').'/'.$theTopic->id}}">
                    <input type="hidden" name="creator_id" value="1">
                    <div class="field">
                        <div class="field">
                            <label>话题名称</label>
                            <input placeholder="" name="name" value="{{$theTopic->name}}" type="text">
                        </div>
                    </div>
                    <div class="field">
                        <div class="field">
                            <label>话题简介</label>
                            <input placeholder="" name="introduce" value="{{$theTopic->introduce}}" type="text">
                        </div>
                    </div>
                    <div class="field">
                        <div class="field">
                            <label>话题公告</label>
                            <input placeholder="" name="notice" value="{{$theTopic->notice}}" type="text">
                        </div>
                    </div>
                    <div class="two fields">
                        <div class="field">
                            <label>是否预留</label>
                            <div class="ui dropdown selection" tabindex="0">
                                <select name="type">
                                    <option value="1" @if(1==$theTopic->type) selected @endif></option>
                                    <option value="0" @if(0==$theTopic->type) selected @endif></option>
                                </select><i class="dropdown icon"></i>
                                <div class="default text"></div>
                                <div class="menu" tabindex="-1">
                                    <div class="item" data-value="1">是</div>
                                    <div class="item" data-value="0">否</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>是否公开</label>
                            <div class="ui dropdown selection" tabindex="0">
                                <select name="is_public">
                                    <option value="1" @if(1==$theTopic->is_public) selected @endif></option>
                                    <option value="0" @if(0==$theTopic->is_public) selected @endif></option>
                                </select><i class="dropdown icon"></i>
                                <div class="default text"></div>
                                <div class="menu" tabindex="-1">
                                    <div class="item" data-value="1">是</div>
                                    <div class="item" data-value="0">否</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>选择父话题</label>
                        @foreach($topicAll as $t)
                            @if(in_array($t->id,$p_topic))
                                <label for="{{"topic_".$t->id}}" style="margin: 5px;float: left">
                                    <input type="checkbox" name="p_topic[]" value="{{$t->id}}" checked
                                           id="{{"topic_".$t->id}}">{{$t->name}}
                                </label>
                            @else
                                <label for="{{"topic_".$t->id}}" style="margin: 5px;float: left">
                                    <input type="checkbox" name="p_topic[]" value="{{$t->id}}"
                                           id="{{"topic_".$t->id}}">{{$t->name}}
                                </label>
                            @endif
                        @endforeach
                    </div>
                    <br>
                    <div class="field">
                        <div class="ui blue button" id="topic-update">更新</div>
                        <div class="ui error message"></div>
                    </div>
                </form>
                <form class="ui form segment" id="app1">
                    <div class="field">
                        <label>管理员设置</label>
                        <input placeholder="请输入管理员id" id="users_id" name="users_id" type="text">
                    </div>
                    <div class="field">
                        <div class="ui blue button" id="topic-add-manager"
                             data-action="{{url('api/topic_manager/post')}}" data-topic-id="{{$theTopic->id}}">新增管理员
                        </div>
                    </div>
                    <div class="field">
                        <label>当前管理员</label>
                        <div class="ui segment">

                            <div class="ui ordered horizontal list">
                                <div class="item" v-for="x in usersList ">
                                    <img class="ui avatar image" src="{{asset('img/avatar/people/Glenn.png')}}"
                                         alt="label-image">
                                    <div class="content">
                                        <div class="header">@{{ x.users.nickname }}</div>
                                    </div>
                                    <i class="icon red trash delete-topic-manager" :data-users_id="x.users_id"
                                       data-action="{{url('api/topic_manager/delete')}}"
                                       data-topic_id="{{$theTopic->id}}" @click="refreshData"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>
        <div class="ui bottom attached tab segment" data-tab="two">
            {{--<div class="ui segment">--}}
            {{--<h5 class="ui header">--}}
            {{--Basic Form Validation--}}
            {{--</h5>--}}
            {{--</div>--}}
            <form class="ui form segment" id="topic-insert-form" data-url="{{url('admin/topic')}}">
                <input type="hidden" name="creator_id" value="1">
                <div class="field">
                    <div class="field">
                        <label>名称</label>
                        <input placeholder="" name="name" type="text">
                    </div>
                </div>
                <div class="field">
                    <div class="field">
                        <label>简介</label>
                        <input placeholder="" name="introduce" type="text">
                    </div>
                </div>
                <div class="field">
                    <div class="field">
                        <label>公告</label>
                        <input placeholder="" name="notice" type="text">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>预留</label>
                        <div class="ui dropdown selection" tabindex="0">
                            <select name="type">
                                <option value="1"></option>
                                <option value="0"></option>
                            </select><i class="dropdown icon"></i>
                            <div class="default text">否</div>
                            <div class="menu" tabindex="-1">
                                <div class="item" data-value="1">是</div>
                                <div class="item" data-value="0">否</div>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <label>公开</label>
                        <div class="ui dropdown selection" tabindex="0">
                            <select name="is_public">
                                <option value="1"></option>
                                <option value="0"></option>
                            </select><i class="dropdown icon"></i>
                            <div class="default text">是</div>
                            <div class="menu" tabindex="-1">
                                <div class="item" data-value="1">是</div>
                                <div class="item" data-value="0">否</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <div class="ui blue button" id="topic-insert">提交</div>
                    <div class="ui error message"></div>
                </div>
            </form>
        </div>
        <div class="ui bottom attached tab segment" data-tab="three">
            Three
        </div>
    </div>
@endsection

@section('js')
    <script>
                {{--vue模块必须放在代码前面 否则会出现BUG--}}
        var vue = new Vue({
                el: '#app1',
                data: {
                    usersList: []
                },
                methods: {
                    refreshData: function (e) {
                        $.ajax({
                            type: "post",
                            url: e.target.dataset.action,
                            data: {topic_id: e.target.dataset.topic_id, users_id: e.target.dataset.users_id},
                            success: function (data) {
                                if (data.code === 1) {
                                    alert(data.info)
                                    loadManager()
                                } else {
                                    alert(data.info)
                                }
                                console.log(data)
                            },
                            error: function (e) {
                                console.log(e.responseText);
                            },
                            beforeSend: function () {

                            }
                        })
                    }
                }
            });

        function loadManager() {
            $.ajax({
                type: "get",
                url: "{{url('api/topic_manager/get?topic_id='.request('id'))}}",
                success: function (data) {
                    if (data.code === 1) {
                        vue.usersList = data.data
                        console.log(window.vue.usersList)
                    }
                    console.log(data)
                },
                error: function (e) {
                    console.log(e.responseText);
                },
                beforeSend: function () {

                }
            })
        }

        loadManager()
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#topic-insert").click(function () {
            var ele = $("#topic-insert-form");
            var data = ele.serialize();
            var url = ele.data('url')
            console.log(data)
            console.log(url)
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function (data) {
                    if (data.code === 1) {
                        alert("成功")
                    }
                },
                error: function (e) {
                    console.log(e.responseText);
                },
                beforeSend: function () {

                }
            })
        })
        $("#topic-update").click(function () {
            var ele = $("#topic-update-form");
            var data = ele.serialize();
            var url = ele.data('url')
            console.log(data)
            console.log(url)
            $.ajax({
                type: "PUT",
                url: url,
                data: data,
                success: function (data) {
                    if (data.code === 1) {
                        window.history.back()
                    } else {
                        alert(data.info)
                    }
                    console.log(data)
                },
                error: function (e) {
                    console.log(e.responseText);
                },
                beforeSend: function () {

                }
            })
        })

        $("#topic-add-manager").click(function () {
            $.ajax({
                type: "post",
                url: $(this).data('action'),
                data: {topic_id: $(this).data('topic-id'), users_id: $("#users_id").val()},
                success: function (data) {
                    if (data.code === 1) {
                        alert(data.info)
                        loadManager()
                    } else {
                        alert(data.info)
                    }
                    console.log(data)
                },
                error: function (e) {
                    console.log(e.responseText);
                },
                beforeSend: function () {

                }
            })
        })
    </script>
@endsection



{{--双向绑定案例--}}
{{--@foreach($topicAll as $t)--}}
{{--@if(in_array($t->id,[1,2,3]))--}}
{{--<label for="{{"topic_".$t->id}}" style="margin: 5px;float: left">--}}
{{--<input type="checkbox" name="p_topic" value="{{$t->id}}" checked--}}
{{--id="{{"topic_".$t->id}}">{{$t->name}}--}}
{{--</label>--}}
{{--@else--}}
{{--<label for="{{"topic_".$t->id}}" style="margin: 5px;float: left">--}}
{{--<input type="checkbox" name="p_topic" value="{{$t->id}}"--}}
{{--id="{{"topic_".$t->id}}">{{$t->name}}--}}
{{--</label>--}}
{{--@endif--}}
{{--@endforeach--}}


