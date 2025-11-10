<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminQuestController;
use App\Http\Controllers\AdminQuestScheduleController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestBookingController;
use App\Http\Controllers\QuestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::post('/admin/register', [AdminRegisterController::class, 'register']);

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Маршруты для квестов
Route::get('/quests', [QuestController::class, 'index'])->name('quests.index');
Route::get('/quests/{id}', [QuestController::class, 'show'])->name('quests.show');
Route::get('/quests/{id}/schedule', [QuestController::class, 'schedule'])->name('quests.schedule');
Route::post('/quests/{id}/book', [QuestBookingController::class, 'store'])->name('quests.book');

// Аутентификация
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Личный кабинет (доступен только авторизованным пользователям)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// Страница администратора (доступна только администраторам)
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/quests', [AdminQuestController::class, 'index'])->name('admin.quests');
    Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
    Route::get('/admin/quests/create', [AdminQuestController::class, 'create'])->name('admin.create');
    Route::post('/admin/quests', [AdminQuestController::class, 'store'])->name('admin.store');
    Route::get('/admin/quests/{id}/edit', [AdminQuestController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/quests/{id}', [AdminQuestController::class, 'update'])->name('admin.update');

    Route::get('/admin/quests/{quest}/schedule', [AdminQuestScheduleController::class, 'edit'])->name('admin.quests.schedule');
    Route::put('/admin/quests/{quest}/schedule/pricing', [AdminQuestScheduleController::class, 'updatePricing'])->name('admin.quests.schedule.pricing');
    Route::post('/admin/quests/{quest}/slots', [AdminQuestScheduleController::class, 'storeSlot'])->name('admin.quests.slots.store');
    Route::put('/admin/quests/{quest}/slots/{slot}', [AdminQuestScheduleController::class, 'updateSlot'])->name('admin.quests.slots.update');
    Route::delete('/admin/quests/{quest}/slots/{slot}', [AdminQuestScheduleController::class, 'destroySlot'])->name('admin.quests.slots.destroy');
});
