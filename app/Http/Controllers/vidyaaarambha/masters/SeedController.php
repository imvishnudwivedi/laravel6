<?php

namespace App\Http\Controllers\vidyaarambha\masters;

use Illuminate\Http\Request;
use App\Models\masters\Seed;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seed = DB::table('seeds AS sri')
        ->leftjoin('users AS u', 'sri.created_by', '=', 'u.id')
      
        ->select('sri.*', 'u.name as created_by', 'u.name as updated_by')
        ->orderby('sri.id', 'DESC')
        ->get();

    return view('vidyaarambha.masters.seed.index')->with('seed', $seed);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vidyaarambha.masters.seed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      	// dd($request->all());
		$check_name_exists = Seed::where('name', $request->name)->first();

		if ($check_name_exists) {
			return redirect()->back()->with('message', 'Name already exist')->with('er_type', 'danger');
		}

		// $request['created_by']=Auth::user()->id;
		$seed = Seed::create($request->all());

	
		$seed->update($request->all());

		return redirect()->route('vidyaarambha.masters.seed.index')->with('message', 'Successfully Added')->with('er_type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seed = DB::table('seeds')->where('id', $id)->first();

		if ($seed) {
			return view('vidyaarambha.masters.seed.show')->with('seed', $seed);
		}
		// else{

		//    return redirect()->route('vidyaarambha.masters.seed.index')->with('message','Cannot Edit Deactivated Terms & Condition')->with('er_type','danger');
		// }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seed = Seed::where('id', $id)->where('deleted_at', '=', NULL)->first();

		if ($seed) {
			return view('vidyaarambha.masters.seed.edit')->with('seed', $seed);
		} else {

			return redirect()->route('vidyaarambha.masters.seed.index')->with('message', 'Cannot Edit Deactivated Terms & Condition')->with('er_type', 'danger');
		}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seed = Seed::where('id', '=', $id)->first();

		// $request['updated_by']=Auth::user()->id;

		
		$seed->update($request->all());

		return redirect()->route('vidyaarambha.masters.seed.index')->with('message', 'Successfully Updated')->with('er_type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deactivate($id)
    {
        $seed = Seed::where('id', '=', $id)->first();
		if ($seed) {
			$seed->delete();

			return redirect()->route('vidyaarambha.masters.seed.index')->with('message', 'Successfully deactivated')->with('er_type', 'danger');
		} else {
			$seed = Seed::onlyTrashed()->where('id', '=', $id)->first();
			$seed->restore();

			return redirect()->route('vidyaarambha.masters.seed.index')->with('message', 'Successfully activated')->with('er_type', 'success ');
		}
    }
}
