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

Route::match(['get', 'post'],'/admin', 'AdminController@login');
Route::get('/admin/dashboard', 'AdminController@dashboard');


Route::get('/admin/dashboard/google_pie_chart','LaravelGoogleGraph@index');
Route::get('/admin/dashboard/google_line_chart','LaravelGoogleGraph@linechart');
Route::get('/admin/dashboard/google_sankey_chart','LaravelGoogleGraph@sankeychart');
Route::get('/admin/dashboard/sum_plength','LaravelGoogleGraph@SumPlength');
Route::get('/admin/dashboard/google_annotiation_chart','LaravelGoogleGraph@AnnotiationChart');


Route::get('/admin/dashboard/google_data_table','LaravelGoogleGraph@googleDataTable');

Auth::routes();

Route::get('/home', 'HomeController@index') ->name('home');

 