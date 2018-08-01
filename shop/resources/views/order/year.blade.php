@extends('default')


@section('contents')
    <div class="row">
    <table class="table">
        <tr>
            <form action="{{ route('order.month') }}" method="get" class="form">
                <div class="row">月
                    <div class="col-xs-2">
                        <input type="hidden" name="year" value="{{$year}}">
                        <select name="month" id="" class="form-control">
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info btn-sm">开始搜索</button>
                </div>
            </form>
        </tr>
        <tr>
            <th>{{$year}}订单量</th>
        </tr>
            <tr style="font-size: 20px">
                <td>{{$count}}单</td>
            </tr>

        <tr>
            <td colspan="3">
                <a href="{{route('order.count')}}" class="btn btn-success">返回</a>
            </td>
        </tr>
    </table>
    </div>
    {{--<div>--}}
        {{--{{$orders->links()}}--}}
    {{--</div>--}}
@endsection