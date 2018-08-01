<?php

namespace App\Http\Controllers;

use App\Models\MenuCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MenuCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',[
            'except'=>[]
        ]);
    }
    //菜品分类
    public function index()
    {//分类列表页
        $menucategories= MenuCategories::where('shop_id',Auth::user()->shop_id)->get();
//        $menucategories =   DB::table('menu_categories')->where('shop_id',Auth::user()->shop_id)->get();
       return view('menucategories/index',compact('menucategories'));
    }

    //分类添加页
    public function create()
    {
        return view('menucategories/create');
    }
    //添加保存页
    public function store(Request $request)
    {
//        $name =   DB::table('menu_categories')->where('shop_id',Auth::user()->shop_id)->get();
//        var_dump($name);
//        die();
//        if ($request->is_selected){
//            $num = DB::table('menu_categories')->where('is_selected','1')->where('shop_id',Auth::user()->shop_id)->get;
//            if ($num>0){
//                return back()->with('danger','只能有一个默认菜品分类');
//            }
//        }
        $this->validate($request,[
            'name'=>['required',Rule::unique('menu_categories')->where(function ($where){
                $where->where('shop_id',Auth::user()->shop_id);
            })],
            'description'=>'required',
//            'is_selected'=>['required',Rule::unique('menu_categories')->where(function ($where){
//                $where->where('shop_id',Auth::user()->shop_id);
//            })->where('is_selected',1)],
        'is_selected'=>'required'
        ],[
            'name.required'=>'请填写菜品分类名',
            'name.unique'=>'该菜品分类名已存在',
            'description.required'=>'请填写菜品分类描述',
            'is_selected.required'=>'请选择是否为默认分类',
//            'is_selected.unique'=>'只能有一个默认分类',
        ]);
        //判断是否重名
        if ($request->is_selected==1){
            $menucategories= MenuCategories::where('is_selected',1)->where('shop_id',Auth::user()->shop_id)->get();
            foreach ($menucategories as $menucategory){
                $menucategory->update([
                    'is_selected'=>0
                ]);
            }
        }
        $type_accumulation = str_random('18');
        MenuCategories::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'is_selected'=>$request->is_selected,
            'shop_id'=>Auth::user()->shops->id,
            'type_accumulation'=>$type_accumulation,
        ]);
        session()->flash('success','添加成功');
        return redirect('menucategories');
    }

    public function edit(MenuCategories $menucategory)
    {
        return view('menucategories/edit',compact('menucategory'));
    }

    public function update(Request $request,MenuCategories $menucategory)
    {
        $this->validate($request,[
            'name'=>['required',Rule::unique('menu_categories')->where(function ($where){
                $where->where('shop_id',Auth::user()->shop_id);
            })->ignore($menucategory->id)],
            'description'=>'required',
//            'is_selected'=>['required',Rule::unique('menu_categories')->where(function ($where){
//                $where->where('shop_id',Auth::user()->shop_id);
//            })->where('is_selected',1)],
        ],[
            'name.required'=>'请填写菜品分类名',
            'description.required'=>'请填写菜品分类描述',
            'is_selected.required'=>'请选择是否为默认分类',
            'is_selected.unique'=>'只能有一个默认分类',
            'name.unique'=>'该分类名已存在',
        ]);
        if ($request->is_selected==1){
            $menucategories= MenuCategories::where('is_selected',1)->where('shop_id',Auth::user()->shop_id)->get();
            foreach ($menucategories as $category){
                $category->update([
                    'is_selected'=>0
                ]);
            }
        }
        $menucategory->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'is_selected'=>$request->is_selected,
        ]);

        session()->flash('success','修改成功');
        return redirect('menucategories');
    }

    public function destroy(MenuCategories $menucategory)
    {
        //只能删除空菜品分类
        $num= DB::table('menuses')->where('category_id',$menucategory->id)->count();
        if (!$num){
            $menucategory->delete();
            return redirect('menucategories');
        }else{
            return back()->with('danger','只能删除空的菜品分类');
        }
    }


    public function show()
    {
        return view('menucategories/show');
    }
}
