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
    return redirect()->route('login');
});

Auth::routes();

Route::view('/home', 'pages.dashboard.main')->name('home');

Route::group(['middleware'=>'employee'],function(){
	Route::view('employee/dashboard','pages.dashboard.employee')->name('emp.dashboard');
});

Route::group(['middleware'=>'user'],function(){

	Route::post('item/supply','ItemController@supply')->name('item.supply');

	Route::view('report','pages.report.index')->name('report');
	Route::view('report/period','pages.report.period')->name('report.period');
	Route::get('report/room','ReportController@room')->name('report.room');
	Route::get('report/type','ReportController@type')->name('report.type');
	Route::post('report/room','ReportController@printroom')->name('report.printroom');
	Route::post('report/type','ReportController@printtype')->name('report.printtype');
	Route::post('report/period','ReportController@printperiod')->name('report.printperiod');
	Route::get('report/unreturned','ReportController@unreturned')->name('report.unreturned');

	Route::resources([
		'employee'=>'EmployeeController',
		'type'=>'TypeController',
		'room'=>'RoomController',
		'item'=>'ItemController',
		'maintenance'=>'MaintenanceController',
	]);
});

Route::group(['middleware'=>'all'],function(){
	Route::get('borrow/confirm/{borrow}','BorrowController@confirm')->name('borrow.confirm');
	Route::get('borrow/denied/{borrow}','BorrowController@denied')->name('borrow.denied');
	Route::get('borrow/cancel/{borrow}','BorrowController@cancel')->name('borrow.cancel');
	Route::get('borrow/detail/{borrow}','BorrowController@detail')->name('borrow.detail');

	Route::resources([
		'borrow'=>'BorrowController',
		'borrow_detail'=>'BorrowDetailController',
	]);
});

Route::get('emp/login','EmployeeAuth\LoginController@show')->name('emp.show');
Route::post('emp/login','EmployeeAuth\LoginController@login')->name('emp.login');
Route::post('emp/logout','EmployeeAuth\LoginController@logout')->name('emp.logout');



