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
    return view('auth/login');
});

Route::post('/register', 'RegisterController@register');
//Route::get('/register', function(){
//    return view('auth.register');
//});
Route::post('/login', 'LoginController@login');
Route::get('/dash',function(){
    return view('index');
})->middleware('verifylogin');
Route::get('/logout',function (){
    Session::flush();
    return redirect('/');
});
Route::post('/punchin','AttendanceController@punchIn');
Route::post('/punchout','AttendanceController@punchOut');
Route::get('/adduser',function(){
   return view('auth.register');
});
Route::post('/viewattendance','AttendanceController@view');
Route::get('/attendance',function(){
    $users = \App\User::all();
   return view('admin.viewattendance',compact('users'));
})->middleware(['verifylogin','isAdmin']);

Route::get('/user','UserController@show');
Route::get('/profile',function (){
    return view('auth.resetpass');
});
Route::post('/reset','ResetController@reset');