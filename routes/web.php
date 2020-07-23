<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|
*/


Route::prefix('/')->middleware('verifyAdmin')->group(function (){
    Route::get('dashboard','HomeController@index')->name('admin.dashboard');
    Route::get('logout','AdminController@logout')->name('admin.logout');
    Route::get('users','HomeController@allUsers')->name('admin.allUsers');
    Route::post('users','HomeController@addUser')->name('admin.addUser');
    Route::post('deleteUser','HomeController@deleteUser')->name('admin.deleteUser');
    Route::get('editUser/{id}','HomeController@editUser')->name('admin.editUser');
    Route::post('editUser','HomeController@editSelectedUser')->name('admin.editSelectedUser');
    Route::get('categories','CategoryController@index')->name('admin.categories');
    Route::post('categories','CategoryController@addCategory')->name('admin.addCategory');
    Route::post('removeCategory','CategoryController@removeCategory')->name('admin.removeCategory');
    Route::post('deleteCategory','CategoryController@deleteCategory')->name('admin.deleteCategory');
    Route::post('editCategory','CategoryController@editCategory')->name('admin.editCategory');
    Route::get('settings','SettingsController@index')->name('admin.settings');
    Route::post('settings/reset','SettingsController@resetUserPassword')->name('admin.resetPass');
    Route::get('user/methods','UserController@index')->name('admin.userMethods');
    Route::post('user/methods/txt','UserController@addTxtFile')->name('admin.addTxtFile');
    Route::post('user/methods/csv','UserController@addCSVFile')->name('admin.addCSVFile');
    Route::get('user/e-mail/{id}','MailController@sendCustomEmail')->name('admin.sendCustomEmail');
    Route::post('user/e-mail/','MailController@sendCustomEmailPost')->name('admin.sendCustomEmailPost');
    Route::get('group/e-mail/','MailController@mailGroup')->name('admin.mailGroup');
    Route::post('group/e-mail/','MailController@sendGroupMail')->name('admin.sendGroupMail');
    Route::get('timedMail/','MailController@timedMail')->name('admin.timedMail');
});


Route::prefix('/')->middleware('isVerified')->group(function (){
    Route::post('login','AdminController@login')->name('admin.login');
    Route::get('login','AdminController@index')->name('admin.loginPost');
});

