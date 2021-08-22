<?php


use App\Http\Controllers\SendEmailController;
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


Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');


 Auth::routes();


 Route::get('/owner/register', [App\Http\Controllers\Auth\RegisterController::class, 'showFormOwner'])->name('owner.register');
 Route::get('/tenant/register', [App\Http\Controllers\Auth\RegisterController::class, 'showFormTenant'])->name('tenant.register');


Route::group(['middleware' => ['isAdmin'],'prefix' => 'admin'], function () {
    Route::get('/dashboard',[App\Http\Controllers\AdminController::class,'showDashboard'])->name('admin.dashboard');
    Route::get('/profile',[App\Http\Controllers\AdminController::class,'showProfile'])->name('admin.profile');
    Route::post('/profile',[App\Http\Controllers\AdminController::class,'profileSave']);
    Route::get('/change-password',[App\Http\Controllers\AdminController::class,'showChangePassword'])->name('admin.changepassword');
    Route::post('/change-password-save',[App\Http\Controllers\AdminController::class,'ChangePasswordSave'])->name('admin.changepassword.save');

    Route::get('/add-owner',[App\Http\Controllers\AdminController::class,'ShowAddOwner'])->name('admin.showAddOwner');
    Route::post('/save-owner',[App\Http\Controllers\AdminController::class,'ShowAddOwnerSave'])->name('admin.showAddOwner.save');
    Route::get('/list-owner',[App\Http\Controllers\AdminController::class,'ShowListOwner'])->name('admin.showListOwner');

   //meeting
   Route::get('/meetings',[App\Http\Controllers\AdminController::class,'showmeeting'])->name('admin.meeting');
    //resource
    Route::resource('tag','Admin\TagController');
    Route::resource('house','Admin\HouseController');
    Route::resource('group','Admin\GroupController');
    Route::resource('owner','Admin\OwnerController');
    Route::resource('application','Admin\ApplicationController');
    Route::resource('interview','Admin\InterviewController');
    Route::post('/house/delete-image-front',[App\Http\Controllers\Admin\HouseController::class,'delete_image_front']);
    Route::post('/house/edit-flooer',[App\Http\Controllers\Admin\HouseController::class,'edit_flooer'])->name('admin.edit-flooer');

    Route::get('/house/delete-flooer/{id}',[App\Http\Controllers\Admin\HouseController::class,'delete_flooer'])->name('admin.delete-flooer');
    Route::post('/house/flooer/create',[App\Http\Controllers\Admin\HouseController::class,'create_flooer'])->name('admin.create-flooer');
    Route::post('/zoom/create',[App\Http\Controllers\Admin\ZoommeetingController::class,'store'])->name('admin.zoom-create');
    Route::PATCH('/zoom/edit',[App\Http\Controllers\Admin\ZoommeetingController::class,'update'])->name('admin.zoom-edit');
});


Route::group(['middleware' => ['isOwner'],'prefix' => 'owner'], function () {
    Route::get('/dashboard',[App\Http\Controllers\OwnerController::class,'showDashboard'])->name('owner.dashboard');

    // all houses
    Route::resource('house','Owner\HouseController');

    // Edit or delete house from owner
    Route::post('/house/delete-image-front',[App\Http\Controllers\Owner\HouseController::class,'delete_image_front']);
    Route::post('/house/edit-flooer',[App\Http\Controllers\Owner\HouseController::class,'edit_flooer'])->name('owner.edit-flooer');
    Route::get('/house/delete-flooer/{id}',[App\Http\Controllers\Owner\HouseController::class,'delete_flooer'])->name('owner.delete-flooer');
    Route::post('/house/flooer/create',[App\Http\Controllers\Owner\HouseController::class,'create_flooer'])->name('owner.create-flooer');

    //  test send mail form gmail to another gmail
    Route::get('/mail/send',[App\Http\Controllers\Owner\MailController::class,'send_mail'])->name('owner.send-mail');

    //Meeting
    Route::get('/meeting',[App\Http\Controllers\OwnerController::class,'showmeeting'])->name('owner.meeting');
    Route::delete('/meeting/{id}',[App\Http\Controllers\OwnerController::class,'deletemeeting'])->name('owner.deletemeeting');
    Route::put('/meeting/update/{id}',[App\Http\Controllers\OwnerController::class,'updatemeeting'])->name('owner.updatemeeting');

    Route::get('/meeting/{id}',[App\Http\Controllers\OwnerController::class,'editmeeting'])->name('owner.editmeeting');

    // calendar
    Route::resource('calendar', 'Owner\CalendarController');
    Route::get('/profile',[App\Http\Controllers\OwnerController::class,'showProfile'])->name('owner.profile');
    Route::post('/profile-save',[App\Http\Controllers\OwnerController::class,'profileSave'])->name('owner.profile.save');

    Route::get('/change-password',[App\Http\Controllers\OwnerController::class,'showChangePassword'])->name('owner.changepassword');
    Route::post('/change-password-save',[App\Http\Controllers\OwnerController::class,'ChangePasswordSave'])->name('owner.changepassword.save');
    Route::resource('group','Owner\groupController');
});



Route::group(['middleware' => ['isTenant'],'prefix' => 'tenant'], function () {


    Route::get('/step1', 'ApplicationController@createStep1')->name('step1');

    Route::post('/step1', 'ApplicationController@PostcreateStep1')->name('step1-save');

    Route::get('/step2', 'ApplicationController@createStep2')->name('step2');
    Route::post('/step2', 'ApplicationController@PostcreateStep2')->name('step2-save');

    Route::get('/step3', 'ApplicationController@createStep3')->name('step3');
    Route::post('/step3', 'ApplicationController@PostcreateStep3')->name('step3-save');

    Route::get('/step4', 'ApplicationController@createStep4')->name('step4');
    Route::post('/step4', 'ApplicationController@PostcreateStep4')->name('step4-save');

    Route::get('/step5', 'ApplicationController@createStep5')->name('step5');
    Route::post('/step5', 'ApplicationController@PostcreateStep5')->name('step5-save');

    Route::get('/step6', 'ApplicationController@createStep6')->name('step6');
    Route::post('/step6', 'ApplicationController@PostcreateStep6')->name('step6-save');


    Route::get('/dashboard',[App\Http\Controllers\TenantController::class,'showDashboard'])->name('tenant.dashboard');

    Route::get('/profile',[App\Http\Controllers\TenantController::class,'showProfile'])->name('tenant.profile');
    Route::post('/profile-save',[App\Http\Controllers\TenantController::class,'profileSave'])->name('tenant.profile.save');

    Route::get('/showzailcode/{code}',[App\Http\Controllers\TenantController::class,'showzailcode'])->name('tenant.showzailcode');
    Route::post('/zailcode/update',[App\Http\Controllers\TenantController::class,'addzailcode'])->name('tenant.addzailcode');

    Route::get('/application',[App\Http\Controllers\TenantController::class,'showapplications'])->name('tenant.showapplications');

    Route::get('/change-password',[App\Http\Controllers\TenantController::class,'showChangePassword'])->name('tenant.changepassword');
    Route::post('/change-password-save',[App\Http\Controllers\TenantController::class,'ChangePasswordSave'])->name('tenant.changepassword.save');

    Route::get('/group/create',[App\Http\Controllers\tennat\GroupController::class,'createGroup'])->name('tenant.create-group');

    Route::get('/group/list',[App\Http\Controllers\TenantController::class,'list_group'])->name('tenant.list-group');

});




Route::post('/popup-login', 'ApplicationController@popupLogin')->name('popup-login');


Route::get('/remove', 'ApplicationController@remove');
Route::get('/test', 'TestController@test');
Route::post('/test2', 'TestController@test2');


Route::get('/sendemail', [SendEmailController::class,'index']);
Route::post('/sendemail/send', [SendEmailController::class,'send']);

Route::post('/acceptedLeader',[SendEmailController::class,'acceptedLeader'])->name('acceptedLeader');



