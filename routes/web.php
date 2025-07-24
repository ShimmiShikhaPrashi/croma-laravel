<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});

Route::get('/',  action: [App\Http\Controllers\crudController::class, 'welcome']);

// Route::get('/banner', function () {
//     return view('banner');
// });

// Route::get('/test', action: [App\Http\Controllers\HomeController::class, 'testPage']);

Auth::routes();
Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/banner', action: [App\Http\Controllers\BannerController::class, 'banner'])->name('banner');
Route::post('/addBanner', action: [App\Http\Controllers\BannerController::class, 'addBanner'])->name('addBanner');
Route::post('/addModal', action: [App\Http\Controllers\BannerController::class, 'addModal'])->name('addModal');
Route::post('/deleteBanner', action: [App\Http\Controllers\BannerController::class, 'deleteBanner'])->name('deleteBanner');
Route::get('/updateBanner/{id}', action: [App\Http\Controllers\BannerController::class, 'updateBanner'])->name('updateBanner');
Route::post('/updateGetDataID', action: [App\Http\Controllers\BannerController::class, 'updateGetDataID'])->name('updateGetDataID');
Route::post('/activeStatus', action: [App\Http\Controllers\BannerController::class, 'activeStatus'])->name('activeStatus');




Route::post('/addTest', action:[App\Http\Controllers\BannerController::class,'addTest'])->name('addTest');
Route::post('/deleteTest', action:[App\Http\Controllers\BannerController::class,'deleteTest'])->name('deleteTest');

Route::get('/updateTest/{id}', action:[App\Http\Controllers\BannerController::class,'updateTest'])->name('updateTest');
Route::post('/updateTestGetDataId', action:[App\Http\Controllers\BannerController::class,'updateTestGetDataId'])->name('updateTestGetDataId');


Route::get('crud', action:[App\Http\Controllers\crudController::class, 'crud'])->name('crud');
Route::post('/addModal', action: [App\Http\Controllers\crudController::class, 'addModal'])->name('addModal');
Route::post('/crudDelete', action:[App\Http\Controllers\crudController::class,'crudDelete'])->name('crudDelete');
Route::get('/crudUpdate/{id}', action:[App\Http\Controllers\crudController::class,'crudUpdate'])->name('crudUpdate');
Route::post('/crudUpdateGetDataId', action:[App\Http\Controllers\crudController::class,'crudUpdateGetDataId'])->name('crudUpdateGetDataId');
