@extends('default')


@section('contents')
    <div class="row">
    <table class="table">
        <tr>
            {{--<form action="{{ route('order.day') }}" method="get" class="form">--}}
                {{--<div class="row">月--}}
                    {{--<div class="col-xs-2">--}}
                        {{--<input type="date" name="day">--}}
                    {{--</div>--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<button type="submit" class="btn btn-info btn-sm">开始搜索</button>--}}
                {{--</div>--}}
            {{--</form>--}}
        </tr>
        <tr>
            <th>{{$day}}日订单量</th>
        </tr>
            <tr style="font-size: 20px">
                <td>{{$count}}单</td>
            </tr>

        <tr>
            <td colspan="3">
                <a href="{{route('order.month')}}" class="btn btn-success">返回</a>
            </td>
        </tr>
    </table>
    </div>
    {{--<div>--}}
        {{--{{$orders->links()}}--}}
    {{--</div>--}}
@endsection