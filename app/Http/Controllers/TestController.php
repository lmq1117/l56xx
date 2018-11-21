<?php

namespace App\Http\Controllers;

use App\Jobs\CreateUser;
use App\User;
use Illuminate\Http\Request;
use Redis;

class TestController extends Controller
{
    //
    public function test()
    {
//        Redis::setEx('aaa');
        echo date('Y-m-d H:i:s') . '----' . microtime(true);
//        $res = Redis::setEx('name',60,'jack');
//        $res = Redis::get('name');
//        dd($res);

//        for ($i = 1; $i = 2; $i++) {
//            dispatch((new CreateUser())->onQueue('createTest'));
//            dispatch(new CreateUser());
//        }

        User::create(
            [
                'name' => mt_rand(1111111,9999999)
            ]
        );


    }
}
