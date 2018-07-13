<?php

namespace App\Model\BaseEloquentORM;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'base_eloquent_orm_users';
    public $timestamps = false;

    public function userInfo()
    {
        return $this->hasOne('App\Model\baseEloquentORM\UserInfo','user_id','id');
    }

}
