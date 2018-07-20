<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    //

    public function login()
    {//登录页面
        return view('session/login');
    }

    public function store(Request $request)
    {//验证
        $this->validate($request,[
            'name'=>'required',
            'password'=>'required',
            'captcha'=>'required|captcha',
        ],[
            'name.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
            'captcha.required'=>'请输入验证码',
            'captcha.captcha'=>'验证码错误',
        ]);

        if ( Auth::attempt([
            'name'=>$request->name,
            'password'=>$request->password
        ],$request->rememberMe)){//认证成功
            return redirect('/')->with('success','登录成功')->withInput();
        }else{
            session()->flash('danger','用户名或密码错误');
            return redirect()->back();
        }
    }

    //退出
    public function destroy()
    {
        Auth::logout();
        return redirect('/')->with('success','注销成功');
    }
}
