<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\WeightTargetController;
/*
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

    Route::middleware(['auth'])->group(function(){
    Route::get('/register/step2',[WeightTargetController::class,'target'])->name('register.step2');
    Route::post('/register/step2',[WeightTargetController::class,'store'])->name('register.step2.store');
    Route::get('/weight_logs/goal_setting/edit',[WeightTargetController::class,'edit'])->name('weight_target.edit');
    Route::put('/weight_logs/goal_setting/{id}/update',[WeightTargetController::class,'update'])->name('weight_target.update');
    });


    Route::middleware(['auth'])->group(function(){
    Route::get('/weight_logs',[WeightLogController::class, 'admin'])->name('weight_logs.admin');
    Route::post('/weight_logs/create',[WeightLogController::class, 'store'])->name('weight_logs.store');
    Route::get('/weight_logs/search',[WeightLogController::class, 'search'])->name('weight_logs.search');
    Route::get('/weight_logs/{weightLogId}/edit',[WeightLogController::class, 'edit'])->name('weight_logs.edit');
    Route::put('/weight_logs/{weightLogId}/update',[WeightLogController::class,'update'])->name('weight_logs.update');
    Route::delete('/weight_logs/{weightLogId}/delete',[WeightLogController::class, 'destroy'])->name('weight_logs.destroy');

});



