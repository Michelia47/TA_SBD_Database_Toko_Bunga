<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BungaController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin.add', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin.store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin.edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin.update/{id}', [AdminController::class, 'update'])->name('admin.update');
Route::post('/admin.delete/{id}', [AdminController::class,'delete'])->name('admin.delete');
Route::get('/admin.search', [AdminController::class,'search'])->name('admin.search');

Route::get('//bunga', [BungaController::class, 'index'])->name('bunga.index');
Route::get('/bunga.add', [BungaController::class, 'create'])->name('bunga.create');
Route::post('/bunga.store', [BungaController::class, 'store'])->name('bunga.store');
Route::get('/bunga.edit/{id}', [BungaController::class, 'edit'])->name('bunga.edit');
Route::post('/bunga.update/{id}', [BungaController::class, 'update'])->name('bunga.update');
Route::post('/bunga.delete/{id}', [BungaController::class,'delete'])->name('bunga.delete');
Route::get('/bunga.search', [BungaController::class,'search'])->name('bunga.search');

Route::get('/bunga/trash', [BungaController::class, 'trash'])->name('bunga.trash');
Route::post('/bunga/softDeleted/{id}', [BungaController::class, 'softDeleted'])->name('bunga.softDeleted');
Route::post('/bunga/delete/{id}', [BungaController::class, 'delete'])->name('bunga.delete');
Route::get('/bunga/restore/{id}', [BungaController::class, 'restore'])->name('bunga.restore');

Route::get('/member', [MemberController::class, 'index'])->name('member.index');
Route::get('/member.add', [MemberController::class, 'create'])->name('member.create');
Route::post('/member.store', [MemberController::class, 'store'])->name('member.store');
Route::get('/member.edit/{id}', [MemberController::class, 'edit'])->name('member.edit');
Route::post('/member.update/{id}', [MemberController::class, 'update'])->name('member.update');
Route::post('/member.delete/{id}', [MemberController::class,'delete'])->name('member.delete');
Route::get('/member.search', [MemberController::class,'search'])->name('member.search');

Route::get('/member/trash', [MemberController::class, 'trash'])->name('member.trash');
Route::post('/member/softDeleted/{id}', [MemberController::class, 'softDeleted'])->name('member.softDeleted');
Route::post('/member/delete/{id}', [MemberController::class, 'delete'])->name('member.delete');
Route::get('/member/restore/{id}', [MemberController::class, 'restore'])->name('member.restore');

Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');
Route::get('/pemesanan.add', [PemesananController::class, 'create'])->name('pemesanan.create');
Route::post('/pemesanan.store', [PemesananController::class, 'store'])->name('pemesanan.store');
Route::get('/pemesanan.edit/{id}', [PemesananController::class, 'edit'])->name('pemesanan.edit');
Route::post('/pemesanan.update/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
Route::post('/pemesanan.delete/{id}', [PemesananController::class,'delete'])->name('pemesanan.delete');
Route::get('/pemesanan.search', [PemesananController::class,'search'])->name('pemesanan.search');

Route::get('/detail', [DetailController::class, 'index'])->name('detail.index');

Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
