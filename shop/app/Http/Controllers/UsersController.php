<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Shop_categories;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class UsersController extends Controller
{
    //
    public function index()
    {
        return view('users/index');
    }

    public function create()
    {
        $categories= Shop_categories::all();
        return view('users/create',compact('categories'));
    }

    public function store(Request $request)
    {
        //数据验证
        $this->validate($request,[
            'shop_category_id'=>'required',
            'shop_name'=>'required',
            'shop_img'=>'required|image',
            'start_send'=>'required|numeric',
            'send_cost'=>'required|numeric',
            'discount'=>'required|max:100',
            'notice'=>'required|max:100',
            'brand'=>'required',
            'on_time'=>'required',
            'fengniao'=>'required',
            'bao'=>'required',
            'piao'=>'required',
            'zhun'=>'required',
            'name'=>'required',
            'password'=>'required|confirmed',
            'email'=>'required
            '
        ],[
            'shop_category_id.required'=>'请选择一个店铺分类',
            'shop_name.required'=>'店铺名不能为空',
            'shop_img.required'=>'请上传店铺图片',
            'shop_img.image'=>'店铺图片格式不正确',
            'start_send.required'=>'请填写起送金额',
            'start_send.numeric'=>'请填写正确起送金额',
            'send_cost.numeric'=>'请填写正确配送金额',
            'send_cost.required'=>'请填写配送金额',
            'discount.required'=>'请填写优惠信息',
            'discount.max'=>'优惠信息不得超过100个字',
            'notice.max'=>'店铺公告不得超过100个字',
            'notice.required'=>'请填写店铺公告',
            'brand.required'=>'请选择是否是品牌',
            'on_time.required'=>'请选择是否准时送达',
            'fengniao.required'=>'请选择是否蜂鸟配送',
            'bao.required'=>'请选择是否有保标记',
            'piao.required'=>'请选择是否有票标记',
            'zhun.required'=>'请选择是否有准标记',
            'name.required'=>'请输入商家名称',
            'email.required'=>'请输入邮箱',
            'password.required'=>'请输入密码',
            'password.confirmed'=>'两次密码不一致',
        ]);
        $file = $request->shop_img;
        $fileName = $file->store(\Illuminate\Support\Facades\Storage::url('public/logo'));
        DB::beginTransaction();
        try{
            $shop= Shop::create([
                'shop_category_id'=>$request->shop_category_id,
                'shop_name'=>$request->shop_name,
                'shop_img'=>url($fileName),
                'shop_rating'=>4,
                'brand'=>$request->brand,
                'on_time'=>$request->on_time,
                'fengniao'=>$request->fengniao,
                'bao'=>$request->bao,
                'piao'=>$request->piao,
                'zhun'=>$request->zhun,
                'start_send'=>$request->start_send,
                'send_cost'=>$request->send_cost,
                'notice'=>$request->notice,
                'discount'=>$request->discount,
                'status'=>0,
            ]);
            $shop_id = $shop->id;
            Users::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'shop_id'=>$shop_id,
                'status'=>0,
            ]);

            DB::commit();
        }catch (Exception $e){
            DB::roolback();
            throw $e;
        }
        session()->flash('success','添加成功');
        return redirect('users');
    }
}
