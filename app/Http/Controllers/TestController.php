<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TestController extends Controller
{

    public function rds()
    {
        $user = Redis::get('name');
        return $user;
    }
}
