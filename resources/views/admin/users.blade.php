@extends('admin.contentLayout')

@section('content')
    <div class="ui segment">
        <h5 class="ui header">
            用户管理
        </h5>
    </div>
    <div class="ui segment">
        <div class="ui fluid action input">
            <input type="text" placeholder="Search...">
            <div class="ui button">搜索</div>
        </div>
    </div>
    <div class="ui segment">
        <table id="data_table" class="ui compact selectable striped celled table tablet stackable" cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>id</th>
                <th>账号</th>
                <th>昵称</th>
                <th>性别</th>
                <th>来源</th>
                <th>注册时间</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->account}}</td>
                    <td>{{$u->nickname}}</td>
                    <td>@if($u->sex)男@else女@endif</td>
                    <td>{{$u->register_from}}</td>
                    <td>{{$u->created_at}}</td>
                    <td>
                        <div class="ui inline dropdown upward" tabindex="0">
                            <div class="text">操作</div>
                            <i class="dropdown icon"></i>
                            <div class="menu transition hidden" tabindex="-1">
                                {{--<div class="active item">--}}
                                {{--<a style="display: block;color: black;font-size: 1rem;font-weight: 400"--}}
                                {{--href="?edit=yes&id={{$t->id}}&from={{URL::current()}}">编辑</a>--}}
                                {{--</div>--}}
                                <div class="item">
                                    @if($u->is_special)
                                        取消推荐
                                    @else
                                        设为推荐
                                    @endif
                                </div>
                                <div class="item" data-text="kebab">封号</div>

                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->appends(['filter'=>request('filter')])->links()}}
    </div>

@endsection