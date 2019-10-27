<?php

namespace App\Http\Controllers\vidyaaarambha\masters;
use App\Http\Controllers\Controller;
use App\Models\masters\Clients;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Redirect;

class ClientsController extends Controller {
	public function __construct() {

	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$clients = DB::table('clients AS pri')
			->leftjoin('users AS u', 'pri.created_by', '=', 'u.id')
			->leftjoin('users AS u1', 'pri.updated_by', '=', 'u1.id')
			->select('pri.*', 'u.name as created_by', 'u.name as updated_by')
			->orderby('pri.id', 'DESC')
			->get();

		return view('vidyaaarambha.masters.clients.index')->with('clients', $clients);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function create() {

		return view('vidyaaarambha.masters.clients.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */

	public function uploadClientsImg(Request $request) {
		// dd($request->file());

		if ($request->file('file_name')) {

			//upload an image to the /img/tmp directory and return the filepath.
			$file = Input::file('file_name');
			$tmpFilePath = 'vidyaaarambha/image/clients/';
			$extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

			$tmpFileName = time() . '.' . $extension;
			$file = $file->move($tmpFilePath, $tmpFileName);
			$path = $tmpFileName;

			$file_path = getClientsUploadedTmpPath($path);

			// dd($file_path);
			return response()->json(array('path' => $file_path), 200);
		} else {
			return response()->json(false, 200);
		}

	}

	public function store(Request $request) {
		// dd($request->all());
		$check_name_exists = Clients::where('name', $request->name)->first();

		if ($check_name_exists) {
			return redirect()->back()->with('message', 'Name already exist')->with('er_type', 'danger');
		}

		// $request['created_by']=Auth::user()->id;
		$clients = Clients::create($request->all());

		if ($request->file('file_name')) {
			$file = $request->file('file_name');

			$FilePath = 'vidyaaarambha/image/clients/' . $clients->id . '/';
			$FileName = time() . '-' . $file->getClientOriginalName();
			$file = $file->move($FilePath, $FileName);
			$path = $FilePath . $FileName;
			$request['image'] = $path;
		}
		$clients->update($request->all());

		return redirect()->route('vidyaaarambha.masters.clients.index')->with('message', 'Successfully Added')->with('er_type', 'success');
	}

	public function upload(Request $request) {
		// dd($request->all());

		$file = Input::file('image_file');
		$extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);

		if ($extension == "png" || $extension == "jpeg" || $extension == "jpg" || $extension == "JPG") {
			$file_name = (time() + rand(0, 1500000) - rand(0, 1500000) * 977) . '.' . "jpeg";
			$file_path = 'agritrade/images/' . $request->store_folder;
			$file->move($file_path, $file_name);
			return $file_name;
		} else {
			return 0;
		}
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

		$clients = DB::table('clients')->where('id', $id)->first();

		if ($clients) {
			return view('vidyaaarambha.masters.clients.show')->with('clients', $clients);
		}
		// else{

		//    return redirect()->route('vidyaaarambha.masters.principals.index')->with('message','Cannot Edit Deactivated Terms & Condition')->with('er_type','danger');
		// }
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$clients = Clients::where('id', $id)->where('deleted_at', '=', NULL)->first();

		if ($clients) {
			return view('vidyaaarambha.masters.clients.edit')->with('clients', $clients);
		} else {

			return redirect()->route('vidyaaarambha.masters.clients.index')->with('message', 'Cannot Edit Deactivated Terms & Condition')->with('er_type', 'danger');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		// dd($request->all());

		$clients = Clients::where('id', '=', $id)->first();

		// $request['updated_by']=Auth::user()->id;

		if ($request->file('file_name')) {
			$file = $request->file('file_name');

			$FilePath = 'vidyaaarambha/image/clients/' . $clients->id . '/';
			$FileName = time() . '-' . $file->getClientOriginalName();
			$file = $file->move($FilePath, $FileName);
			$path = $FilePath . $FileName;
			$request['image'] = $path;
		}

		$clients->update($request->all());

		return redirect()->route('vidyaaarambha.masters.clients.index')->with('message', 'Successfully Updated')->with('er_type', 'success');

	}

	public function deactivate($id) {
		$clients = Clients::where('id', '=', $id)->first();
		if ($clients) {
			$clients->delete();

			return redirect()->route('vidyaaarambha.masters.clients.index')->with('message', 'Successfully deactivated')->with('er_type', 'danger');
		} else {
			$clients = clients::onlyTrashed()->where('id', '=', $id)->first();
			$clients->restore();

			return redirect()->route('vidyaaarambha.masters.clients.index')->with('message', 'Successfully activated')->with('er_type', 'success ');
		}
	}
}
s