<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public  function home(){

        $latest_propertis = Property::all();
//        $locations = Location::select(['id', 'name'])->get();
        $locations = Location::select(['id', 'name'])->get();

//        $latest = Property::all();
        return view('welcome',['latest_propertis'=>$latest_propertis,'locations' => $locations]);
    }
}
