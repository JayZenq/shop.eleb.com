@extends('default')


@section('contents')
    <div class="row">
    <table class="table">
        {{--<tr>--}}
            {{--<form action="{{ route('order.index') }}" method="get" class="form">--}}
                {{--<div class="form-group">--}}
                    {{--<input type="text" name="keyword" placeholder="输入菜品名搜索" style="margin-right: 20px;">--}}
                    {{--<input type="number" name="min" placeholder="最低价格" style="width: 80px;">----<input type="number" name="max" style="width: 80px;margin-right: 15px;" placeholder="最高价格">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<button type="submit" class="btn btn-info btn-sm">开始搜索</button>--}}
                {{--</div>--}}
            {{--</form>--}}
        {{--</tr>--}}
        <tr>
            <td>ID</td>
            <td>订单编号</td>
            <td>用户名</td>
            <td>商家ID</td>
            <td>价格</td>
            <td>状态</td>
            <td>下单时间</td>
            <td>操作</td>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->sn}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->shop_id}}</td>
                <td>{{$order->total}}</td>
                <td>@if($order->status==-1) 已取消 @elseif($order->status==0) 待支付 @elseif($order->status==1) 待发货 @elseif($order->status==2) 待确认 @elseif($order->status==3) 完成 @endif</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <form action="{{route('order.destroy',[$order])}}" method="post">
                        {{--@if($user->status==0)--}}
                            {{--<a href="{{route('users.status',[$user])}}" class="btn btn-success">启用</a>--}}
                        {{--@else--}}
                            {{--<a href="{{route('users.status',[$user])}}" class="btn btn-danger">禁用</a>--}}
                        {{--@endif--}}
                        <a href="{{route('order.show',[$order])}}" class="btn btn-primary">查看</a>
                        {{--<a href="{{route('menus.edit',[$order])}}" class="btn btn-primary">编辑</a>--}}
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="8"></td>
        </tr>
    </table>
    </div>
    {{--<div>--}}
        {{--{{$orders->links()}}--}}
    {{--</div>--}}
@endsection