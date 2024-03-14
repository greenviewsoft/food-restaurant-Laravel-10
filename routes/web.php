<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/** Auth admin  */

Route::group(['middleware' => 'guest'], function () {

    Route::get('admin/login', [AdminAuthController::class, 'Index'])->name('admin.login');

    Route::get('admin/forget', [AdminAuthController::class, 'AdminForget'])->name('admin.forget');
});

Route::get('logout', [AdminAuthController::class, 'AdminLogout'])->name('admin.logout');



//// Frontend Route ///////////

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', [DashboardController::class, 'Index'])->name('dashboard');

    ////// Frontend User Profile Route ///////////

    Route::post('profile/update', [ProfileController::class, 'ProfileUpdate'])->name('profile.Update');
    Route::post('profile/Password/update', [ProfileController::class, 'ProfilePasswordUpdated'])->name('profile.password.update');
    Route::post('upload/avatar', [ProfileController::class, 'UploadAvatar'])->name('upload.avatar');
    Route::post('user/logout', [ProfileController::class, 'UserLogout'])->name('user.logout');
});


Route::get('/', [FrontendController::class, 'Index']);














// require __DIR__.'/admin.php';

require __DIR__ . '/auth.php';
