<?php

namespace App\Http\Controllers\baseEloquentORM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BaseEloquentORM\User;
use App\Model\BaseEloquentORM\UserInfo;

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


}
