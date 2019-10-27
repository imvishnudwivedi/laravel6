<?php

namespace App\Http\Controllers\vidyaaarambha\masters;

use Illuminate\Http\Request;
use App\Models\masters\HomeSlider;
use App\Models\masters\Keyword;
use App\Models\masters\ItemKeywords;

use App\Models\Notification;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Redirect;
use Auth;
use Input;

class HomeSliderController extends Controller
{



  public function index()
  {

    $home_slider=DB::table('home_slider as i')
    ->join('users AS u','i.created_by','=','u.id')
    ->leftjoin('users AS u1','i.updated_by','=','u1.id')
    
    ->select('i.*','u1.name as created_by','u1.name as updated_by')
    ->orderBy('i.id','ASC')
    ->get();



   
    return view('vidyaaarambha.masters.home_slider.index')->with('home_slider',$home_slider);
  }


  public function create(Request $request)
    {

   

       return view('vidyaaarambha.masters.home_slider.create');

    }


  }
