<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/',[HomeController::class,'home']) -> name('home');
Route::get('/property/{id}',[PropertyController::class,'single']) -> name('single-property');
Route::get('/propertys',[PropertyController::class,'propertys']) -> name('propertys');
Route::get('/properties/', [HomeController::class, 'propertyIndex'])->name('properties');

Route::get('page/{slug}',[PageController::class,'single']) -> name('page');
Route::post('/property-inquiry/{id}',[\App\Http\Controllers\ContactController::class,'propertyInquiry']) -> name('property-inquiry');
Route::get('/currency/{code}', [HomeController::class, 'currencyChange'])->name('currency-change');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/properties', [DashboardController::class, 'properties'])->name('dashboard-properties');
    Route::get('/dashboard/add-property', [DashboardController::class, 'addProperty'])->name('add-property');
    Route::post('/dashboard/create-property', [DashboardController::class, 'createProperty'])->name('create-property');
    Route::get('/dashboard/edit-property/{id}', [DashboardController::class, 'editProperty'])->name('edit-property');
    Route::post('/dashboard/delete-media/{media_id}', [DashboardController::class, 'deleteMedia'])->name('delete-media');
});

require __DIR__.'/auth.php';
