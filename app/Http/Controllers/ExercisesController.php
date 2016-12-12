<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Exercise;

class ExercisesController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        $type = $request['type'];
        $exercises = DB::table('exercises')->where('type', '=', $type)->get();
        
        return view('exercise',compact('exercises', 'type'));
    }
}
