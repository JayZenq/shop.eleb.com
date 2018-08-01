@extends('default')

@section('contents')
    <div class="text-center">
        <h1>{{$activity->title}}</h1>
    </div>

<div class="row">
        <div class="col-md-8">开始时间:{{$activity->start_time}} </div>
    <div class="col-md-4 text-right">结束时间:{{$activity->end_time}}</div>
</div>

    <p>{!! $activity->content !!}</p>
@stop


