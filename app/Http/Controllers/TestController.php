<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index (){
        $dpm = \App\dpm_rap::find(1);
        return view ('test',compact('dpm'));
    }
}
