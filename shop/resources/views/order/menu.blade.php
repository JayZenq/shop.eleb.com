@extends('default')


@section('contents')
    <div class="row">
    <table class="table">
        <tr>
            <form action="{{ route('order.menu_month') }}" method="get" class="form">
                <div class="row">
                    <div class="col-xs-2">
                        <select name="year" id="" class="form-control">
                            <option value="">年</option>
                            <option value="2016">2016年</option>
                            <option value="2017">2017年</option>
                            <option value="2018">2018年</option>
                        </select>
                    </div>
                    <div class="col-xs-2">
                        <select name="month" id="" class="form-control">
                            <option value="">月</option>
                            <option value="01">一月</option>
                            <option value="02">二月</option>
                            <option value="03">三月</option>
                            <option value="04">四月</option>
                            <option value="05">五月</option>
                            <option value="06">六月</option>
                            <option value="07">七月</option>
                            <option value="08">八月</option>
                            <option value="09">九月</option>
                            <option value="10">十月</option>
                            <option value="11">十一月</option>
                            <option value="12">十二月</option>
                        </select>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info btn-sm">开始搜索</button>
                </div>
            </form>
        </tr>
        <tr>
            <th>菜品名称</th>
            <th>总销量</th>
        </tr>
        @foreach($menus as $menu)
            <tr style="font-size: 15px">
                <td>{{$menu->goods_name}}</td>
                <td>{{$menu->sum}}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3"></td>
        </tr>
    </table>
    </div>
    {{--<div>--}}
        {{--{{$orders->links()}}--}}
    {{--</div>--}}
@endsection