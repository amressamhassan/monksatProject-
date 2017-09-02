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

Route::get('/', 'HomeController@index')->name('home');


Route::get('/tenders','HomeController@tenders');
Route::get('/content/{id}','HomeController@content');
Route::get('/tendersbynewspaper/{id}','HomeController@tendersbynewspaper');
Route::get('/tendersbydate/{date}/{interested}','HomeController@tendersbydate');
Route::post('/subscriptionNews','HomeController@subscriptionNews');
Route::get('/admin','HomeController@admin');



Route::resource('/archive','ArchiveController');

Route::resource('subscribe','subcribeController');
Route::post('/subcribetion','subcribeController@subcribetion');

Route::resource('contact','ContactController');
//Route::resource('subscrib','subcribeController');

Route::resource('category','CategoryController');
Route::resource('country','CountryController');
Route::resource('item','ItemController');
Route::get('/seen','ItemController@seen');
Route::get('/enduser','ItemController@enduser');


Route::get('itemsend','ItemController@itemsend');
Route::post('sendtrener','ItemController@sendtrener');
Route::post('sendone','ItemController@sendone');


Route::resource('news','NewsController');
Route::resource('newspaper','NewspaperController');
Route::resource('pages','PagesController');
Route::resource('registration','RegistrationController');
Route::resource('setting','SettingController');

Route::resource('users','UsersController');
Route::get('/user/{act}','UsersController@user');
Route::get('/actvie/{actvie}','UsersController@actvie');
Route::get('/mes/{mes}','UsersController@mes');
Route::get('rest','UsersController@rest');



Route::resource('mail','MailController');
Route::get('/message_details/{id}','MailController@message_details');
