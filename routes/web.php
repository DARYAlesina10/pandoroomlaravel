<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminManualController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminQuestController;
use App\Http\Controllers\AdminQuestScheduleController;
use App\Http\Controllers\AdminScheduleOverviewController;
use App\Http\Controllers\AdminQuestBookingController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminHallController;
use App\Http\Controllers\AdminTableController;
use App\Http\Controllers\AdminTableScheduleController;
use App\Http\Controllers\AdminTableBookingController;
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
    Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/manuals', [AdminManualController::class, 'index'])->name('admin.manuals');
    Route::get('/admin/quests', [AdminQuestController::class, 'index'])->name('admin.quests');
    Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
    Route::get('/admin/schedule-overview', [AdminScheduleOverviewController::class, 'index'])->name('admin.schedule.overview');
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users');
    Route::get('/admin/pages', [AdminPageController::class, 'index'])->name('admin.pages');
    Route::get('/admin/halls', [AdminHallController::class, 'index'])->name('admin.halls');
    Route::post('/admin/halls', [AdminHallController::class, 'store'])->name('admin.halls.store');
    Route::put('/admin/halls/{hall}', [AdminHallController::class, 'update'])->name('admin.halls.update');
    Route::delete('/admin/halls/{hall}', [AdminHallController::class, 'destroy'])->name('admin.halls.destroy');
    Route::get('/admin/tables', [AdminTableController::class, 'index'])->name('admin.tables');
    Route::post('/admin/tables', [AdminTableController::class, 'store'])->name('admin.tables.store');
    Route::put('/admin/tables/{table}', [AdminTableController::class, 'update'])->name('admin.tables.update');
    Route::delete('/admin/tables/{table}', [AdminTableController::class, 'destroy'])->name('admin.tables.destroy');
    Route::get('/admin/tables/schedule', [AdminTableScheduleController::class, 'index'])->name('admin.tables.schedule');
    Route::post('/admin/tables/bookings', [AdminTableBookingController::class, 'store'])->name('admin.tables.bookings.store');
    Route::get('/admin/quests/create', [AdminQuestController::class, 'create'])->name('admin.create');
    Route::post('/admin/quests', [AdminQuestController::class, 'store'])->name('admin.store');
    Route::get('/admin/quests/{id}/edit', [AdminQuestController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/quests/{id}', [AdminQuestController::class, 'update'])->name('admin.update');

    Route::get('/admin/quests/{quest}/schedule', [AdminQuestScheduleController::class, 'edit'])->name('admin.quests.schedule');
    Route::put('/admin/quests/{quest}/schedule/pricing', [AdminQuestScheduleController::class, 'updatePricing'])->name('admin.quests.schedule.pricing');
    Route::post('/admin/quests/{quest}/slots', [AdminQuestScheduleController::class, 'storeSlot'])->name('admin.quests.slots.store');
    Route::put('/admin/quests/{quest}/slots/{slot}', [AdminQuestScheduleController::class, 'updateSlot'])->name('admin.quests.slots.update');
    Route::delete('/admin/quests/{quest}/slots/{slot}', [AdminQuestScheduleController::class, 'destroySlot'])->name('admin.quests.slots.destroy');
    Route::post('/admin/quests/{quest}/bookings', [AdminQuestBookingController::class, 'store'])->name('admin.quests.bookings.store');
});
