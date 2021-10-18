<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommandeDetailController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::get('/{category}', [ItemController::class, 'index'])->name('items');
Route::post('/commande/item/store', [CommandeDetailController::class, 'store'])->name('commande.item.store');


