<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommandeDetailController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;

Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::post('/commande/item/store', [CommandeDetailController::class, 'store'])->name('commande.item.store');
Route::post('/commande/item/destroy', [CommandeDetailController::class, 'destroy'])->name('commande.item.destroy');
Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');
Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');
Route::get('/commande/counter', [CommandeController::class, 'counter'])->name('commande.counter');
Route::get('/commande/all', [CommandeController::class, 'all'])->name('commande.all');
Route::post('/commande/ticket', [CommandeController::class, 'ticket'])->name('commande.ticket');
Route::post('/commande/ticket/close', [CommandeController::class, 'ticketClose'])->name('commande.ticket.close');
Route::get('/commande/number', [CommandeController::class, 'getNumber'])->name('commande.number');

Route::get('/item/index/{category}', [ItemController::class, 'index'])->name('items');
Route::get('/item/create', [ItemController::class, 'create'])->name('item.create');
Route::get('/item/edit/{item}', [ItemController::class, 'edit'])->name('item.edit');
Route::post('/item/store', [ItemController::class, 'store'])->name('item.store');
Route::put('/item/update/{item}', [ItemController::class, 'update'])->name('item.update');
Route::post('/item/destroy', [ItemController::class, 'destroy'])->name('item.destroy');
Route::post('/item/activate', [ItemController::class, 'activate'])->name('item.activate');

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::put('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::post('/category/activate', [CategoryController::class, 'activate'])->name('category.activate');

Route::post('file/upload', [FileUploadController::class, 'upload'])->name('file.upload');
Route::post('file/read', [FileUploadController::class, 'getFiles'])->name('file.read');
Route::post('file/destroy', [FileUploadController::class, 'destroy'])->name('file.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
