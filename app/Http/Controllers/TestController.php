<?php

namespace App\Http\Controllers;

use App\Jobs\CreateUser;
use App\Services\Com\Transfer;
use App\User;
use Illuminate\Http\Request;
use Redis;

class TestController extends Controller
{
    //
    public function test()
    {

        $n16 = "e889edf1";
        $e16 = "010001";
        $d16 = "52bfa529";
        $p16 = "f86f";
        $q16 = "ef9f";

        echo '$n10 '.base_convert($n16,16,10)."</br>";
        echo '$e10 '.base_convert($e16,16,10)."</br>";
        echo '$d10 '.base_convert($d16,16,10)."</br>";
        echo '$p10 '.base_convert($p16,16,10)."</br>";
        echo '$q10 '.base_convert($q16,16,10)."</br>";












    }
}
