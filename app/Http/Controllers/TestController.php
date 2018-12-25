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

        //$p = "MCAwDQYJKoZIhvcNAQEBBQADDwAwDAIFAOiJ7fECAwEAAQ==";
        //var_dump(base64_decode($p));
        //$x = "11765131597180061719853805040626920086035552770385761512145629821679310454873865156136222927699628631021878061690234829500448090074588537619448916930042637";
        //$y = "11745508774546028999380863207739450914908019316960216192273183194589794451160644136617047856364233416650723712534338475859421347973457230995904621035249247";
        //$mul = gmp_mul($x, $y);
        //$xy = gmp_strval($mul);
        //
        ////$y2 = gmp_div_q($xy,$x);
        //
        //dd(gmp_strval($xy));
        //
        //
        //$n16 = str_replace(' ', '', "00c4 c914 8f586a39 fb82 dcf2 78d9 e05a 2b7f 42fb 470044a4 dc73 b455 bf31 c8e6 b6c1 b713 a8dd6eea 88fb 8ebd 1c90 b411 50c9 53eb 6885101b 0001 e406 ac63 6574 8566 e4ad 45ac14d6 9d44 4bbe b51d c4c0 c51c 43b0 e5163b90 29a4 a965 30f5 e91f 8aea d216 43364c22 825c 15ab e164 5a3b 5e76 3aed cc2b26a7 0eeb a9fb a624 6acf d302");
        ////$n16 = str_replace(' ', '', "00c4 c914 8f586a39 fb82 dcf2 78d9 e05a 2b7f 42fb 470044a4 dc73 b455 bf31 c8e6 b6c1 b713 a8dd6eea 88fb 8ebd 1c90 b411 50c9 53eb 6885101b 0001 e406 ac63 6574 8566 e4ad 45ac14d6 9d44 4bbe b51d c4c0 c51c 43b0 e5163b90 29a4 a965 30f5 e91f 8aea d216 43364c22 825c 15ab e164 5a3b 5e76 3aed cc2b26a7 0eeb a9fb a624 6acf d302");
        //
        //$n10 = app(Transfer::class)->f16t10($n16);
        //dd($n10);

















        //echo gmp_strval($mul) . "\n";
        //dd(gmp_strval($mul));
//        Redis::setEx('aaa');
//        echo date('Y-m-d H:i:s') . '----' . microtime(true);
//        $res = Redis::setEx('name',60,'jack');
//        $res = Redis::get('name');
//        dd($res);

//        for ($i = 1; $i = 2; $i++) {
//            dispatch((new CreateUser())->onQueue('createTest'));
//            dispatch(new CreateUser());
//        }

        //User::create(
        //    [
        //        'name' => mt_rand(1111111,9999999)
        //    ]
        //);


    }
}
