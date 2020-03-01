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
    return view('front.pages.inquiry.inquiry-form');
});


Route::group(
    [
        'namespace'     => 'Auth',
    ],
    function (){
        Route::get('login','AdminLoginController@loginForm')->name('login');
        Route::post('login','AdminLoginController@login');
    }
);

Route::group(
    [
        'namespace'     => 'Back',
        'middleware'    => 'auth',
    ],
    function (){
        Route::get('/dashboard','DashboardController@admin');
        Route::resource('users','UserController');
        // for user search
        Route::get('user-search','UserController@search')->name('users.search');
        Route::get('u/{username}','DashboardController@myProfile')->name('profile');
        Route::resource('inquiry','InquiryController');
        Route::resource('offices','OfficeController');

        Route::resource('country','CountryController');
        Route::resource('partners','PartnersController');
        Route::resource('intake','IntakeController');

        //Course Related Route
        Route::resource('course','CourseController');
        Route::post('select-course','CourseController@showPartners');

        Route::resource('products','ProductController');

        //Exporting individual details of inquiries
        Route::get('export-inquiry/{token}','InquiryController@exportInquiryDetails')->name('export.inquiry');
        //product search
        Route::get('products-search', 'ProductController@search')->name('products.search');
        Route::resource('task','TaskController');
        /*****************CONFIGURATION ROUTE STARTED******************/
        Route::get('view-env','ConfigurationController@index')->name('env.show');
        Route::get('pusher-configuration','ConfigurationController@createPusher')->name('pusher.config');
        Route::post('pusher-configuration','ConfigurationController@storePusher');
        Route::get('mail-configuration','ConfigurationController@createMail')->name('mail.config');
        Route::post('mail-configuration','ConfigurationController@storeMail');

        /*****************CONFIGURATION ROUTE ENDED******************/
        /****************ASSIGN COUNSELOR STARTED*********************/
        Route::post('assign-counselor','AssignCounselorController@assignCounselor')->name('assign.counselor');
        Route::get('counselor-remove/{id}','AssignCounselorController@removeCounselor')->name('counselor.remove');
        /****************ASSIGN COUNSELOR ENDED***********************/
        /*******************FOLLOWUP STARTED*************************/
        Route::get('add-followup','FollowupController@createFollowup')->name('add.followup');
        Route::post('add-followup','FollowupController@addFollowup');
        Route::get('follow-ups','FollowupController@followup')->name('followup');
        Route::post('re-followups','FollowupController@reFollowUp');

        //follow up search
        Route::get('follow-up-search', 'FollowupController@search')->name('follow.up.search');
        Route::post('followup/{id}/delete','FollowupController@followupDelete')->name('followup.delete');
        Route::post('followup/result','FollowupController@followupResult')->name('followup.result');

        Route::get('office-check-in','OfficeCheckInController@OfficeCheckIn')->name('office.check.in');
        Route::post('office-check-in','OfficeCheckInController@addOfficeCheckIn');
        Route::post('change-assignee', 'OfficeCheckInController@changeAssignee')->name('change.assignee');
        Route::post('get-check-in-update/{id}','OfficeCheckInController@checkInUpdate')->name('check.in.update');
        Route::post('officeCheckIn/{id}/delete','OfficeCheckInController@checkInDelete')->name('officeCheckIn.delete');
        Route::post('check-applicant-status','OfficeCheckInController@checkApplicantStatus');
        //OfficeCheckIn search
        Route::get('office-check-in-search','OfficeCheckInController@search')->name('office.check.in.search');

        Route::get('office-check-in/{id}','OfficeCheckInController@officeCheckInShow')->name('officeCheckIn.show');
        Route::post('office-check-in/{id}','OfficeCheckInController@officeCheckInUpdateStatus');

        Route::get('edit-followup/{id}','FollowupController@editFollowup')->name('edit.followup');
        Route::post('edit-followup/{id}','FollowupController@editFollowupAction');
        /*******************FOLLOWUP ENDED*************************/

        /******************ACCOUNT ROUTE STARTED*****************/
        Route::get('invoice/list','AccountController@invoice')->name('invoice');
        Route::get('payment','AccountController@payment')->name('payment');
        /*******************ACCOUNT ROUTE ENDED******************/

        /**************REPORTS STARTED*******************************/
        Route::get('reports/inquiry','ReportController@inquiryReport')->name('report.inquiry');
        Route::get('export-pdf','ReportController@inquiryExportPdf')->name('export.pdf');
        Route::get('export-xlsx','ReportController@inquiryExportXlsx')->name('export.xlsx');
        /***************REPORTS ENDED*******************************/

        Route::get('logout','DashboardController@logout')->name('logout');
    }
);

