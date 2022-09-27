<?php

use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;


Route::fallback(function(){
    return redirect()->route('notes.home');
});

Route::resource('notes', NotesController::class)
->names([
    'index' => 'notes.home',
    'store' => 'notes.store',
    'create' => 'notes.create',
    'show' => 'notes.show',
    'update' => 'notes.update',
    'destroy' => 'notes.delete',
    'edit' => 'notes.edit',
]);