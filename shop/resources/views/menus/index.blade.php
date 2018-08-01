@extends('default')


@section('contents')
    <div class="row">
    <div class="btn-group-vertical col-md-1" role="group" aria-label="Vertical button group">
        <a href="{{ route('menus.index') }}" role="button" class="btn btn-default">所有</a>
        @foreach($menuCategory as $value)
            <a href="{{ route('menus.index',['id'=>$value->id]) }}" role="button" class="btn btn-default">{{ $value->name }}</a>
        @endforeach
    </div>
    <div class="col-md-11">
    <table class="table">
        <tr>
            <form action="{{ route('menus.index') }}" method="get" class="form">
                <div class="form-group">
                    <input type="text" name="keyword" placeholder="输入菜品名搜索" style="margin-right: 20px;">
                    <input type="number" name="min" placeholder="最低价格" style="width: 80px;">----<input type="number" name="max" style="width: 80px;margin-right: 15px;" placeholder="最高价格">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info btn-sm">开始搜索</button>
                </div>
            </form>
        </tr>
        <tr>
            <td>ID</td>
            <td>名称</td>
            <td>评分</td>
            <td>所属商家</td>
            <td>所属分类</td>
            <td>价格</td>
            <td>描述</td>
            <td>月销量</td>
            <td>评分数量</td>
            <td>提示信息</td>
            <td>满意度数量</td>
            <td>满意度评分</td>
            <td>商品图片</td>
            <td>操作</td>
        </tr>
        @foreach($menus as $menu)
            <tr>
                <td>{{$menu->id}}</td>
                <td>{{$menu->goods_name}}</td>
                <td>{{$menu->rating}}</td>
                <td>{{$menu->shop->shop_name}}</td>
                <td>{{$menu->menucategory->name}}</td>
                <td>{{$menu->goods_price}}</td>
                <td>{{$menu->description}}</td>
                <td>{{$menu->month_sales}}</td>
                <td>{{$menu->rating_count}}</td>
                <td>{{$menu->tips}}</td>
                <td>{{$menu->satisfy_count}}</td>
                <td>{{$menu->satisfy_rate}}</td>
                <td><img src="{{$menu->goods_img}}" alt="" width="60"> </td>
                <td>
                    <form action="{{route('menus.destroy',[$menu])}}" method="post">
                        {{--@if($user->status==0)--}}
                            {{--<a href="{{route('users.status',[$user])}}" class="btn btn-success">启用</a>--}}
                        {{--@else--}}
                            {{--<a href="{{route('users.status',[$user])}}" class="btn btn-danger">禁用</a>--}}
                        {{--@endif--}}
                        {{--<a href="{{route('menus.show',[$menu])}}" class="btn btn-primary">查看</a>--}}
                        <a href="{{route('menus.edit',[$menu])}}" class="btn btn-primary">编辑</a>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="14">
                <a href="{{route('menus.create')}}" class="btn btn-block btn-success">添加菜品</a>
            </td>

        </tr>
    </table>
    </div>
        {{$menus->appends(['keyword'=>"{$keyword}",'id'=>$id,'max'=>$max,'min'=>$min])->links()}}
    </div>
@endsection