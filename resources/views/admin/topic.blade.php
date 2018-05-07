@extends('admin.contentLayout')
@section('content')
    <div class="ui segment" id="app">
        <div class="ui top attached tabular menu stackable">
            <a class="item active" data-tab="one">所有话题</a>
            <a class="item" data-tab="two">增加话题</a>
            @if(!request()->get('edit'))
                <div class="blue ui buttons" style="margin-left: 50px">
                    <a class="ui button" href="{{url('admin/topic?filter=all')}}">所有话题</a>
                    <a class="ui button" href="{{url('admin/topic?filter=type')}}">根话题</a>
                    <a class="ui button" href="{{url('admin/topic?filter=is_recommend')}}">推荐</a>
                    <a class="ui button" href="{{url('admin/topic?filter=is_home')}}">首页推荐</a>
                    <a class="ui button" href="{{url('admin/topic?filter=is_hot')}}">热门</a>
                    <a class="ui button" href="{{url('admin/topic?filter=is_choice')}}">精选</a>
                    <a class="ui button" href="{{url('admin/topic?filter=is_city')}}">城市</a>
                    <a class="ui button" href="{{url('admin/topic?filter=is_school')}}">校园</a>
                    <a class="ui button" href="{{url('admin/topic?filter=is_hot')}}">冻结</a>
                    <a class="ui button" href="{{url('admin/topic?filter=is_locking')}}">锁定</a>
                </div>
            @endif
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
                        <th>封面</th>
                        <th>名称</th>
                        <th>简介</th>
                        <th>根话题</th>
                        <th>校园</th>
                        <th>城市</th>
                        <th>公开</th>
                        <th>首页推荐</th>
                        <th>推荐</th>
                        <th>精选</th>
                        <th>热门</th>
                        <th>粉丝</th>
                        <th>收录文章</th>
                        <th>创建时间</th>
                        <th>创建人</th>
                        <th>
                            <i onclick="window.location.reload()" class="refresh gray large icon"></i>
                        </th>
                        {{--<th></th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($topic as $t)
                        <tr>
                            <td>{{$t->id}}</td>
                            <td><img src="{{!empty($t->image)?url($t->image):'/img/default/default.png'}}" width="50px"
                                     height="50px"/></td>
                            <td>{{$t->name}}</td>
                            <td>{{$t->introduce}}</td>
                            <td>
                                @if($t->type)
                                    <i class="check green icon"></i>
                                @else
                                    <i class="minus red icon"></i>
                                @endif
                            </td>
                            <td>
                                @if($t->is_school)
                                    <i class="check green icon"></i>
                                @else
                                    <i class="minus red icon"></i>
                                @endif
                            </td>
                            <td>
                                @if($t->is_city)
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
                                @if($t->is_recommend)
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
                            <td>？</td>
                            <td>{{$t->created_at}}</td>
                            <td>
                                {{$t->users->nickname}}
                            </td>
                            <td>
                                <div class="ui inline dropdown upward" tabindex="0">
                                    <div class="text">操作</div>
                                    <i class="dropdown icon"></i>
                                    <div class="menu transition hidden" tabindex="-1">
                                        <div class="active item">
                                            <a style="display: block;color: black;font-size: 1rem;font-weight: 400"
                                               href="?edit=yes&id={{$t->id}}&from={{URL::current()}}">编辑</a>
                                        </div>
                                        <div class="item">设置公告</div>
                                        <div class="item">设为推荐</div>
                                        <div class="item">设为精选</div>
                                        <div class="item">设为热门</div>
                                        @if($t->id>31)
                                            <div class="item" data-text="kebab">删除</div>
                                        @endif
                                    </div>
                                </div>
                                {{--<div class="field">--}}
                                {{--<div class="ui dropdown selection" tabindex="0">--}}
                                {{--<select name="is_public">--}}
                                {{--<option value="1"></option>--}}
                                {{--<option value="0" selected></option>--}}
                                {{--</select><i class="dropdown icon"></i>--}}
                                {{--<div class="default text"></div>--}}
                                {{--<div class="menu" tabindex="-1">--}}
                                {{--<div class="item" data-value="1">编辑</div>--}}
                                {{--<div class="item" data-value="0">删除</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--<a class="ui btn green button mini"--}}
                                {{--href="?edit=yes&id={{$t->id}}&from={{URL::current()}}">编辑</a>--}}
                            </td>
                            {{--<td>--}}
                            {{--<a class="ui btn redli button mini">删除</a>--}}
                            {{--</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$topic->appends(['filter'=>request('filter')])->links()}}
            @else
                <form class="ui form segment" method="post" action="{{url('admin/topic_image_upload')}}"
                      enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="field">
                        <img src="{{url($theTopic->image)}}" style="width: 50px;height: 50px">
                    </div>
                    <div class="field">
                        <label>封面图上传</label>

                        <input type="hidden" name="id" value="{{$theTopic->id}}">
                        <input type="file" name="image" id="image">
                    </div>
                    <div class="field">
                        <input type="submit" class="ui blue button" value="上传话题封面"/>
                    </div>
                </form>
                <form class="ui form segment" id="topic-update-form"
                      data-url="{{url('admin/topic').'/'.$theTopic->id}}">
                    <input type="hidden" name="creator_id" value="1">
                    <input type="hidden" id="the_topic_id" name="topic_id" value="{{$theTopic->id}}">
                    <div class="four fields">
                        <div class="field">
                            <label>话题名称</label>
                            <input placeholder="" name="name" value="{{$theTopic->name}}" type="text">
                        </div>
                        <div class="field">
                            <label>话题公告</label>
                            <input placeholder="" name="notice" value="{{$theTopic->notice}}" type="text">
                        </div>
                        <div class="field">
                            <label>根话题</label>
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

                    <div class="four fields">
                        <div class="field">
                            <label>是否校园话题</label>
                            <div class="ui dropdown selection" tabindex="0">
                                <select name="is_school">
                                    <option value="1" @if(1==$theTopic->is_school) selected @endif></option>
                                    <option value="0" @if(0==$theTopic->is_school) selected @endif></option>
                                </select><i class="dropdown icon"></i>
                                <div class="default text"></div>
                                <div class="menu" tabindex="-1">
                                    <div class="item" data-value="1">是</div>
                                    <div class="item" data-value="0">否</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>校园ID</label>
                            <input placeholder="" name="school_id" value="{{$theTopic->school_id or ''}}" type="text">
                        </div>
                        <div class="field">
                            <label>是否城市话题</label>
                            <div class="ui dropdown selection" tabindex="0">
                                <select name="is_city">
                                    <option value="1" @if(1==$theTopic->is_city) selected @endif></option>
                                    <option value="0" @if(0==$theTopic->is_city) selected @endif></option>
                                </select><i class="dropdown icon"></i>
                                <div class="default text"></div>
                                <div class="menu" tabindex="-1">
                                    <div class="item" data-value="1">是</div>
                                    <div class="item" data-value="0">否</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>城市ID</label>
                            <input placeholder="" name="city_id" value="{{$theTopic->city_id or ''}}" type="text">
                        </div>

                    </div>
                    <div class="four fields">
                        <div class="field">
                            <label>是否推荐话题</label>
                            <div class="ui dropdown selection" tabindex="0">
                                <select name="is_recommend">
                                    <option value="1" @if(1==$theTopic->is_recommend) selected @endif></option>
                                    <option value="0" @if(0==$theTopic->is_recommend) selected @endif></option>
                                </select><i class="dropdown icon"></i>
                                <div class="default text"></div>
                                <div class="menu" tabindex="-1">
                                    <div class="item" data-value="1">是</div>
                                    <div class="item" data-value="0">否</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>首页推荐</label>
                            <div class="ui dropdown selection" tabindex="0">
                                <select name="is_home">
                                    <option value="1" @if(1==$theTopic->is_home) selected @endif></option>
                                    <option value="0" @if(0==$theTopic->is_home) selected @endif></option>
                                </select><i class="dropdown icon"></i>
                                <div class="default text"></div>
                                <div class="menu" tabindex="-1">
                                    <div class="item" data-value="1">是</div>
                                    <div class="item" data-value="0">否</div>
                                </div>
                            </div>
                        </div>
                        <div class="field">
                            <label>是否出现在发现页左边菜单</label>
                            <div class="ui dropdown selection" tabindex="0">
                                <select name="is_menu">
                                    <option value="1" @if(1==$theTopic->is_menu) selected @endif></option>
                                    <option value="0" @if(0==$theTopic->is_menu) selected @endif></option>
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
                        <div class="field">
                            <label>话题简介</label>
                            <input placeholder="" name="introduce" value="{{$theTopic->introduce}}" type="text">
                        </div>
                    </div>
                    {{--<div class="field">--}}
                    {{--<label>选择父话题</label>--}}
                    {{--@foreach($topicAll as $t)--}}
                    {{--@if(in_array($t->id,$p_topic))--}}
                    {{--<label for="{{"topic_".$t->id}}" style="margin: 5px;float: left">--}}
                    {{--<input type="checkbox" name="p_topic[]" value="{{$t->id}}" checked--}}
                    {{--id="{{"topic_".$t->id}}">{{$t->name}}--}}
                    {{--</label>--}}
                    {{--@else--}}
                    {{--<label for="{{"topic_".$t->id}}" style="margin: 5px;float: left">--}}
                    {{--<input type="checkbox" name="p_topic[]" value="{{$t->id}}"--}}
                    {{--id="{{"topic_".$t->id}}">{{$t->name}}--}}
                    {{--</label>--}}
                    {{--@endif--}}
                    {{--@endforeach--}}
                    {{--</div>--}}
                    {{--<br>--}}
                    <div class="field">
                        <div class="ui blue button" id="topic-update">更新信息</div>
                        <div class="ui clear button" onclick="window.history.back()">返回</div>
                    </div>
                </form>
                <div class="ui segment">
                    <label>父话题设置</label>
                    <select class="js-example-basic-multiple" style="width: 100%" name="states[]" multiple="multiple"
                            id="parent_topic">
                        {{--<option value="AL">Alabama</option>--}}
                        @foreach($selectedLabel as $k)
                            <option value="{{$k->id}}" selected="selected">{{$k->name}}</option>
                        @endforeach
                    </select>
                </div>
                <form class="ui form segment" id="app1">
                    <div class="field">
                        <label>管理员设置</label>
                    </div>
                    <div class="four fields">
                        <div class="field">
                            <input placeholder="手机号" id="account" name="account" type="text">
                        </div>
                        <div class="field">
                            <a class="ui blue button" id="topic-add-manager"
                               data-action="{{url('api/topic_manager/post')}}" data-topic-id="{{$theTopic->id}}">新增管理员
                            </a>
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
    </div>
@endsection

@section('js')
    <script>
        {{--select2--}}
        $('#parent_topic').select2({
            maximumSelectionLength: 5,
            ajax: {
                url: '{{url('admin/topic_search')}}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    var query = {
                        keyword: params.term,
                        topic_id: $("#the_topic_id").val()
                    }
                    return query;
                },
                processResults: function (data) {
                    console.log(data)
                    return {
                        results: data.results
                    };
                },
                // results: function (data) {
                //     return {results: data};
                // },
                cache: true,
                // templateResult: function (state) {
                //     if (!state.id) {
                //         return state.text;
                //     }
                //     var baseUrl = "/user/pages/images/flags";
                //     var $state = $(
                //         '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
                //     );
                //     return $state;
                // }
            },
            // tags: true,
        })
        ;
        //取回数据
        // $('#parent_topic').data({data:[{id: 0, text: 'story'},{id: 1, text: 'bug'},{id: 2, text: 'task'}]})
        $("#parent_topic").on('select2:unselecting', function (e) {
            $.ajax({
                type: "POST",
                url: "{{url('admin/deleteArrowId')}}",
                data: {topic_id: $("#the_topic_id").val(), arrow_id: e.params.args.data.id},
                success: function (data) {
                    if (data.code === 1) {
                        swal("干得漂亮！", "删除成功!", "success")

                        // $("#parent_topic").on('select2:unselect', function (e) {
                        // })
                    } else {
                        alert(data.info)
                    }
                },
                error: function (e) {
                    console.log(e.responseText);
                },
                beforeSend: function () {

                }
            })

        })
        $("#parent_topic").on('select2:selecting', function (e) {
            $.ajax({
                type: "POST",
                url: "{{url('admin/insertArrowId')}}",
                data: {topic_id: $("#the_topic_id").val(), arrow_id: e.params.args.data.id},
                success: function (data) {
                    if (data.code === 1) {
                        // alert('')
                        swal("干得漂亮！", "添加父话题成功！", "success")
                    } else {
                        alert(data.info)
                    }
                },
                error: function (e) {
                    console.log(e.responseText);
                },
                beforeSend: function () {

                }
            })

        })
                {{--select2--}}
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
                                    // swal("干得漂亮！", "新增管理员成功", "success")
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
                        swal("干得漂亮！", data.info, "success")
                    } else {
                        sweetAlert("哎呦……", "出错了", "error");
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
                        swal("干得漂亮！", data.info, "success")
                        setTimeout(function () {
                            window.history.back()
                        }, 1000)
                    } else {
                        sweetAlert("哎呦……", "出错了", "error");
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
                data: {topic_id: $(this).data('topic-id'), account: $("#account").val()},
                success: function (data) {
                    if (data.code === 1) {
                        swal("干得漂亮！", "新增管理员成功", "success")
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


