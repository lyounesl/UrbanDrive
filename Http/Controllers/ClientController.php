<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller {

    public function consulter( $num ){
        return view('client', ['num' => $num]);
 }
}