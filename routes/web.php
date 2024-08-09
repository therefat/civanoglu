<?php

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
Route::get('page/{slug}',[PageController::class,'single']) -> name('page');
Route::post('/property-inquiry/{id}',[\App\Http\Controllers\ContactController::class,'propertyInquiry']) -> name('property-inquiry');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
