<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Questions;
use App\Http\Controllers\Exams;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('question/create', [Questions::class, 'index'])->name('new-question');
Route::get('/exam', [Exams::class, 'index'])->name('new-exam');
Route::post('question/save', [Questions::class, 'store'])->name('save-question');
Route::post('exam/save', [Exams::class, 'store'])->name('save-exam');