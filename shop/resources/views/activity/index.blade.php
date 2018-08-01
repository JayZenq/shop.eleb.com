@extends('default')

@section('contents')
    <table class="table">
        <tr>
            {{--<td>ID</td>--}}
            <td>活动名称</td>
            <td>活动开始时间</td>
            <td>活动结束时间</td>
            {{--<td>操作</td>--}}
        </tr>
        @foreach($activities as $activity)
        <tr>
            {{--<td>{{$activity->id}}</td>--}}
            <td><a href="{{route('activities.show',[$activity])}}">{{$activity->title}}</a></td>
            <td>{{$activity->start_time}}</td>
            <td>{{$activity->end_time}}</td>
            {{--<td>--}}
                {{--<form action="{{route('activities.destroy',[$activity])}}" method="post">--}}
                    {{--<a href="{{route('activities.edit',[$activity])}}" class="btn btn-primary">编辑</a>--}}
                    {{--{{method_field('DELETE')}}--}}
                    {{--{{csrf_field()}}--}}
                    {{--<button class="btn btn-danger">删除</button>--}}
                {{--</form>--}}
            {{--</td>--}}
        </tr>
        @endforeach
        {{--<tr>--}}
            {{--<td colspan="5">--}}
                {{--<a href="{{route('activities.create')}}" class="btn btn-block btn-success">添加分类</a>--}}
            {{--</td>--}}

        {{--</tr>--}}
    </table>
    {{$activities->links()}}
@endsection