<?php

namespace App\Model\BaseEloquentORM;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'base_eloquent_orm_users';
    public $timestamps = false;

    public function userInfo()
    {
        return $this->hasOne('App\Model\BaseEloquentORM\UserInfo','user_id','id');
    }

    public function order()
    {
        return $this->hasMany('App\Model\BaseEloquentORM\Order','user_id','id');
    }

}
