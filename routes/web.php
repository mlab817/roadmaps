<?php

use App\Http\Controllers\CommodityController;
use App\Http\Controllers\RoadmapController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::group(['prefix' => 'commodities'], function() {
    Route::delete('/{commodity}', [CommodityController::class,'destroy'])->name('commodities.destroy');
    Route::get('/create', [CommodityController::class,'create'])->name('commodities.create');
    Route::get('/{commodity}', [CommodityController::class,'edit'])->name('commodities.edit');
    Route::post('/', [CommodityController::class,'store'])->name('commodities.store');
    Route::get('/', [CommodityController::class,'index'])->name('commodities.index');
});

Route::resource('roadmaps', RoadmapController::class);
