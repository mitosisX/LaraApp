<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// Route::resource('notes', NotesController::class);

Route::controller(NotesController::class)->group(function(){
    Route::get('notes', 'index')->name('notes.home');
    Route::post('notes', 'store')->name('notes.store');
    Route::get('notes/create', 'create')->name('notes.create');
    Route::get('notes/{note}', 'show')->name('notes.show');
    Route::put('notes/{note}', 'update')->name('notes.update');
    Route::post('notes/{note}', 'destroy')->name('notes.delete');
    Route::get('notes/{note}/edit', 'edit')->name('notes.edit');
});