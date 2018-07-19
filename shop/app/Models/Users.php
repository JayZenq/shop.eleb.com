<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    //
    protected $fillable=['name','email','password','status','rememberToken','shop_id'];

    public function shops()
    {
        return $this->belongsTo(Shop::class,'shop_id');
        //Student::class ==== 'App\Models\Student'
    }
}
