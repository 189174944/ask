<h1>
    {{$artical->title}}
</h1>
<hr>
话题:
@foreach($artical->topic as $k)
    <a class="ui green circular label">{{$k->name}}</a>
@endforeach
<hr>
<h6>
    作者:{{$artical->users->nickname}}
    创建时间:{{$artical->created_at}}
</h6>
<hr>
{{$artical->content}}
<hr>

关注数量({{$collectCount}})

