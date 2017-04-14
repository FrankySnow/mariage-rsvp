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

Route::get('/', function(Illuminate\Http\Request $request) {
    if( $request->hasCookie('locale') ) {
    	App::setLocale( $request->cookie('locale') );
    }
	
    return view('accueil');
});

Route::get('{locale}', function($locale) {
	App::setLocale($locale);
    return response()
    	->view('accueil')
    	->cookie('locale', $locale, 100000);
})->where('locale','(fr|it)');