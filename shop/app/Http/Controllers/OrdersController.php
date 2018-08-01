<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_goods;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    //订单列表
    public function index()
    {
        $orders =  Order::where('shop_id',Auth::user()->shop_id)->get();

        return view('order/index',compact('orders'));
    }

    //查看
    public function show(Order $order)
    {
        //根据订单id查询订单商品
        $order_goods = Order_goods::where('order_id',$order->id)->get();
        $order['order_goods']=$order_goods;

        return view('order/show',compact('order'));
    }

    //修改状态
    public function status(Request $request,Order $order)
    {
        $order->update([
            'status'=>$request->input('status')
        ]);
        return back();
    }

    //订单统计
    public function count(Request $request)
    {
        $count =[];
        $year = date('Y',time());
        $count['year'] =   Order::where('shop_id',Auth::user()->shop_id)->where('created_at','like',"%{$year}%")->count();
       $month = date('m',time());
        $count['month'] =   Order::where('shop_id',Auth::user()->shop_id)->where('created_at','like',"%{$month}%")->count();
        $day = date('d',time());
        $count['day'] =   Order::where('shop_id',Auth::user()->shop_id)->where('created_at','like',"%{$day}%")->count();
        return view('order/count',compact('count'));
    }

    //按年统计
    public function year(Request $request)
    {
        $year = $request->year;
        $count =   Order::where('shop_id',Auth::user()->shop_id)->where('created_at','like',"%{$year}%")->count();
        return view('order/year',compact('count','year'));
    }
    //按月统计
    public function month(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $count =   Order::where('shop_id',Auth::user()->shop_id)
            ->where('created_at','like',"%{$year}%")
            ->where('created_at','like',"%{$month}%")
            ->count();
        return view('order/month',compact('count','year','month'));
    }
    //按月统计
    public function day(Request $request)
    {
       $day =  $request->day;
        $count =   Order::where('shop_id',Auth::user()->shop_id)
            ->where('created_at','like',"%{$day}%")
            ->count();
        return view('order/day',compact('count','day'));
    }

    //菜品统计
    public function menu(Request $request)
    {
        $year = $request->year;
        $where = '';
        if ($year){
            $where = "and o.created_at like '%{$year}%'";
        }
        $shop_id = Auth::user()->shop_id;
//        dd($shop_id);
        $menus= DB::select("SELECT o.goods_name,sum(o.amount) as sum from order_goods as o  
                    JOIN menuses as m on m.id=o.goods_id
                    WHERE m.shop_id='{$shop_id}'
                    $where
                    GROUP BY o.goods_id
                    ORDER BY sum desc
                    LIMIT 0,5");

        return view('order/menu',compact('menus'));
    }
    //按月统计菜品
    public function menu_month(Request $request)
    {
        $year = $request->year;
        $month = $request->month;
        $months = $year.'-'.$request->month;
        $where = '';
        if ($year){
            $where = "and o.created_at like '%{$year}%'";
        }
        if ($months){
            $where = "and o.created_at like '%{$months}%'";
        }
        $day = $request->day;
        if ($day){
            $where = "and o.created_at like '%{$day}%'";
        }
        $shop_id = Auth::user()->shop_id;
//        dd($shop_id);
        $menus= DB::select("SELECT o.goods_name,sum(o.amount) as sum from order_goods as o  
                    JOIN menuses as m on m.id=o.goods_id
                    WHERE m.shop_id='{$shop_id}'
                    $where
                    GROUP BY o.goods_id
                    ORDER BY sum desc
                    LIMIT 0,5");

        return view('order/menu_month',compact('menus','year','month','day'));
    }
}
