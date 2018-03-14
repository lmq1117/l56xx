<?php
/**
 * composer组件化开发初探
 */
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
