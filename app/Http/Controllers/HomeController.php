<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pname = $this->properName(Auth::user()->name);
        return view('home', compact('pname'));
    }
    
    public function properName($string)
    {
        if(strpos($string, ' ')) {
            return ucfirst(strtolower(substr($string, 0, strpos($string, ' '))));
        } else {
            return ucfirst($string);
        }
        
    }
}
