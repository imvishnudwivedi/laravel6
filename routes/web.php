<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'vidyaaarambha', 'namespace' => 'vidyaaarambha', 'middleware' => 'auth'], function () {
    Route::get('dashboard', ['as' => 'vidyaaarambha.dashboard', 'uses' => 'DashboardController@index']);
    


    Route::group(['prefix' => 'masters', 'namespace' => 'masters'], function () {


		Route::resource('home_slider', 'HomeSliderController');
	
		Route::resource('clients', 'ClientsController');
		
		Route::resource('seed', 'SeedController');
		Route::get('/seed/deactivate/{id}', ['as' => 'vidyaarambha.masters.seed.deactivate', 'uses' => 'SeedController@deactivate']);
	});
});






Route::group(['namespace' => 'website'], function () {

	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);

	Route::get('/about', ['as' => 'about', 'uses' => 'HomeController@about']);
	Route::get('/admission_form', ['as' => 'form', 'uses' => 'HomeController@admissionForm']);
	Route::get('/checklist', ['as' => 'checklist', 'uses' => 'HomeController@checklist']);
	Route::get('/faq', ['as' => 'faq', 'uses' => 'HomeController@faq']);
	Route::get('/news', ['as' => 'news', 'uses' => 'HomeController@news']);
	Route::get('/events', ['as' => 'events', 'uses' => 'HomeController@events']);
	Route::get('/gallery', ['as' => 'gallery', 'uses' => 'HomeController@gallery']);
	Route::get('/gallery/{id}', ['as' => 'gallery_photos', 'uses' => 'HomeController@gallery_photos']);
	Route::get('/contact', ['as' => 'contact', 'uses' => 'HomeController@contact']);
	Route::get('/appoinment', ['as' => 'appoinment', 'uses' => 'HomeController@appoinment']);
	 
	 Route::post('/contact',['as' => 'contact.post','uses'=>'HomeController@postContact']);



});