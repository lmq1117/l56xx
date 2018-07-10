<?php

namespace App\Http\Controllers\baseEloquentORM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\BaseEloquentORM\Flight;

class FlightController extends Controller
{
    //
    public function all()
    {
        $flights = Flight::all();
        foreach ($flights as $flight)
        {
            echo $flight->flight_no . ' | ';
            echo $flight->take_off_time . ' | ';
            echo $flight->landing_time . ' | ';
            echo $flight->departure . ' | ';
            echo $flight->destination . ' | ';
        }
    }
}
