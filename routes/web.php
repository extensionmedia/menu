<?php

use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;


Route::get('/', [GroupeController::class, 'index'])->name('home');
Route::get('/{category}', [ItemController::class, 'index'])->name('items');

