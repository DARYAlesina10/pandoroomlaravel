<?php

/*
|--------------------------------------------------------------------------
Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AdminQuestController;


Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/quests/create', [AdminQuestController::class, 'create'])->name('admin.quests.create');
    Route::post('/admin/quests', [AdminQuestController::class, 'store'])->name('admin.quests.store');
    Route::get('/admin/quests/{id}/edit', [AdminQuestController::class, 'edit'])->name('admin.quests.edit');
    Route::put('/admin/quests/{id}', [AdminQuestController::class, 'update'])->name('admin.quests.update');
});