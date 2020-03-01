<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Api for inquiry form
Route::get('get-intake','Back\IntakeController@getIntake');
Route::get('get-course','Back\CourseController@getCourse')->name('get.course');

Route::get('get-check-in-detail/{id}','Back\OfficeCheckInController@checkInDetail');
//Route::get('get-check-in-update/{id}','Back\OfficeCheckInController@checkInUpdate');
Route::get('new-comment/{id}','Back\OfficeCheckInController@checkInComment');
Route::get('check-in-completed/{id}','Back\OfficeCheckInController@checkInCompleted');


Route::post('add-new-academic','Back\AjaxController@addNewAcademic');
Route::post('add-new-experience','Back\AjaxController@addNewExperience');

Route::post('add-new-product-fee-detail','Back\AjaxController@addNewProuductFeeDetail');
Route::post('update-product-fee-detail','Back\AjaxController@updateProductFeeDetail');

