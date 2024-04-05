<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Questions;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('question/create', [Questions::class, 'index'])->name('new-question');
Route::post('question/save', [Questions::class, 'store'])->name('save-question');