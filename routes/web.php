<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

// user route
Route::middleware(['auth', 'check-level:admin'])->group(function(){
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
});
// masyarakat role
Route::middleware(['auth', 'check-level:masyarakat'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'masyarakatHome'])->name('masyarakat.home');
});
Route::middleware(['auth', 'check-level:pimpinan'])->group(function(){
    Route::get('/pimpinan/home', [App\Http\Controllers\HomeController::class, 'pimpinanHome'])->name('pimpinan.home');
});

