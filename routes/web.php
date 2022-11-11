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
    // User Admin
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/user', [App\Http\Controllers\AdminController::class, 'showUser'])->name('admin.user');
    Route::get('/admin/add/user', [App\Http\Controllers\AdminController::class, 'createUser'])->name('tambah.user');
    Route::post('/admin/add/user', [App\Http\Controllers\AdminController::class, 'addUser'])->name('send.user');
    Route::delete('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('hapus.user');
    Route::get('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'editUser'])->name('edit.user');
    Route::post('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('update.user');
    // Pengaduan Admin
    Route::get('/admin/pengaduan',  [App\Http\Controllers\AdminController::class, 'pengaduan'])->name('admin.pengaduan');
    Route::post('admin/pengaduan/{kode}',  [App\Http\Controllers\AdminController::class, 'status'])->name('status.pengaduan');
});
// masyarakat role
Route::middleware(['auth', 'check-level:masyarakat'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'masyarakatHome'])->name('masyarakat.home');
    Route::get('/home/pengaduan',  [App\Http\Controllers\PengaduanController::class, 'index'])->name('masyarakat.pengaduan');
    Route::get('/home/add/pengaduan',  [App\Http\Controllers\PengaduanController::class, 'createPengaduan'])->name('tambah.pengaduan');
    Route::post('/home/add/pengaduan',  [App\Http\Controllers\PengaduanController::class, 'addPengaduan'])->name('send.pengaduan');
    Route::get('/home/pengaduan/{kode}',  [App\Http\Controllers\PengaduanController::class, 'editPengaduan'])->name('edit.pengaduan');
    Route::post('/home/pengaduan/{kode}',  [App\Http\Controllers\PengaduanController::class, 'updatePengaduan'])->name('update.pengaduan');
    Route::delete('/home/pengaduan/{kode}', [App\Http\Controllers\PengaduanController::class, 'destroy'])->name('hapus.pengaduan');
});
Route::middleware(['auth', 'check-level:pimpinan'])->group(function(){
    Route::get('/pimpinan/home', [App\Http\Controllers\HomeController::class, 'pimpinanHome'])->name('pimpinan.home');
});

