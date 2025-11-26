<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperviseurController extends Controller
{
    public function superviseur($num){
        return view('superviseur', ['num' => $num]);
    }
}
