<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\CommandeDetailController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ItemOptionController;

Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::post('/commande/item/store', [CommandeDetailController::class, 'store'])->name('commande.item.store');
Route::post('/commande/item/destroy', [CommandeDetailController::class, 'destroy'])->name('commande.item.destroy');
Route::get('/commande', [CommandeController::class, 'index'])->name('commande.index');
Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');
Route::post('/commande/destroy', [CommandeController::class, 'destroy'])->name('commande.destroy')->middleware('auth');
Route::get('/commande/counter', [CommandeController::class, 'counter'])->name('commande.counter');
Route::get('/commande/all', [CommandeController::class, 'all'])->name('commande.all')->middleware('auth');
Route::get('/commande/closed', [CommandeController::class, 'closed'])->name('commande.closed')->middleware('auth');
Route::post('/commande/ticket', [CommandeController::class, 'ticket'])->name('commande.ticket');
Route::post('/commande/ticket/close', [CommandeController::class, 'ticketClose'])->name('commande.ticket.close');
Route::get('/commande/number', [CommandeController::class, 'getNumber'])->name('commande.number');
Route::get('/commande/getBy', [CommandeController::class, 'getBy'])->name('commande.getBy')->middleware('auth');
Route::get('/commande/queue', [CommandeController::class, 'queue'])->name('commande.queue');

Route::get('/item/index/{category}', [ItemController::class, 'index'])->name('items');
Route::get('/item/create', [ItemController::class, 'create'])->name('item.create')->middleware('auth');
Route::get('/item/edit/{item}', [ItemController::class, 'edit'])->name('item.edit')->middleware('auth');
Route::post('/item/store', [ItemController::class, 'store'])->name('item.store')->middleware('auth');
Route::put('/item/update/{item}', [ItemController::class, 'update'])->name('item.update')->middleware('auth');
Route::post('/item/destroy', [ItemController::class, 'destroy'])->name('item.destroy')->middleware('auth');
Route::post('/item/activate', [ItemController::class, 'activate'])->name('item.activate')->middleware('auth');

Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware('auth');
Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit')->middleware('auth');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store')->middleware('auth');
Route::put('/category/update/{category}', [CategoryController::class, 'update'])->name('category.update')->middleware('auth');
Route::post('/category/activate', [CategoryController::class, 'activate'])->name('category.activate')->middleware('auth');

Route::get('/item/option/create', [ItemOptionController::class, 'create'])->name('item.option.create')->middleware('auth');
Route::get('/item/option/edit/{option}', [ItemOptionController::class, 'edit'])->name('item.option.edit')->middleware('auth');
Route::put('/item/option/update/{option}', [ItemOptionController::class, 'update'])->name('item.option.update')->middleware('auth');
Route::post('/item/option/store', [ItemOptionController::class, 'store'])->name('item.option.store')->middleware('auth');

Route::post('file/upload', [FileUploadController::class, 'upload'])->name('file.upload')->middleware('auth');
Route::post('file/read', [FileUploadController::class, 'getFiles'])->name('file.read')->middleware('auth');
Route::post('file/destroy', [FileUploadController::class, 'destroy'])->name('file.destroy')->middleware('auth');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/print', [CommandeController::class, 'print']);

require __DIR__.'/auth.php';
