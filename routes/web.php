<?php

use App\Http\Controllers\NotesController;
use App\Http\Controllers\UploadFileController;
use Illuminate\Support\Facades\Route;


// Route::fallback(function(){
//     return redirect()->route('notes.home');
// });

// Route::resource('notes', NotesController::class);

Route::controller(NotesController::class)->group(function(){
    Route::get('notes', 'index')->name('notes.home');
    Route::post('notes', 'store')->name('notes.store');
    Route::get('notes/create', 'create')->name('notes.create');
    Route::get('notes/{note}', 'show')->name('notes.show');
    Route::put('notes/{note}', 'update')->name('notes.update');
    Route::post('notes/{note}', 'destroy')->name('notes.delete');
    Route::get('notes/{note}/edit', 'edit')->name('notes.edit')->middleware('noteWare');
});

Route::controller(UploadFileController::class)->group(function(){
    Route::get('upload', 'index')->name('upload.home');
    Route::post('upload', 'store')->name('upload.store');
    Route::get('upload/create', 'create')->name('upload.create');
    Route::get('upload/{note}', 'show')->name('upload.show');
    Route::put('upload/{note}', 'update')->name('upload.update');
    Route::post('upload/{note}', 'destroy')->name('upload.delete');
    Route::get('upload/{note}/edit', 'edit')->name('upload.edit');
});