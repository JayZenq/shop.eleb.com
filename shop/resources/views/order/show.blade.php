@extends('default')

@section('contents')
    <div class="container">
        <ul class="list-group">
            <li class="list-group-item">订单ID: {{$order->id}}</li>
            <li class="list-group-item">用户ID: {{$order->name}}</li>
            <li class="list-group-item">商家ID: {{$order->shop_id}}</li>
            <li class="list-group-item">订单编号: {{$order->sn}}</li>
            <li class="list-group-item">收货人姓名: {{$order->name}}</li>
            <li class="list-group-item">收货人电话: {{$order->tel}}</li>
            <li class="list-group-item">收货人地址:{{$order->address}}</li>
            <li class="list-group-item">订单商品:
                @foreach($order['order_goods'] as $order_good)
                    <p>
                        商品名: {{$order_good->goods_name}},
                        商品数量: {{$order_good->amount}},
                        商品价格: {{$order_good->goods_price}}
                    </p>
                @endforeach
            </li>
            <li class="list-group-item">价格: {{$order->total}}</li>
            <li class="list-group-item">状态: @if($order->status==-1) 已取消 @elseif($order->status==0) 待支付 @elseif($order->status==1) 待发货 @elseif($order->status==2) 待确认 @elseif($order->status==3) 完成 @endif</li>

                @if($order->status==0)
                <li class="list-group-item">

                    <a href="{{route('order.status',[$order,'status'=>2])}}" class="btn btn-success">发货</a>
                    <a href="{{route('order.status',[$order,'status'=>-1])}}" class="btn btn-danger">取消</a>
                </li>

                @else

                @endif

        </ul>
    </div>

@endsection