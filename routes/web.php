<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\FocalController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\ProgressReportController;
use App\Http\Controllers\RoadmapController;
use App\Http\Controllers\RoadmapUpdateController;
use App\Http\Controllers\SocialLoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group(['prefix' => 'commodities'], function() {
    Route::delete('/{commodity}', [CommodityController::class,'destroy'])->name('commodities.destroy');
    Route::get('/create', [CommodityController::class,'create'])->name('commodities.create');
    Route::get('/{commodity}', [CommodityController::class,'edit'])->name('commodities.edit');
    Route::post('/', [CommodityController::class,'store'])->name('commodities.store');
    Route::get('/', [CommodityController::class,'index'])->name('commodities.index');
});

Route::resources([
    'focals'            => FocalController::class,
    'roadmaps'          => RoadmapController::class,
    'offices'           => OfficeController::class,
    'progress-reports'  => ProgressReportController::class,
    'roadmap-updates'   => RoadmapUpdateController::class,
]);
