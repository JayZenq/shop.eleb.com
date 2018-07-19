<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    //
    protected  $fillable = ['shop_category_id','shop_name','shop_img','shop_rating','brand','on_time','fengniao','bao','piao','zhun','start_send','send_cost','notice','discount','status'];
    //建立和文章类的关系 一对多（反向）
    public function shop_categories()
    {
        return $this->belongsTo(Shop_categories::class,'shop_category_id');
        //Student::class ==== 'App\Models\Student'
    }
}
