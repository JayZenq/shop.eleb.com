@extends('default')


@section('contents')
    <div class="row">
    <table class="table">
        <tr>
            <form action="{{ route('order.year') }}" method="get" class="form">
                <div class="row">
                    <div class="col-xs-2">
                        <select name="year" id="" class="form-control">
                            <option value="2016">2016年</option>
                            <option value="2017">2017年</option>
                            <option value="2018">2018年</option>
                        </select>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info btn-sm">开始搜索</button>
                </div>
            </form>
        </tr>
        <tr>
            <th>今年订单量</th>
            <th>今月订单量</th>
            <th>今日订单量</th>
        </tr>
            <tr style="font-size: 20px">
                <td>{{$count['year']}}单</td>
                <td>{{$count['month']}}单</td>
                <td>{{$count['day']}}单</td>
            </tr>

        <tr>
            <td colspan="3"></td>
        </tr>
    </table>
    </div>
    {{--<div>--}}
        {{--{{$orders->links()}}--}}
    {{--</div>--}}
@endsection