@extends('default')

@section('contents')
    @include('_errors')
    <form action="{{route('login')}}" class="form-horizontal"  method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                {{--<input type="text" class="form-control" id="inputEmail3" placeholder="用户名" name="name" value="">--}}
                <input type="text" class="form-control" name="name" placeholder="用户名" id="inputEmail3">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"></label>
            <div class="col-sm-10">
                记住我:<input type="checkbox" name="rememberMe" value="1">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">验证码</label>
            <div class="col-sm-10">
                <input id="captcha" class="form-control" name="captcha" >
                <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">

            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
            </div>
        </div>
    </form>
@endsection