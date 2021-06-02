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

Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
// Route::get('/register', function () {
//     return redirect('/register/tenant');
// });

 Auth::routes();


 Route::get('/owner/register', [App\Http\Controllers\Auth\RegisterController::class, 'showFormOwner'])->name('owner.register');
 Route::get('/tenant/register', [App\Http\Controllers\Auth\RegisterController::class, 'showFormTenant'])->name('tenant.register');
//  Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showFormOwner'])->name('showFormOwner');

Route::group(['middleware' => ['isAdmin'],'prefix' => 'admin'], function () {
    Route::get('/dashboard',[App\Http\Controllers\AdminController::class,'showDashboard'])->name('admin.dashboard');

    Route::get('/profile',[App\Http\Controllers\AdminController::class,'showProfile'])->name('admin.profile');
    Route::post('/profile',[App\Http\Controllers\AdminController::class,'profileSave']);
    Route::get('/change-password',[App\Http\Controllers\AdminController::class,'showChangePassword'])->name('admin.changepassword');
    Route::post('/change-password-save',[App\Http\Controllers\AdminController::class,'ChangePasswordSave'])->name('admin.changepassword.save');

    Route::get('/add-owner',[App\Http\Controllers\AdminController::class,'ShowAddOwner'])->name('admin.showAddOwner');
    Route::post('/save-owner',[App\Http\Controllers\AdminController::class,'ShowAddOwnerSave'])->name('admin.showAddOwner.save');
    
    


    
});


Route::group(['middleware' => ['isOwner'],'prefix' => 'owner'], function () {
    Route::get('/dashboard',[App\Http\Controllers\OwnerController::class,'showDashboard'])->name('owner.dashboard');

    Route::get('/profile',[App\Http\Controllers\OwnerController::class,'showProfile'])->name('owner.profile');
    Route::post('/profile-save',[App\Http\Controllers\OwnerController::class,'profileSave'])->name('owner.profile.save');

    Route::get('/change-password',[App\Http\Controllers\OwnerController::class,'showChangePassword'])->name('owner.changepassword');
    Route::post('/change-password-save',[App\Http\Controllers\OwnerController::class,'ChangePasswordSave'])->name('owner.changepassword.save');
});



Route::group(['middleware' => ['isTenant'],'prefix' => 'tenant'], function () {
    Route::get('/dashboard',[App\Http\Controllers\TenantController::class,'showDashboard'])->name('tenant.dashboard');

    Route::get('/profile',[App\Http\Controllers\TenantController::class,'showProfile'])->name('tenant.profile');
    Route::post('/profile-save',[App\Http\Controllers\TenantController::class,'profileSave'])->name('tenant.profile.save');

    Route::get('/change-password',[App\Http\Controllers\TenantController::class,'showChangePassword'])->name('tenant.changepassword');
    Route::post('/change-password-save',[App\Http\Controllers\TenantController::class,'ChangePasswordSave'])->name('tenant.changepassword.save');

    
});








// Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'home']);

// Route::post('login/{provider}/callback', 'Auth\LoginController@handleCallback');


// Route::get('/test','App\Http\Controllers\TestController@test1');
// Route::post('/test','App\Http\Controllers\TestController@test2');


// Route::post('admin/profile','App\Http\Controllers\HomeController@save_profile')->name('admin.save-profile');

// Route::get('admin/add-house','App\Http\Controllers\HouseController@showAddHouseFrom')->name('add-house')->middleware('admin');
// Route::post('admin/add-house','App\Http\Controllers\HouseController@AddHouseSave')->name('add-house-save')->middleware('admin');
// Route::get('admin/all-house','App\Http\Controllers\HouseController@showAllHouse')->name('all-house')->middleware('admin');

// Route::get('admin/all-rental-owners','App\Http\Controllers\AdminController@showAllRentalOwners')->name('all-rental-owners')->middleware('admin');
// Route::get('admin/add-rental-owner','App\Http\Controllers\AdminController@showAddRentalOwner')->name('add-rental-owner')->middleware('admin');
// Route::post('admin/add-rental-owner','App\Http\Controllers\AdminController@AddRentalOwnerSave')->name('add-rental-owner-save')->middleware('admin');


// Route::get('admin/add-room','App\Http\Controllers\RoomController@showAddRoomFrom')->name('add-room')->middleware('admin');
// Route::post('admin/add-room','App\Http\Controllers\RoomController@AddRoomFormSave')->name('add-room-save')->middleware('admin');
// Route::get('admin/all-rooms','App\Http\Controllers\RoomController@showAllRoom')->name('all-rooms')->middleware('admin');






// owner
// Route::get('owner/profile', [App\Http\Controllers\OwnerController::class, 'profile'])->name('owner.profile')->middleware('owner');
// Route::post('owner/profile','App\Http\Controllers\OwnerController@save_profile')->name('owner.save-profile');

// // student
// Route::get('student/profile', [App\Http\Controllers\StudentController::class, 'profile'])->name('student.profile')->middleware('student');
// Route::post('student/profile','App\Http\Controllers\StudentController@save_profile')->name('student.save-profile');
