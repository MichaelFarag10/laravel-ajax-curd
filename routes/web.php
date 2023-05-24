<?php

use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

/*  Route::get('/', function () {
    return view('index');
});
 */
Auth::routes();
Route::get('/',function(){
    return redirect('login');
});
Route::middleware(['auth','employee'])->group(function(){
    Route::get('/home', [EmployeeController::class, 'index'])->name('home');
    Route::post('store',[EmployeeController::class,'store'])->name('store');
    Route::get('fetch-all',[EmployeeController::class,'fetchAll'])->name('fetchAll');
    Route::get('edit',[EmployeeController::class,'edit'])->name('edit');
    Route::post('update',[EmployeeController::class,'update'])->name('update');
    Route::post('delete',[EmployeeController::class,'delete'])->name('delete');

});
