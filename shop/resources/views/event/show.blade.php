@extends('default')

@section('contents')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">ID: {{$event->id}}</li>
            <li class="list-group-item">活动名称: {{$event->title}}</li>
            <li class="list-group-item">报名开始时间: {{date('Y-m-d',$event->signup_start)}}</li>
            <li class="list-group-item">报名结束时间: {{date('Y-m-d',$event->signup_end)}}</li>
            <li class="list-group-item">开奖日期: {{$event->prize_date}}</li>
            <li class="list-group-item">报名人数限制: {{$event->signup_num}}</li>
            <li class="list-group-item">是否已开奖: @if($event->is_prize) 已开奖 @else 未开奖@endif</li>
            <li class="list-group-item">详情: {!! $event->content !!}</li>
            <li class="list-group-item">
                    <a href="{{route('event.index')}}" class="btn btn-success">返回</a>
            </li>
        </ul>
    </div>

@endsection