<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Notes\NoteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




    //All GET Method

    //-----------------------------------show form Notes---------------------------------------------
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');


    //------------------------------------Show added Notes---------------------------------------------

    Route::get('/notes/list', [NoteController::class, 'index'])->name('notes.list');


    //---------------------------------------------Search Notes---------------------------------------------

    Route::get('/notes/search', [NoteController::class, 'search'])->name('notes.search');



    //All Post Method


    //-----------------------------------Store Notes---------------------------------------------

    Route::post('/notes/store', [NoteController::class, 'store'])->name('notes.store');


    //-----------------------------------Edit form show for single Notes-----------------------------

    Route::post('/notes/edit/{id}', [NoteController::class, 'edit'])->name('notes.edit');


    //------------------------------------------Update Notes---------------------------------------------

    Route::post('/notes/update/{id}', [NoteController::class, 'update'])->name('notes.update');


    //---------------------------------------------Delete Notes---------------------------------------------

    Route::delete('/notes/delete/{id}', [NoteController::class, 'destroy'])->name('notes.delete');








});

require __DIR__.'/auth.php';
