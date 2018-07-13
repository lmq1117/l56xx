<?php

namespace App\Model\BaseEloquentORM;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'base_eloquent_orm_orders';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Model\BaseEloquentORM\User','user_id','id');
    }
}
