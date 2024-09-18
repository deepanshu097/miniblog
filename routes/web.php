<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class,'index'])->name('welcome');




Route::get('/dashboard', [DashboardController::class,'show'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/home',[HomeController::class,'show'])->name('home');
    Route::get('/post',[PostController::class,'create'])->name('add_post');
    Route::post('/postblog',[PostController::class,'store'])->name('postblog');
    Route::get('/readmore/{id}',[WelcomeController::class,'readmore'])->name('readmore');
   
    Route::get('/editpost/{id}',[PostController::class,'edit'])->name('editpost');
    Route::post('/updatepost',[PostController::class,'update'])->name('updatepost');
    Route::delete('deletepost/{id}',[PostController::class,'destroy'])->name('deletepost');

    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
