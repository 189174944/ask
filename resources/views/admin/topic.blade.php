@extends('admin.contentLayout')

@section('content')
    <div class="ui segment">
        <h5 class="ui  header">
            话题管理
        </h5>
    </div>
    <div class="ui segment">
        <div class="ui top attached tabular menu stackable">
            <a class="item active" data-tab="one">所有话题</a>
            <a class="item" data-tab="two">增加话题</a>
            <a class="item" data-tab="three">One</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="one">
            <div class="ui segment">
                <div class="ui fluid action input">
                    <input type="text" placeholder="Search...">
                    <div class="ui button">Search</div>
                </div>
            </div>
            <table id="data_table" class="ui compact selectable striped celled table tablet stackable" cellspacing="0"
                   width="100%">
                <thead>
                <tr>
                    <th>id</th>
                    <th>话题名称</th>
                    <th>简介</th>
                    <th>封面图</th>
                    <th>预留话题</th>
                    <th>是否公开</th>
                    <th>推荐话题</th>
                    <th>热门话题</th>
                    <th>关注人数</th>
                    <th>创建时间</th>
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
                                是
                            @else
                                否
                            @endif
                        </td>
                        <td>
                            @if($t->is_public)
                                是
                            @else
                                否
                            @endif
                        </td>
                        <td>
                            @if($t->is_home)
                                是
                            @else
                                否
                            @endif
                        </td>
                        <td>
                            @if($t->is_hot)
                                是
                            @else
                                否
                            @endif
                        </td>

                        <td>{{$t->subscribe}}</td>
                        <td>{{$t->created_at}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$topic->links()}}
        </div>
        <div class="ui bottom attached tab segment" data-tab="two">
            {{--<div class="ui segment">--}}
            {{--<h5 class="ui header">--}}
            {{--Basic Form Validation--}}
            {{--</h5>--}}
            {{--</div>--}}
            <form class="ui form segment" id="topic-insert" data-url="{{url('admin/topic')}}">
                <input type="hidden" name="creator_id" value="1">
                <div class="field">
                    <div class="field">
                        <label>话题名称</label>
                        <input placeholder="" name="name" type="text">
                    </div>
                </div>
                <div class="field">
                    <div class="field">
                        <label>话题简介</label>
                        <input placeholder="" name="introduce" type="text">
                    </div>
                </div>
                <div class="field">
                    <div class="field">
                        <label>话题公告</label>
                        <input placeholder="" name="notice" type="text">
                    </div>
                </div>
                <div class="two fields">
                    <div class="field">
                        <label>是否预留</label>
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
                        <label>是否公开</label>
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
                {{--<div class="field">--}}
                    {{--<label>选择父话题</label>--}}
                    {{--@foreach($topicAll as $t)--}}
                        {{--<label for="{{"topic_".$t->id}}" style="margin: 5px;float: left">--}}
                            {{--<input type="checkbox" name="ptopic_id[]" value="{{$t->id}}"--}}
                                   {{--id="{{"topic_".$t->id}}">{{$t->name}}--}}
                        {{--</label>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                {{--<div class="two fields">--}}
                {{--<div class="field">--}}
                {{--<label>选择父话题</label>--}}
                {{--<div class="ui dropdown selection multiple" tabindex="0"><select name="exactCount" multiple="">--}}
                {{--@foreach($topicAll as $t)--}}
                {{--<option value="{{$t->id}}">{{$t->name}}</option>--}}
                {{--@endforeach--}}
                {{--</select><i class="dropdown icon"></i>--}}
                {{--<div class="default text">Select Values</div>--}}
                {{--<div class="menu" tabindex="-1">--}}
                {{--<div class="item active filtered" data-value="1">1</div>--}}
                {{--<div class="item" data-value="2">2</div>--}}
                {{--@foreach($topicAll as $t)--}}
                {{--<div class="item" data-value="{{$t->id}}">{{$t->name}}</div>--}}
                {{--@endforeach--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="field">--}}
                {{--<label>选择父话题</label>--}}
                {{--<div class="ui dropdown selection" tabindex="0">--}}
                {{--<select name="gender">--}}
                {{--<option value="1"></option>--}}
                {{--<option value="0"></option>--}}
                {{--</select><i class="dropdown icon"></i>--}}
                {{--<div class="default text">选择</div>--}}
                {{--<div class="menu" tabindex="-1">--}}
                {{--@foreach($topicAll as $t)--}}
                {{--<div class="item" data-value="1">{{$t->name}}</div>--}}
                {{--@endforeach--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="field">--}}
                {{--<label>选择子话题</label>--}}
                {{--<div class="ui dropdown selection" tabindex="0">--}}
                {{--<select name="gender121212">--}}
                {{--<option value="1"></option>--}}
                {{--<option value="0"></option>--}}
                {{--</select><i class="dropdown icon"></i>--}}
                {{--<div class="default text">否</div>--}}
                {{--<div class="menu" tabindex="-1">--}}
                {{--<div class="item" data-value="1">是</div>--}}
                {{--<div class="item" data-value="0">否</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                <div class="ui blue button" id="submit">提交</div>
                <div class="ui error message"></div>
            </form>
        </div>
        <div class="ui bottom attached tab segment" data-tab="three">
            Three
        </div>
    </div>
@endsection

@section('js')
    <script>
        $("#submit").click(function () {
            var ele = $("#topic-insert");
            var data = ele.serialize();
            var url = ele.data('action')
            console.log(data)
            console.log(url)
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function (data) {
                    if (data.code===1){
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
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


