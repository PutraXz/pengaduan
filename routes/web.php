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
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.index');
    Route::get('/admin/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('admin.user');
    Route::get('/admin/add/user', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('tambah.user');
    Route::post('/admin/add/user', [App\Http\Controllers\Admin\UserController::class, 'add'])->name('send.user');
    Route::get('/admin/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit.user');
    Route::post('/admin/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update.user');
    Route::delete('/admin/user/{id}', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('hapus.user');
    // Pengaduan Admin
    Route::get('/admin/pengaduan',  [App\Http\Controllers\Admin\PengaduanController::class, 'index'])->name('admin.pengaduan');
    Route::get('/admin/add/pengaduan',  [App\Http\Controllers\Admin\PengaduanController::class, 'create'])->name('admin.tambah_pengaduan');
    Route::post('/admin/add/pengaduan',  [App\Http\Controllers\Admin\PengaduanController::class, 'add'])->name('admin.send_pengaduan');
    Route::get('/admin/pengaduan/{kode}',  [App\Http\Controllers\Admin\PengaduanController::class, 'edit'])->name('admin.edit_pengaduan');
    Route::post('/admin/pengaduan/{kode}',  [App\Http\Controllers\Admin\PengaduanController::class, 'update'])->name('admin.update_pengaduan');
    Route::delete('/admin/pengaduan/{kode}', [App\Http\Controllers\Admin\PengaduanController::class, 'destroy'])->name('admin.hapus_pengaduan');
    Route::post('admin/pengaduan/{kode}',  [App\Http\Controllers\Admin\PengaduanController::class, 'status'])->name('status.pengaduan');
});
// masyarakat role
Route::middleware(['auth', 'check-level:masyarakat'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'masyarakatHome'])->name('masyarakat.home');
    Route::get('/home/pengaduan',  [App\Http\Controllers\Masyarakat\PengaduanController::class, 'index'])->name('masyarakat.pengaduan');
    Route::get('/home/add/pengaduan',  [App\Http\Controllers\Masyarakat\PengaduanController::class, 'create'])->name('tambah.pengaduan');
    Route::post('/home/add/pengaduan',  [App\Http\Controllers\Masyarakat\PengaduanController::class, 'add'])->name('send.pengaduan');
    Route::get('/home/pengaduan/{kode}',  [App\Http\Controllers\Masyarakat\PengaduanController::class, 'edit'])->name('edit.pengaduan');
    Route::post('/home/pengaduan/{kode}',  [App\Http\Controllers\Masyarakat\PengaduanController::class, 'update'])->name('update.pengaduan');
    Route::delete('/home/pengaduan/{kode}', [App\Http\Controllers\Masyarakat\PengaduanController::class, 'destroy'])->name('hapus.pengaduan');
});
// Pimpinan Role
Route::middleware(['auth', 'check-level:pimpinan'])->group(function(){
    Route::get('/pimpinan/home', [App\Http\Controllers\HomeController::class, 'pimpinanHome'])->name('pimpinan.home');
    Route::get('/pimpinan/pengaduan', [App\Http\Controllers\Pimpinan\PengaduanController::class, 'index'])->name('pimpinan.pengaduan');
});

