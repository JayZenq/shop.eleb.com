<?php

namespace App\Http\Controllers;

use App\Models\MenuCategories;
use App\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class MenusController extends Controller
{
    //菜品表
    public function index(Request $request)
    {
        //菜品分类的ID
        $key = [];
        $id=$request->id;
        $keyword=$request->keyword;
        $max=$request->max;
        $min=$request->min;
        if ($request->id){
            $key['id']=$request->id;
        }
        //判断是否有菜品分类的id传入
        $where = new Menus();
        if ($id){//有值传入
            $where= Menus::where('category_id',$id);
        }
        //判断是否有菜名关键字传入
        if ($request->keyword){//有
            $where = $where->where('goods_name','like',"%{$request->keyword}%");

        }
        //判断是否有价格区间传入
        if ($request->max && $request->min){
            $where = $where->whereBetween('goods_price',[$request->min,$request->max]);

        }elseif ($request->max != null){
            $where = $where->where('goods_price','<=',$request->max);
            $max=$request->max;
        }elseif($request->min != null){
            $where = $where->where('goods_price','>=',$request->min);
            $min=$request->min;
        }

        //只显示当前登录用户下的菜品
        $menuCategory = MenuCategories::where('shop_id',Auth::user()->shop_id)->get();
        $menus = $where->where('shop_id',Auth::user()->shop_id)->paginate(1);
        return view('menus/index',compact('menus','menuCategory','keyword','max','min','id'));
    }

    public function create()
    {
        $categories= MenuCategories::where('shop_id',Auth::user()->shop_id)->get();
        return view('menus/create',compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'goods_name'=>['required',Rule::unique('menuses')->where(function ($where){
                $where->where('shop_id',Auth::user()->shop_id);
            })],
            'goods_price'=>'required',
            'description'=>'required',
            'tips'=>'required',
        ],[
            'goods_name.required'=>'请填写菜品名',
            'goods_price.required'=>'请填写价格',
            'description.required'=>'请填写描述',
            'tips.required'=>'请填写提示信息',
            'goods_img.required'=>'请上传商品图片',
            'goods_name.unique'=>'该名称已存在',
        ]);
//        $storage= Storage::disk('oss');
//        $file= $storage->putFile('shop_categories',$request->goods_img);
//        $fileName = $storage->url($file);
        Menus::create([
            'goods_name'=>$request->goods_name,
            'rating'=>0,//评分初始默认为0
            'shop_id'=>Auth::user()->shops->id,//所属商家为登录用户的商家
            'category_id'=>$request->category_id,
            'goods_price'=>$request->goods_price,
            'description'=>$request->description,
            'month_sales'=>0,//月销量初始默认为0
            'rating_count'=>0,//评分数量初始默认为0
            'tips'=>$request->tips,
            'satisfy_count'=>0,//满意度数量初始为0
            'satisfy_rate'=>0,//满意度评分初始为0
            'goods_img'=>$request->logo,//绝对路径的图片地址

        ]);

        session()->flash('success','添加成功');
        return redirect('menus');
    }

    public function edit(Menus $menu)
    {
        $categories= MenuCategories::where('shop_id',Auth::user()->shop_id)->get();
        return view('menus/edit',compact('menu','categories'));
    }

    public function update(Request $request,Menus $menu)
    {
        $this->validate($request,[
            'goods_name'=>['required',Rule::unique('menuses')->where(function ($where){
                $where->where('shop_id',Auth::user()->shop_id);
            })->ignore($menu->id)],
            'goods_price'=>'required',
            'description'=>'required',
            'tips'=>'required',
        ],[
            'goods_name.required'=>'请填写菜品名',
            'goods_price.required'=>'请填写价格',
            'description.required'=>'请填写描述',
            'tips.required'=>'请填写提示信息',
            'goods_img.required'=>'请上传商品图片',
            'goods_name.unique'=>'该名称已存在',
        ]);
        //判断是否上传图片
        if ($request->logo){
            $fileName = $request->logo;
        }else{
            $fileName=$menu->goods_img;
        }

        $menu->update([
            'goods_name'=>$request->goods_name,
            'category_id'=>$request->category_id,
            'goods_price'=>$request->goods_price,
            'description'=>$request->description,
            'tips'=>$request->tips,
            'goods_img'=>$fileName,//绝对路径的图片地址
        ]);

        session()->flash('success','修改成功');
        return redirect('menus');
    }

    public function destroy(Menus $menu)
    {
        $menu->delete();
        session()->flash('success','删除成功');
        return redirect('menus');
    }
}
