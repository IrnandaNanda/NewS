<?php

use App\Http\Controllers\LandingController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

Route::get('/', [LandingController::class, 'index'])->name('landing');

// News detail route (specific)
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Serve private files under /file/* to avoid conflict with content routes
Route::prefix('file')->group(function () {
    Route::get('/avatar/{filename}', function ($filename) {
        $path = storage_path('app/private/' . $filename);
        if (!file_exists($path)) abort(404);
        return Response::file($path);
    })->name('avatar.private');

    Route::get('/thumbnail/{filename}', function ($filename) {
        $path = storage_path('app/private/' . $filename);
        if (!file_exists($path)) abort(404);
        return Response::file($path);
    })->name('thumbnail.private');

    Route::get('/featured/{filename}', function ($filename) {
        $path = storage_path('app/private/' . $filename);
        if (!file_exists($path)) abort(404);
        return Response::file($path);
    })->name('featured.private');

    Route::get('/news/{filename}', function ($filename) {
        $path = storage_path('app/private/' . $filename);
        if (!file_exists($path)) abort(404);
        return Response::file($path);
    })->name('news.private');

    Route::get('/author/{filename}', function ($filename) {
        $path = storage_path('app/private/' . $filename);
        if (!file_exists($path)) abort(404);
        return Response::file($path);
    })->name('author.private');
});