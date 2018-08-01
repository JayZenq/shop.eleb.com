@extends('default')


@section('contents')
    <table class="table">
        <tr>
            <td>ID</td>
            <td>分类名称</td>
            <td>所属商户</td>
            <td>分类描述</td>
            <td>默认分类</td>
            <td>操作</td>
        </tr>
        @foreach($menucategories as $menuCategory)
            <tr>
                <td>{{$menuCategory->id}}</td>
                <td><a href="{{route('menus.index',['id'=>$menuCategory->id])}}">{{$menuCategory->name}}</a></td>
                <td>{{$menuCategory->shop->shop_name}}</td>
                <td>{{$menuCategory->description}}</td>
                <td>@if($menuCategory->is_selected) 是 @else 否@endif</td>
                <td>
                    <form action="{{route('menucategories.destroy',[$menuCategory])}}" method="post">
                        {{--@if($user->status==0)--}}
                            {{--<a href="{{route('users.status',[$user])}}" class="btn btn-success">启用</a>--}}
                        {{--@else--}}
                            {{--<a href="{{route('users.status',[$user])}}" class="btn btn-danger">禁用</a>--}}
                        {{--@endif--}}
                        {{--<a href="{{route('menucategories.show',[$menuCategory])}}" class="btn btn-primary">查看</a>--}}
                        <a href="{{route('menucategories.edit',[$menuCategory])}}" class="btn btn-primary">编辑</a>
                        {{method_field('DELETE')}}
                        {{csrf_field()}}
                        <button class="btn btn-danger">删除</button>
                    </form>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="6">
                <a href="{{route('menucategories.create')}}" class="btn btn-block btn-success">添加菜品分类</a>
            </td>

        </tr>
    </table>

@endsection