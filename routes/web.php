<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FocalController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProgressReportController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\RoadmapUpdateController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/oauth/{provider}', [SocialLoginController::class, 'redirectToProvider'])
    ->middleware('guest')
    ->name('oauth.login');
Route::get('/oauth/{provider}/callback', [SocialLoginController::class, 'handleProviderCallback'])
    ->middleware('guest');
Route::post('/logout', [SocialLoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::view('/','welcome')->name('welcome');

Route::get('/dashboard',[DashboardController::class,'dashboard'])->middleware(['auth'])->name('dashboard');

Route::group(['middleware'=>'auth'], function() {
    Route::resources([
        'commodities'       => CommodityController::class,
        'focals'            => FocalController::class,
        'roadmaps'          => RoadmapController::class,
        'offices'           => OfficeController::class,
        'progress-reports'  => ProgressReportController::class,
        'roadmap-updates'   => RoadmapUpdateController::class,
        'roles'             => RoleController::class,
        'permissions'       => PermissionController::class,
        'users'             => UserController::class,
    ]);
});

