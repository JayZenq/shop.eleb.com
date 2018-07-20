<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use Notifiable;
    //
    protected $fillable=['name','email','password','status','rememberToken','shop_id'];

    public function shops()
    {
        return $this->belongsTo(Shop::class,'shop_id');
        //Student::class ==== 'App\Models\Student'
    }
}
