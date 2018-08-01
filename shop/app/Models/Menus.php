<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    //

    protected  $fillable = ['goods_name','rating','shop_id','category_id','goods_price','description','month_sales','rating_count',
        'tips','satisfy_count','satisfy_rate','goods_img',
        ];
    //建立和商店的关系
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
        //Student::class ==== 'App\Models\Student'
    }
    //建立和分类的联系
    public function menucategory()
    {
        return $this->belongsTo(MenuCategories::class,'category_id');
        //Student::class ==== 'App\Models\Student'
    }

}
