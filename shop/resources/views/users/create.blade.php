@extends('default')

@section('contents')
    @include('_errors')
    <form class="form-horizontal" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">商家名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="商家名称" name="name" value="{{old('name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">邮箱</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="邮箱" name="email" value="{{old('email')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputEmail3" placeholder="密码" name="password" value="">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">确认密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputEmail3" placeholder="确认密码" name="password_confirmation" value="">
            </div>
        </div>


        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="店铺名称" name="shop_name" value="{{old('shop_name')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺分类</label>
            <div class="col-sm-10">
                <select class="form-control" name="shop_category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店铺图片</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="inputEmail3" placeholder="" name="shop_img">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否是品牌</label>
            <div class="col-sm-5">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="brand" value="1">是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="brand" checked value="0">否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否准时送达</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="on_time" value="1">是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="on_time" checked value="0">否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否蜂鸟配送</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="fengniao" value="1">是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="fengniao" checked value="0">否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否保标记</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="bao" value="1">是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="bao" checked value="0">否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否票标记</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="piao" value="1">是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="piao" checked value="0">否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">是否准标记</label>
            <div class="col-sm-10">
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="zhun" value="1">是
                </label>
                <label>
                    <input type="radio" class="form-control" id="inputEmail3" placeholder="" name="zhun" checked value="0">否
                </label>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">起送金额</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="" name="start_send" value="{{old('start_send')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">配送费</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="配送费" name="send_cost" value="{{old('send_cost')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">店公告</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="店公告" name="notice" value="{{old('notice')}}">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">优惠信息</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" placeholder="优惠信息" name="discount" value="{{old('discount')}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                <button type="submit" class="btn btn-default">提交</button>
            </div>
        </div>
    </form>
@endsection
