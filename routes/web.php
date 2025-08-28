<?php

use App\Http\Controllers\BannerController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ExcelUploadController;

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
Route::get('/logout',  action: [App\Http\Controllers\HomeController::class, 'logout']);
Route::get('/home', action: [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/banner', action: [App\Http\Controllers\BannerController::class, 'banner'])->name('banner');
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


Route::post('/addModal', action: [App\Http\Controllers\crudController::class, 'addModal'])->name('addModal');
Route::post('/crudDelete', action:[App\Http\Controllers\crudController::class,'crudDelete'])->name('crudDelete');
Route::get('/crudUpdate/{id}', action:[App\Http\Controllers\crudController::class,'crudUpdate'])->name('crudUpdate');
Route::post('/crudUpdateGetDataId', action:[App\Http\Controllers\crudController::class,'crudUpdateGetDataId'])->name('crudUpdateGetDataId');


// Route::get('/author', action:[App\Http\Controllers\BookAuthorReviewController::class,'author'])->name('author');
Route::get('/authors-books-reviews', [ App\Http\Controllers\BookAuthorReviewController::class, 'index']);
Route::get('/user-contact', [ App\Http\Controllers\testController::class, 'index']);


// Middleware
Route::middleware(['auth','admin'])->group(function (){
    Route::get('/admin', function () {
        return view('dashboard.admin');
    });
    Route::get('/crud', action:[App\Http\Controllers\crudController::class, 'crud'])->name('crud');

});

Route::middleware(['auth','user'])->group(function (){
    Route::get('/user', function () {
        return view('dashboard.user');
    });
    Route::get('/banner', action: [App\Http\Controllers\BannerController::class, 'banner'])->name('banner');
});



// Route::middleware(['auth'])->post('/redirect',function (Request $request){
//     if(Auth()->user()->role === 'admin'){
//         return redirect('/home');
//     }
//     return redirect('/home');
  
// });

Route::get('/subscribe', function () {
    return view('subscribe');
})->name('subscribe');
// Handle form POST
Route::middleware(['auth'])->post('/subscribe-action', function (Request $request) {
    $intent = $request->input('subscribe');

    if ($intent === 'yes' && Auth::user()->role === 'admin') {
        return redirect('/home');
    }

    if ($intent === 'no' && Auth::user()->role === 'user') {
        return redirect('/home');
    }

    return "Unauthorized or invalid choice.";
})->name('subscribe.action');

// Route::get('/profile', action: [ App\Http\Controllers\BannerController::class, 'profile'])->name('profile');

Route::middleware(['auth'])->get('/profile', [BannerController::class, 'profile'])->name('profile');

Route::put('/profile', [BannerController::class, 'updateProfile'])->name('profile.update');

Route::get('excel-upload', [ExcelUploadController::class, 'index']);
Route::post('excel-upload', [ExcelUploadController::class, 'upload'])->name('excel.upload');
