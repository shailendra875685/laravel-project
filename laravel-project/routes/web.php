<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\NifformController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\VarifySeller;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/nif-form',[NifformController::class,'home']);

Route::post('/nif-form-upload',[NifformController::class,'store'])->name('form.store');

Route::get('/user',[UserController::class,'user']);
Route::post('/user-store',[UserController::class,'store'])->name('user.store');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





Route::get('/',[ProductsController::class,'index'])->name('all.product');

Route::get('/product/{id}',[ProductsController::class,'show']);

Route::get('/sell',function(){
    return view('sell');
})->middleware(['auth'])->name('sell.store');

Route::post('/product',[ProductsController::class,'store'])->name('product.store');

Route::get('/dashboard',[ProductsController::class,'showOwnProduct'])->middleware(['auth'])->name('dashboard');

Route::get('/deleteProduct/{id}',[ProductsController::class,'deleteProduct'])->middleware(['auth'])->name('product.delete');
Route::get('/updateProduct/{id}',[ProductsController::class,'updateProduct'])->middleware(['auth',VarifySeller::class])->name('product.update');
Route::put('/editProduct/{id}',[ProductsController::class,'editProduct'])->middleware(['auth'])->name('product.edit');

















