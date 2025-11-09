<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\QuestBookingController;
use App\Http\Controllers\QuestController;
use App\Http\Controllers\AdminQuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\ProfileController;
Route::post('/admin/register', [AdminRegisterController::class, 'register']);



// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Маршруты для квестов
Route::get('/quests', [QuestController::class, 'index'])->name('quests.index');
Route::get('/quests/{id}', [QuestController::class, 'show'])->name('quests.show');
Route::post('/quests/{id}/book', [QuestBookingController::class, 'store'])->name('quests.book');
Route::get('/login', [Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [Auth\LoginController::class, 'login']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Личный кабинет (доступен только авторизованным пользователям)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
});

// Страница администратора (доступна только администраторам)
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/quests', [AdminQuestController::class, 'index'])->name('admin.quests');
	Route::get('/admin/quests/create', [AdminQuestController::class, 'create'])->name('admin.create');
    Route::post('/admin/quests', [AdminQuestController::class, 'store'])->name('admin.store');
    Route::get('/admin/quests/{id}/edit', [AdminQuestController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/quests/{id}', [AdminQuestController::class, 'update'])->name('admin.update');
	
	
});