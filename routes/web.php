<?php

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

// Route::get('/', function () {
//     $date=[];//هذا الطريقه الثانيه افضل من الطريقه الاواله
//     $data['id']=5;
//     $data['name'] = 'Bashar';
//     return view('welcome', $data);//-> with(['string' => 'Bashar' , 'age' => 27]);//هذا الطريقه الاوله بس طريقه الثانيه افضل
// });

// Route::get('index','Front\UserController@getIndex');


// Route::get('/test1', function () {
//     return 'Welcome';
// });


// Route::get('/landing', function () {
//     return view('landing');
// });

// Route::get('/about', function () {
//     return view('about');
// });


// Route::get('/show-number/{id}', function ($id) {
//     return $id;
// })-> name('a');

// Route::get('/show-string{id?}', function () {
//     return 'Welcome';
// })-> name('b');

// /*
// Route::namespace('Front')->group(function(){

//     Route::get('users','UserController@showUserName');
// });*/


// Route::group(['prefix' => 'users'],function(){// من نفسه هذا حق الملفات users اعمل هذا يكتلك  users/showهذا بدل ما تعمل

//     Route::get('/',function(){
//         return 'work';
//     });
//     Route::get('show', 'UserController@showUserName');
//     Route::delete('delete', 'UserController@showUserName');
//     Route::get('edit', 'UserController@showUserName');
//     Route::put('update', 'UserController@showUserName');
// });




// Route::group(['namespace' => 'Admin'], function(){//   من نفسه هذا حق المجلدات Admin اعمل هذا يكتلك  Admin/showهذا بدل ما تعمل

//     Route::get('second1','SecondController@showString1')->middleware('auth');//Login اول ما احاول ادخل الموقع عبر اللينك يحولي الي صفحه middleware
//     Route::get('second2','SecondController@showString2');
//     Route::get('second3','SecondController@showString3');
// });

// Route::get('login',function(){
//     return 'Must Br Login To access this Route';
// }) -> name('login');//loginهذا صفحه

// //Route::get('users','UserController@index');


// Route::resource('news','NewsController');
// Auth::routes();
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home') -> middleware('verified');

Route::get('/', function(){
    return 'home';

});

Route::get('/dashboard',function(){
    return 'dashboard';
});

Route::get('/redirect/{service}','SocialController@redirect');

Route::get('/callback/{service}','SocialController@callback');
