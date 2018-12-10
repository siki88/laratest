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
    $hello = 'hello';
    $world = 'world';
    return view('welcome',[
                                'hello' => $hello,
                                'world' => $world,
                                ]);
});

Route::get('contact', function () {
    $hello = 'hello world';
    return view('welcome' , compact('hello'));
});

Route::get('about', function () {
    $hello = 'hello world';
    return view('welcome')
        ->with('text',$hello)
        ->with('world', 'world')
        // vytvori proměnou s názvem text
        ->withText($hello)
        // vytvori proměnnou s nazvem balls
        ->withBalls('ballím');
});


//RESPONSE JSON
Route::get('response', function () {
    return Response::json([
        "error" => true,
        "message"=> "this is shit response"
    ]);
});


Route::get('example', function () {
    return view('example');
});


Route::get('without', 'withoutRegistratonController@index');


//AUTH ROUTE
Auth::routes();


Route::get('home', 'HomeController@index')->name('home');




