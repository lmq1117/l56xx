<?php

namespace App\Http\Controllers\baseEloquentORM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BaseEloquentORM\User;
use App\Model\BaseEloquentORM\UserInfo;
use App\Model\BaseEloquentORM\Order;

class RelationController extends Controller
{
    //
    public function all()
    {
        return User::all();
    }

    public function hasOne()
    {
        $info = User::find(1)->userInfo;
        return $info;
    }

    public function belongsToForHasOne()
    {
        $user = UserInfo::find(4)->user;
        return $user;
    }

    public function hasMany()
    {
        $orders = User::find(4)->order;
        return $orders;
    }

    public function belongsToForHasMany()
    {
        $user = Order::find(5)->user;
        return $user;
    }

    public function hasManyWhereGet($user_id)
    {
        $orders = User::find($user_id)->order()->where('id','>',2)->get();
        return $orders;
    }


}
