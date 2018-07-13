<?php

namespace App\Model\BaseEloquentORM;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'base_eloquent_orm_user_info';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\baseEloquentORM\User','user_id','id');
    }

}
