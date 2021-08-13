<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/contact/all', [ContactController::class, 'list'])->name('contact-list');

Route::get('/contact/all/{id}', [ContactController::class, 'detail'])->name('contact-detail');

Route::get('/contact/{id}/edit', [ContactController::class, 'edit'])->name('contact-edit');

Route::post('/contact/{id}/edit', [ContactController::class, 'editSubmit'])->name('contact-form-edit');

Route::get('/contact/{id}/delete', [ContactController::class, 'delete'])->name('contact-delete');

Route::post('/contact/submit', [ContactController::class, 'submit'])->name('contact-form');
