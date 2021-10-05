<?php

use App\Http\Controllers\GroupeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [GroupeController::class, 'index'])->name('home');

