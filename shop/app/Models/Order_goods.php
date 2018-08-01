<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_goods extends Model
{
    //
    public function menu()
    {
        return $this->belongsTo(Menus::class,'goods_id');
        //Student::class ==== 'App\Models\Student'
    }
}
