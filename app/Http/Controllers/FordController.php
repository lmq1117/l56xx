<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ford\Fusion\Fusion2018;
class FordController extends Controller
{
    //
    public function index ()
    {
        Fusion2018::info();
    }
}
