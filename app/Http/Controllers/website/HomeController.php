<?php

namespace App\Http\Controllers\website;

use App;
use App\Http\Controllers\Controller;




use DB;

use Illuminate\Http\Request;
use Mail;
use Redirect;

class HomeController extends Controller {

	public function index() {

		return view('welcome');
	}

	public function home() {
	
		return view('website.index');
	}

	public function about() {


		return view('website.about');
	}
	public function checklist() {
		

		return view('website.checklist');
	}
	public function faq() {
		

		return view('website.faq');
	}

	public function admissionForm() {
		return view('website.admission_form');
	}

	public function gallery() {
		
		return view('website.gallery');
	}

	public function news()
	
	{
		
		 
		
		return view('website.news');

	}

	public function events()
	
	{
		 
	

		return view('website.events');

	}


	
	public function contact() {
		return view('website.contact');
	}


	

}

