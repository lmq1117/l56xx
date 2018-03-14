<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisTestController extends Controller
{
    //
    public function redisTest(){
        Redis::set('date','2018-03-14');
    }
}
