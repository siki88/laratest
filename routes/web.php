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

//AUTH ROUTE
Auth::routes();


Route::get('home', 'HomeController@index')->name('home');
Route::get('home/{id}', 'PlayListController@deleteSong');
Route::post('home', 'UploadMp3Controller@index');


//MY TEST
Route::resource('task','TasksController');
/*
 *         GET|HEAD  | post                   | post.index       | App\Http\Controllers\HomeController@index                              | web,auth     |
|        | POST      | post                   | post.store       | App\Http\Controllers\HomeController@store                              | web,auth     |
|        | GET|HEAD  | post/create            | post.create      | App\Http\Controllers\HomeController@create                             | web,auth     |
|post/id | GET|HEAD  | post/{post}            | post.show        | App\Http\Controllers\HomeController@show                               | web,auth     |
|        | PUT|PATCH | post/{post}            | post.update      | App\Http\Controllers\HomeController@update                             | web,auth     |
|        | DELETE    | post/{post}            | post.destroy     | App\Http\Controllers\HomeController@destroy                            | web,auth     |
|post/id/| GET|HEAD  | post/{post}/edit       | post.edit        | App\Http\Controllers\HomeController@edit                               | web,auth     |

 */

