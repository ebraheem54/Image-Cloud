<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EbroController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/user',function(){
//     return view('user.index')
//     ->with( 'name','ebraheem')
//     ->with('lastname','wannous');
// });
Route::get('/',function(){
   return redirect()->route('product.index'); 
});
Route::get('/home',function(){
    return redirect()->route('product.index') ; 
 }) ;
 
Route::resource('product',ProductController::class);    

Auth::routes(['verify' => true]);



Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');