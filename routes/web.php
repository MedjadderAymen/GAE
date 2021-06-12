<?php

use App\defence;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(["register"=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(["auth"])->group(function (){

    Route::get('/students','StudentController@index')->name("students");
    Route::post('/student','StudentController@store')->name("student");
    Route::get('/student/{student}','StudentController@destroy')->name("student.delete");
    Route::get('/student/edit/{student}','StudentController@edit')->name("student.edit");
    Route::post('/student/update/{student}','StudentController@update')->name("student.update");

    Route::get('/searchDomains','SearchDomainController@index')->name("searchDomains");
    Route::post('/searchDomain','SearchDomainController@store')->name("searchDomain");
    Route::get('/searchDomain/{searchDomain}','SearchDomainController@destroy')->name("searchDomain.delete");
    Route::get('/searchDomain/edit/{searchDomain}','SearchDomainController@edit')->name("searchDomain.edit");
    Route::post('/searchDomain/update/{searchDomain}','SearchDomainController@update')->name("searchDomain.update");

    Route::get('/teachers','TeacherController@index')->name("teachers");
    Route::post('/teacher','TeacherController@store')->name("teacher");
    Route::get('/teacher/{teacher}','TeacherController@destroy')->name("teacher.delete");
    Route::get('/teacher/edit/{teacher}','TeacherController@edit')->name("teacher.edit");
    Route::post('/teacher/update/{teacher}','TeacherController@update')->name("teacher.update");

    Route::get('/defences','DefenceController@index')->name("defences");
    Route::post('/defence','DefenceController@store')->name("defence");
    Route::get('/defence/{defence}','DefenceController@destroy')->name("defence.delete");
    Route::get('/defence/edit/{defence}','DefenceController@edit')->name("defence.edit");
    Route::post('/defence/update/{defence}','DefenceController@update')->name("defence.update");

    Route::get('/affectation/{defence}','AffectationController@create')->name("affectation");
    Route::post('/affectation/{defence}','AffectationController@store')->name("affectation");
    Route::post('/affectation/update/{defence}','AffectationController@update')->name("affectation.update");
    Route::get('/affectation/delete/{defence}','AffectationController@destroy')->name("affectation.delete");

});


