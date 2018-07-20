@extends('default')

@section('contents')
    <h2>修改密码</h2>
    @include('_errors')
    <form action="{{route('update',[$admin])}}" class="form-horizontal"  method="post" >
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" placeholder="用户名" name="name" value="{{$admin->name}}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">旧密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputEmail3" placeholder="旧密码" name="old_password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="新密码" name="password">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">确认新密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword3" placeholder="确认新密码" name="password_confirmation">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">输入验证码</label>
            <div class="col-sm-10">
                <input id="captcha" class="form-control" name="captcha"  placeholder="输入验证码">
                <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
            </div>
        </div>
        <div class="form-group">


        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{csrf_field()}}
                {{method_field('PATCH')}}
                <button type="submit" class="btn btn-primary btn-lg btn-block">修改密码</button>
            </div>
        </div>
    </form>
@endsection

