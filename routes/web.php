<?php

use App\Http\Controllers\GuruAuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizQuestionController;
use App\Http\Controllers\QuizSiswaController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;


Route::view('/', 'landing_page')->name('landing-page');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/petunjuk-penggunaan', 'petunjuk-penggunaan')->name('petunjuk');


// SISWA
// Login & Register Siswa
Route::get('/siswa/login', [SiswaAuthController::class, 'showLogin'])->name('login');
Route::post('/siswa/login', [SiswaAuthController::class, 'login'])->name('siswa.login.store');
Route::get('/siswa/registrasi', [SiswaAuthController::class, 'showRegister'])->name('registrasi-siswa');
Route::post('/siswa/registrasi', [SiswaAuthController::class, 'register'])->name('siswa.register.store');
Route::post('/siswa/logout', [SiswaAuthController::class, 'logout'])->name('siswa.logout');

// Materi Siswa
// Route::middleware('auth:siswa')->group(function () {
//     Route::view('/peta-konsep', 'siswa.petakonsep')->name('peta-konsep');
//     Route::view('/apersepsi1', 'siswa.apersepsi1')->name('apersepsi1');
//     Route::view('/subbab-A1', 'siswa.subbabA1')->name('subbabA1');
//     Route::view('/subbab-A2_1', 'siswa.subbabA2_1')->name('subbabA2.1');
//     Route::view('/subbab-A2_2', 'siswa.subbabA2_2')->name('subbabA2.2');

//     Route::view('/subbab-B-gradien', 'siswa.subbabB_gradien')->name('subbabB_gradien');
//     Route::view('/subbab-B-gradien_satu_titik', 'siswa.subbabB_gradien1titik')->name('subbabB_gradiensatutitik');
//     Route::view('/subbab-B-gradien_dua_titik', 'siswa.subbabB_gradienduatitik')->name('subbabB_gradienduatitik');
//     Route::view('/subbab-B-gradien_persamaan1', 'siswa.subbabB_gradienpersamaan1')->name('subbabB_gradienpersamaan1');

//     Route::view('/subbab-C-gradien_garissejajarsumbuxy', 'siswa.subbabC_gradien_garis_sejajar_sumbuxy')->name('subbabC_gradien_garissejajar_sumbuxy');
//     Route::view('/subbab-C-gradien_duagaris_sejajar', 'siswa.subbabC_gradien_garisgarissejajar')->name('subbabC_gradien_gradiengarissejajar');
//     Route::view('/subbab-C-gradien_duagaris_tegaklurus', 'siswa.subbabC_gradien_garisgaristegaklurus')->name('subbabC_gradien_garistegaklurus');

//     Route::view('/subbab-D-pgl1', 'siswa.subbabD_persamaangarislurus1')->name('subbabD_persamaangarislurus1');
//     Route::view('/subbab-D-pgl2', 'siswa.subbabD_persamaangarislurus2')->name('subbabD_persamaangarislurus2');
//     Route::view('/subbab-D-pgl-dan-sejajar', 'siswa.subbabD_persamaangarislurus3_sejajar')->name('subbabD_persamaangarislurus3_sejajar');
//     Route::view('/subbab-D-pgl-dan-tegaklurus', 'siswa.subbabD_persamaangarislurus4_tegaklurus')->name('subbabD_persamaangarislurus4_tegaklurus');

//     Route::view('/siswa/progress-belajar', 'siswa.progres_belajar')->name('progress-belajar');

//     Route::get('/quiz/{id}', [QuizSiswaController::class, 'show'])->name('quiz.show');
//     Route::post('/quiz/{id}/submit', [QuizSiswaController::class, 'submit'])->name('quiz.submit');
// });
Route::middleware('auth:siswa')->group(function () {
    // Pengantar: tetap bebas, tidak dikunci, tidak masuk progress
    Route::view('/peta-konsep', 'siswa.petakonsep')->name('peta-konsep');
    Route::view('/apersepsi1', 'siswa.apersepsi1')->name('apersepsi1');

    // Materi: buka berdasarkan slug dari tabel materi
    Route::get('/materi/{slug}', [MateriController::class, 'show'])->name('materi.show');

    // Menandai latihan materi selesai
    Route::post('/materi/{id}/complete', [MateriController::class, 'complete'])->name('materi.complete');

    // Progress belajar
    Route::get('/siswa/progress-belajar', [MateriController::class, 'progress'])->name('progress-belajar');

    // Quiz
    Route::get('/quiz/{id}', [QuizSiswaController::class, 'show'])->name('quiz.show');
    Route::post('/quiz/{id}/submit', [QuizSiswaController::class, 'submit'])->name('quiz.submit');
});

// ====================
// GURU
// ====================
Route::prefix('guru')->group(function () {

    // guest / public
    Route::get('/register', [GuruAuthController::class, 'showRegister'])->name('guru.register');
    Route::post('/register', [GuruAuthController::class, 'register'])->name('guru.register.store');
    Route::get('/login', [GuruAuthController::class, 'showLogin'])->name('guru.login');
    Route::post('/login', [GuruAuthController::class, 'login'])->name('guru.login.store');

    // protected
    Route::middleware('auth:guru')->group(function () {
        Route::post('/logout', [GuruAuthController::class, 'logout'])->name('guru.logout');

        Route::view('/dashboardguru', 'guru.dashboardguru')->name('dashboardguru');
        Route::get('/rekapitulasi-nilai', [QuizController::class, 'rekapNilai'])->name('rekapitulasi-nilai');        Route::view('/progres-siswa', 'guru.progres_siswa')->name('progres-siswa');
        Route::view('/daftarmateriguru', 'guru.daftarmateriguru')->name('daftarmateriguru');

        Route::get('/daftarsiswa', [SiswaController::class, 'index'])->name('daftarsiswa.index');
        Route::post('/tambah-siswa', [SiswaController::class, 'store'])->name('guru.daftarsiswa.store');
        Route::get('/siswa/{id}', [SiswaController::class, 'show'])->name('guru.daftarsiswa.show');
        Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('guru.daftarsiswa.update');
        Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('guru.daftarsiswa.destroy');

        Route::get('/daftarsiswa/export/pdf', [SiswaController::class, 'exportPdf'])->name('guru.daftarsiswa.export.pdf');
        Route::get('/daftarsiswa/export/excel', [SiswaController::class, 'exportExcel'])->name('guru.daftarsiswa.export.excel');

        Route::get('/kuis', [QuizController::class, 'index'])->name('kuis.index');
        Route::get('/kuis/{id}', [QuizController::class, 'show'])->name('kuis.show');
        Route::put('/kuis/{id}', [QuizController::class, 'update'])->name('kuis.update');

        Route::get('/kuis/{quiz}/soal', [QuizQuestionController::class, 'index'])->name('kuis.soal');
        Route::post('/kuis/{quiz}/soal', [QuizQuestionController::class, 'store'])->name('kuis.soal.store');
        Route::get('/soal/{question}', [QuizQuestionController::class, 'show'])->name('kuis.soal.show');
        Route::put('/soal/{question}', [QuizQuestionController::class, 'update'])->name('kuis.soal.update');
        Route::delete('/soal/{question}', [QuizQuestionController::class, 'destroy'])->name('kuis.soal.destroy');
    });
});
