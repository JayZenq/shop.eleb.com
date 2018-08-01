<?php

namespace App\Http\Controllers;

use App\Models\Users;
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
            if (Auth::user()->status && Auth::user()->shops->status){
                return redirect('/')->with('success','登录成功');
            }else{
                Auth::logout();
                session()->flash('danger','账号被禁用');
                return redirect()->back();
            }

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

    public function change(Users $user)
    {
        return view('session/change',compact('user'));
    }

    public function updates(Request $request,Users $user)
    {
        $this->validate($request,[
            'captcha'=>'required|captcha',
            'password'=>'required|confirmed',
            'old_password'=>'required'
        ],[
            'captcha.requires'=>'请输入验证码',
            'captcha.captcha'=>'验证码错误',
            'old_password.required'=>'旧密码不能为空',
            'password.required'=>'密码不能为空',
            'password.confirmed'=>'两次输入的密码不一致',
        ]);

        if (Auth::attempt([
            'name'=>$request->name,
            'password'=>$request->old_password
        ])){//旧密码验证成功
            $user->update([
                'password'=>bcrypt($request->password)
            ]);
            Auth::logout();
            return redirect('/')->with('success','修改成功')->withInput();
        }else{//旧密码错误
            session()->flash('danger','旧密码错误');
            return redirect()->back();
        }
//        $this->validate($request,[
//            $this->
//        ]);
    }
}
