<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Models\Inventory;

Route::get('/', function () {
    return view('welcome', ['inventories' => Inventory::all()]);
})->name('home');


Route::get('/create', [InventoryController::class, 'create']);


Route::post('/store', [InventoryController::class, 'store'])->name('store');


Route::get('/edit/{id}', [InventoryController::class, 'editData'])->name('edit');


Route::post('/update/{id}', [InventoryController::class, 'updateData'])->name('update');
 

Route::delete('/delete/{id}', [InventoryController::class, 'deleteData'])->name('delete');