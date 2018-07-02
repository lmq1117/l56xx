<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ShowProfileController extends Controller
{
    //
    public function __invoke($id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    }
}
