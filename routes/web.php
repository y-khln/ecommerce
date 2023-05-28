<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', 'App\Http\Controllers\UserController@index');
Route::get('/about', 'App\Http\Controllers\UserController@about');
Route::get('/command', 'App\Http\Controllers\UserController@command');
Route::get('/contacts', 'App\Http\Controllers\UserController@contacts');
Route::get('/price', 'App\Http\Controllers\PriceController@index') -> name('price.index');
Route::get('/schedule', 'App\Http\Controllers\ScheduleController@getScheduleFromDate');
Route::post('/schedule/get', 'App\Http\Controllers\ScheduleController@getScheduleFromDate')->name('schedule.get');
Route::post('/schedule', 'App\Http\Controllers\ScheduleController@store')->name('schedule.store');
Route::get('/preschedule', 'App\Http\Controllers\ScheduleController@getPrescheduule')->name('preschedule');
Route::post('/afterschedule', 'App\Http\Controllers\ScheduleController@getAfterscheduule')->name('afterschedule');
Route::post('/finalschedule', 'App\Http\Controllers\ScheduleController@finish')->name('finish');
Route::post('/filling', 'App\Http\Controllers\ScheduleController@SaveData')->name('filling');
Route::post('/schedule/get', 'App\Http\Controllers\ScheduleController@getScheduleFromDate')->name('schedule.get');


Route::get('user.admin/{id}', 'App\Http\Controllers\EmployeeController@delete')->name('employee.delete');
Route::post('/admin', [\App\Http\Controllers\EmployeeController::class, 'save'])->name('employee.save');
Route::get('/scheduleDelete{id}', [\App\Http\Controllers\ScheduleController::class, 'deleteSchedule'])->name('schedule.delete');
Route::post('/scheduleNew', [\App\Http\Controllers\ScheduleController::class, 'saveSchedule'])->name('schedule.save');
Route::name('price.')->group(function(){
    Route::post('/priceNew', [\App\Http\Controllers\PriceController::class, 'save'])->name('save');
    Route::get('/priceDelete{id}', [\App\Http\Controllers\PriceController::class, 'delete'])->name('delete');
});

Route::name('user.')->group(function(){
    Route::get('/admin', 'App\Http\Controllers\AdminController@index')->middleware('auth')->name('admin');
    Route::get('/login', function(){
        if(Auth::check()){
            return redirect(route("user.admin"));
        }
        return view('login');
    })->name('login');

    Route::get('/registration', function(){
        if(Auth::check()){
            return redirect(route("user.admin"));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration',[\App\Http\Controllers\RegisterController::class, 'save']);
    Route::post('/login', [\App\Http\Controllers\LoginController::class, 'login']);
    Route::get('/logout', function (){
        Auth::logout();
        return redirect('/');
    })->name('logout');
});






