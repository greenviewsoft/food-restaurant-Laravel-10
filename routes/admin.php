<?php

use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;






Route::group(['prefix' => 'admin', 'as' => 'admin.'],function(){



    Route::get('profile',[ProfileController::class, 'AdminProfile'])->name('profile');
    Route::post('profile/store',[ProfileController::class, 'AdminProfileStore'])->name('profile.store');
    Route::get('change/password',[ProfileController::class, 'AdminChangePassword'])->name('change.password');
    Route::post('change/update',[ProfileController::class, 'AdminChangePasswordUpdate'])->name('password.update');


    Route::get('dashboard', [AdminDashboardController::class, 'Index'])->name('admin.dashboard');


  // Slider Route 

  Route::resource('slider', SliderController::class);

});


