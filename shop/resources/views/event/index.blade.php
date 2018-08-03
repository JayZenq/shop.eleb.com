@extends('default')


@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>活动名称</td>
            <td>报名开始时间</td>
            <td>结束报名时间</td>
            <td>开奖日期</td>
            <td>是否已开奖</td>
            <td>操作</td>
        </tr>
        @foreach($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td>{{$event->title}}</td>
                <td>{{date('Y-m-d',$event->signup_start)}}</td>
                <td>{{date('Y-m-d',$event->signup_end)}}</td>
                <td>{{$event->prize_date}}</td>
                <td>@if($event->is_prize) 已开奖 @else 未开奖 @endif</td>
                <td>
                    <a href="{{route('event.show',[$event])}}" class="btn btn-primary">详情</a>
                    {{--<form action="{{route('event.destroy',[$event])}}" method="post">--}}
                    @if(\App\Models\Event_member::where('member_id',\Illuminate\Support\Facades\Auth::user()->id)->count())
                        <a href="" class="btn btn-primary">已报名</a>
                    @else
                        <a href="{{route('event.edit',[$event])}}" class="btn btn-primary">报名</a>
                    @endif
                        {{--{{method_field('DELETE')}}--}}
                        {{--{{csrf_field()}}--}}
                        {{--<button class="btn btn-danger">删除</button>--}}
                    {{--</form>--}}
                </td>
            </tr>
        @endforeach
    </table>
    {{--{{$events->links()}}--}}
@endsection