<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\WebPpdbController;
use App\Http\Controllers\WebPostController;
use App\Http\Controllers\WebGalleryController;
use App\Http\Controllers\WebContactController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\PpdbController as AdminPpdbController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil/sejarah', [PageController::class, 'sejarah'])->name('profil.sejarah');
Route::get('/profil/visi-misi', [PageController::class, 'visiMisi'])->name('profil.visi_misi');
Route::get('/profil/struktur', [PageController::class, 'struktur'])->name('profil.struktur');
Route::get('/profil/guru', [PageController::class, 'guru'])->name('profil.guru');

Route::get('/berita', [WebPostController::class, 'index'])->name('berita.index');
Route::get('/berita/{id}', [WebPostController::class, 'show'])->name('berita.show');

Route::get('/galeri', [WebGalleryController::class, 'index'])->name('galeri.index');

Route::get('/ppdb', [WebPpdbController::class, 'create'])->name('ppdb.create');
Route::post('/ppdb', [WebPpdbController::class, 'store'])->name('ppdb.store');
Route::get('/ppdb/sukses', [WebPpdbController::class, 'success'])->name('ppdb.success');

Route::get('/kontak', [WebContactController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [WebContactController::class, 'store'])->name('kontak.store');

// Admin Routes
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('posts', AdminPostController::class);
    Route::resource('galleries', AdminGalleryController::class);
    Route::resource('ppdb', AdminPpdbController::class)->only(['index', 'show', 'destroy']);
    Route::resource('contacts', AdminContactController::class)->only(['index', 'show', 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
