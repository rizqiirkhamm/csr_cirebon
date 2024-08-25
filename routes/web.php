<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\LainnyaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\SektorController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\MitraListController;
use App\Http\Controllers\KeagamaanController;
use App\Http\Controllers\SosialController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\InfrastrukturController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\LingkunganController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\ProyekController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SummaryController;



// Website Routes
Route::get('/', function () {
    return view('home');
})->name('home');
Route::resource('/', HomeController::class);

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');
Route::resource('/tentang', TentangController::class);

Route::get('/statistik', function () {
    return view('stats');
})->name('stats');
Route::resource('/statistik', StatsController::class);

Route::get('/laporan', function () {
    return view('laporan.index');
})->name('laporan');
Route::resource('/laporan', LaporanController::class);
Route::get('/laporan/{id}', [LaporanController::class, 'show'])->name('laporan.show');

Route::get('/sektor', function () {
    return view('sektor');
})->name('sektor');
Route::resource('/sektor', SektorController::class);

Route::get('/sosial', function () {
    return view('sosial');
})->name('sosial');
Route::resource('/sosial', SosialController::class);
Route::get('/api/getProjects/{id}', [SosialController::class, 'getProjects']);

Route::get('/lingkungan', function () {
    return view('lingkungan');
})->name('lingkungan');
Route::resource('/lingkungan', LingkunganController::class);

Route::get('/kesehatan', function () {
    return view('kesehatan');
})->name('kesehatan');
Route::resource('/kesehatan', KesehatanController::class);

Route::get('/pendidikan', function () {
    return view('pendidikan');
})->name('pendidikan');
Route::resource('/pendidikan', PendidikanController::class);

Route::get('/infrastruktur', function () {
    return view('infrastruktur');
})->name('infrastruktur');
Route::resource('/infrastruktur', InfrastrukturController::class);

Route::get('/keagamaan', function () {
    return view('keagamaan');
})->name('keagamaan');
Route::resource('/keagamaan', KeagamaanController::class);

Route::get('/lainnya', function () {
    return view('lainnya');
})->name('lainnya');
Route::resource('/lainnya', LainnyaController::class);

Route::get('/mitra-list', function () {
    return view('mitra-list.index');
})->name('mitra-list');
Route::resource('/mitra-list', MitraListController::class);
Route::get('/mitra-list/{id}', [MitraListController::class, 'show'])->name('mitra-list.show');

Route::get('/kegiatan', function () {
    return view('kegiatan.index');
})->name('kegiatan');
Route::resource('/kegiatan', KegiatanController::class);
Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');

Route::get('/proyek/{id}', [ProyekController::class, 'show'])->name('proyek.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/summary', [SummaryController::class, 'show'])->name('summary.show');
Route::get('/summary/edit/{id}', [SummaryController::class, 'edit'])->name('summary.edit');
Route::put('/summary/update/{id}', [SummaryController::class, 'update'])->name('summary.update');
Route::post('/summary/store', [SummaryController::class, 'store'])->name('summary.store');



// Email Verifications
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth', 'throttle:6,1'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__.'/auth.php';
