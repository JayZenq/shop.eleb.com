@extends('default')


@section('contents')
    <div class="row">
    <table class="table">
        <tr>
            <form action="{{ route('order.menu_month') }}" method="get" class="form">
                <div class="row">
                    <div class="col-xs-2">
                        <input type="date" name="day">
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info btn-sm">开始搜索</button>
                </div>
            </form>
        </tr>
        <tr>
            <th>@if($day) {{$day}} @else {{$year}}年{{$month}}月 @endif菜品订单量</th>
        </tr>
        @foreach($menus as $menu)
            <tr style="font-size: 15px">
                <td>{{$menu->goods_name}}</td>
                <td>{{$menu->sum}}</td>
            </tr>
        @endforeach

        <tr>
            <td colspan="3">
                <a href="{{route('order.year')}}?year={{$year}}" class="btn btn-success">返回</a>
            </td>
        </tr>
    </table>
    </div>
    {{--<div>--}}
        {{--{{$orders->links()}}--}}
    {{--</div>--}}
@endsection