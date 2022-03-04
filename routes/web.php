<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
Route::get('/gym/training', function () {
    return view('gym.training_session')->name('gym.session');
})->middleware('auth');

//////****Gym Controller Routes*****////////

Route::controller(GymController::class)->group(function () {
    Route::get('/gym/create', 'create')->name('gym.create')->middleware('auth');
    Route::post('/gym/store', 'store')->name('gym.store')->middleware('auth');
    Route::get('/gym/edit/{gym}', 'edit')->name('gym.edit')->middleware('auth');
    Route::put('/gym/update/{gym}', 'update')->name('gym.update')->middleware('auth');
    Route::delete('/gym/delete/{id}', 'delete')->name('gym.delete')->middleware('auth');
    Route::get('/gym/list', 'list')->name('gym.list')->middleware('auth');
    Route::get('/gym/show/{id}', 'show')->name('gym.show')->middleware('auth');
});

<<<<<<< HEAD

Route::controller(CoachController::class)->group(function () {
    Route::get('/coach/create', 'create')->name('coach.create')->middleware('auth');
    Route::post('/coach/store', 'store')->name('coach.store')->middleware('auth');
    Route::get('/coach/edit/{coach}', 'edit')->name('coach.edit')->middleware('auth');
    Route::put('/coach/update/{coach}', 'update')->name('coach.update')->middleware('auth');
    Route::delete('/coach/delete/{id}', 'delete')->name('coach.delete')->middleware('auth');
    Route::get('/coach/list', 'list')->name('coach.list')->middleware('auth');
    Route::get('/coach/show/{id}', 'show')->name('coach.show')->middleware('auth');
});


Route::get('/user/show-profile', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('auth');
Route::get('/user/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_admin_profile')->middleware('auth');

Route::get('/gym/training_session', [TrainingController::class, 'create'])->name('gym.training_session')->middleware('auth');
=======
///***Training Routes***///
Route::get('/gym/sessions', [TrainingController::class, 'index'])->name('gym.listSessions')->middleware('auth');
Route::get('/gym/create_session', [TrainingController::class, 'create'])->name('gym.training_session')->middleware('auth');
Route::post('/gym/sessions', [TrainingController::class, 'store'])->name('gym_session.store')->middleware('auth');
Route::get('/gym/sessions/{session}', [TrainingController::class, 'show'])->name('gym.show_training_session')->middleware('auth');
Route::get('/gym/sessions/{session}/edit', [TrainingController::class, 'edit'])->name('gym.edit_training_session')->middleware('auth');
Route::delete('/gym/sessions/{session}', [TrainingController::class, 'destroy'])->name('gym.delete_session')->middleware('auth');
Route::put('/gym/sessions/{session}', [TrainingController::class, 'update'])->name('gym.update_session')->middleware('auth');
>>>>>>> ee1d150688fd24bdafa12a660c6abde972147e16

///***User Routes***///
Route::get('/user/{id}', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('auth');
Route::get('/user/{users}/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_admin_profile')->middleware('auth');
Route::put('/user/{users}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::get('/user', [UserController::class, 'index'])->name('layouts.user-layout')->middleware('auth');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');