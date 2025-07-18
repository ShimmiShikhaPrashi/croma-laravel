<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});
// Route::get('/banner', function () {
//     return view('banner');
// });

// Route::get('/test', action: [App\Http\Controllers\HomeController::class, 'testPage']);

Auth::routes();
Route::get('/',  action: [App\Http\Controllers\BannerController::class, 'welcome']);
Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/banner', action: [App\Http\Controllers\BannerController::class, 'banner'])->name('banner');
Route::post('/addBanner', action: [App\Http\Controllers\BannerController::class, 'addBanner'])->name('addBanner');
Route::post('/addModal', action: [App\Http\Controllers\BannerController::class, 'addModal'])->name('addModal');
Route::post('/deleteBanner', action: [App\Http\Controllers\BannerController::class, 'deleteBanner'])->name('deleteBanner');
Route::get('/updateBanner/{id}', action: [App\Http\Controllers\BannerController::class, 'updateBanner'])->name('updateBanner');
Route::post('/updateGetDataID', action: [App\Http\Controllers\BannerController::class, 'updateGetDataID'])->name('updateGetDataID');




