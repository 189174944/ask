@extends('admin.contentLayout')
@section('content')
    <div class="ui segment" id="app">
        <table id="data_table" class="ui compact selectable striped celled table tablet stackable"
               cellspacing="0"
               width="100%">
            <thead>
            <tr>
                <th>id</th>
                <th>标题</th>
                <th>话题</th>
                <th>类型</th>
                <th>状态</th>
                <th>摘要</th>
                <th>浏览</th>
                <th>发布于</th>
                <th>最新评论于</th>
                <th>
                    <i onclick="window.location.reload()" class="refresh gray large icon"></i>
                </th>
                {{--<th></th>--}}
            </tr>
            </thead>
            <tbody>
            @foreach($question as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{{$t->title}}</td>
                    <td>
                        @foreach($t->topic as $k)
                            <a class="ui green circular label">{{$k->name}}</a>
                        @endforeach
                    </td>
                    <td>
                        @if($t->type==1)
                            文章
                        @else
                            问题
                        @endif
                    </td>
                    <td>
                        @if($t->status==1)
                            草稿
                        @elseif($t->status==2)
                            待审核
                        @elseif($t->status==3)
                            已发表
                        @elseif($t->status==4)
                            已撤回
                        @elseif($t->status==5)
                            未通过
                        @endif
                    </td>
                    <td>{{str_limit($t->content,20,'...')}}</td>
                    <td>
                        {{$t->visitornum}}
                    </td>
                    <td>{{$t->created_at}}</td>
                    <td>
                        {{$t->latest_comment}}
                    </td>
                    <td>
                        <div class="ui inline dropdown upward" tabindex="0">
                            <div class="text">操作</div>
                            <i class="dropdown icon"></i>
                            <div class="menu transition hidden" tabindex="-1">
                                {{--<div class="active item">--}}
                                {{--<a style="display: block;color: black;font-size: 1rem;font-weight: 400"--}}
                                {{--href="?edit=yes&id={{$t->id}}&from={{URL::current()}}">编辑</a>--}}
                                {{--</div>--}}
                                <div class="item" href="{{url('admin/artical/'.$t->id)}}">预览</div>
                                <div class="item">设为热门</div>
                                <div class="item">设为精选</div>
                                <div class="item" data-text="kebab">移动到回收站</div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$question->links()}}
    </div>
@endsection

@section('js')
    <script>
        alert(1)
        $(".ui.modal.long").modal("attach events", ".modalsix", "show");


    </script>
@endsection


