<?php

use App\Models\signup;
use Illuminate\Support\Facades\Route;


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

Route::get('navbar', function () {
    return view('navbar');
});

Route::get('login', function () {
    return view('login');
});
Route::get('show', function () {
    return view('show');
});

Route::get('fileupload', function () {
    return view('fileupload');
});
Route::get('fav', function () {
    return view('fav');
});
Route::get('pvtpost', function () {
    return view('pvtpost');
});

//*******************FORM_SAVE ROUTE USED FOR REGISTERATION OF USER***********************/
Route::Post('form_save','App\Http\Controllers\dcontroller@sign');

//*******************LOGIN_FORM ROUTE USED FOR AUTHENTICATION OF USER***********************/
Route::Post('login_form','App\Http\Controllers\dcontroller@login');

//*******************UPLOAD ROUTE USED FOR UPLOADING USER FILE***********************/
Route::Post('upload','App\Http\Controllers\dcontroller@upload_file');

//*******************HOME ROUTE USED FOR DISPLAYING USER RECORD***********************/
Route::get('home','App\Http\Controllers\dcontroller@display');

//*******************SHOW{ID}ROUTE USED FOR INCREASING VIEW  ON USER POST***********************/
Route::get('show{id}','App\Http\Controllers\dcontroller@showpic');

//*******************FORM_DATA ROUTE USED FOR UPLOADING FAVRT POST***********************/
Route::Post('form_data','App\Http\Controllers\dcontroller@favourite');

//*******************FAV ROUTE USED FOR DISPLAYING FVRT POST***********************/
Route::get('fav','App\Http\Controllers\dcontroller@showfav');

//*******************PVTPOST{ID} ROUTE DELETEING POST***********************/
Route::get('pvtpost/{id}','App\Http\Controllers\dcontroller@deletedata');

//*******************PVTPOST{ID} ROUTE USED FOR DISPLAYING FVRT POST***********************/
Route::get('pvtpost{id}','App\Http\Controllers\dcontroller@pvtpics');

//*******************FORM_BACK ROUTE USED FOR LOGOUT OF USER ***********************/
Route::get('form_back','App\Http\Controllers\dcontroller@account');

//*******************COMMENT_FORM{ID} ROUTE USED FOR COMMENTING ON USERS POSTS ***********************/
Route::post('comment_form{id}','App\Http\Controllers\dcontroller@comment_data');







