<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public  function home(){

        $latest_propertis = Property::all();
//        $latest = Property::all();
        return view('welcome',['latest_propertis'=>$latest_propertis]);
    }
}
