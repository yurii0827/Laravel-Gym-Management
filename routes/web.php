<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CityManagerController;
use App\Http\Controllers\GymManagerController;
use App\Http\Controllers\AllUsersController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StripeController;

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
#=======================================================================================#
#			                           Home Route                               	    #
#=======================================================================================#
Route::get('stripe', [StripeController::class, 'stripe']);
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');

Route::get('/', [WelcomeController::class, 'index'])->name('welcome')->middleware('auth')->middleware('logs-out-banned-user');
#=======================================================================================#
#			                        Gym Controller Routes                              	#
#=======================================================================================#
Route::controller(GymController::class)->group(function () {

    Route::get('/gym/create', 'create')->name('gym.create')->middleware('auth');
    Route::post('/gym/store', 'store')->name('gym.store')->middleware('auth');
    Route::get('/gym/edit/{gym}', 'edit')->name('gym.edit')->middleware('auth');
    Route::put('/gym/update/{gym}', 'update')->name('gym.update')->middleware('auth');

    Route::delete('/gym/{id}', 'deleteGym')->name('gym.delete')->middleware('auth');

    Route::get('/gym/list', 'list')->name('gym.list')->middleware('auth');
    Route::get('/gym/show/{id}', 'show')->name('gym.show')->middleware('auth');
});

Route::get('/gym/training', function () {
    return view('gym.training_session')->name('gym.session');
})->middleware('auth')->middleware('logs-out-banned-user');

#=======================================================================================#
#			                    Coach Controller Routes                              	#
#=======================================================================================#
Route::controller(CoachController::class)->group(function () {
    Route::get('/coach/create', 'create')->name('coach.create')->middleware('auth');
    Route::post('/coach/store', 'store')->name('coach.store')->middleware('auth');
    Route::get('/coach/edit/{coach}', 'edit')->name('coach.edit')->middleware('auth');
    Route::put('/coach/update/{coach}', 'update')->name('coach.update')->middleware('auth');

    Route::delete('/coach/{id}', 'deleteCoach')->name('coach.delete')->middleware('auth');

    Route::get('/coach/list', 'list')->name('coach.list')->middleware('auth');
    Route::get('/coach/show/{id}', 'show')->name('coach.show')->middleware('auth');
});

#=======================================================================================#
#			                          Admin Routes                                  	#
#=======================================================================================#

Route::get('/user/show-profile', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/user/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_admin_profile')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/gym/training_session', [TrainingController::class, 'create'])->name('gym.training_session')->middleware('auth')->middleware('logs-out-banned-user');

#=======================================================================================#
#			                         Training Routes                                  	#
#=======================================================================================#
Route::get('/TrainingSessions/index', [TrainingController::class, 'index'])->name('TrainingSessions.listSessions')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/TrainingSessions/create_session', [TrainingController::class, 'create'])->name('TrainingSessions.training_session')->middleware('auth')->middleware('logs-out-banned-user');
Route::post('/TrainingSessions/sessions', [TrainingController::class, 'store'])->name('TrainingSessions.store')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/TrainingSessions/sessions/{session}', [TrainingController::class, 'show'])->name('TrainingSessions.show_training_session')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/TrainingSessions/{session}/edit', [TrainingController::class, 'edit'])->name('TrainingSessions.edit_training_session')->middleware('auth')->middleware('logs-out-banned-user');
Route::delete('/TrainingSessions/{session}  ', [TrainingController::class, 'deleteSession'])->name('TrainingSessions.delete_session')->middleware('auth')->middleware('logs-out-banned-user');
Route::put('/TrainingSessions/{session}', [TrainingController::class, 'update'])->name('TrainingSessions.update_session')->middleware('auth')->middleware('logs-out-banned-user');

#=======================================================================================#
#			                            User Routes                                   	#
#=======================================================================================#
Route::get('/user/{id}', [UserController::class, 'show_profile'])->name('user.admin_profile')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/user/{users}/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit_admin_profile')->middleware('auth')->middleware('logs-out-banned-user');
Route::put('/user/{users}', [UserController::class, 'update'])->name('user.update')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/user', [UserController::class, 'index'])->name('layouts.user-layout')->middleware('auth')->middleware('logs-out-banned-user');
#=======================================================================================#
#			                            Auth Routes                                  	#
#=======================================================================================#
Auth::routes();


#=======================================================================================#
#			                           City Managers Routes                          	#
#=======================================================================================#
Route::controller(CityManagerController::class)->group(function () {
    Route::get('/cityManager/create', 'create')->name('cityManager.create')->middleware('auth')->middleware('logs-out-banned-user');
    Route::post('/cityManager/store', 'store')->name('cityManager.store')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/cityManager/list', 'list')->name('cityManager.list')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/cityManager/edit/{id}', 'edit')->name('cityManager.edit')->middleware('auth')->middleware('logs-out-banned-user');
    Route::put('/cityManager/update/{id}', 'update')->name('cityManager.update')->middleware('auth')->middleware('logs-out-banned-user');
    Route::delete('/cityManager/{id}', 'deletecityManager')->name('cityManager.delete')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/cityManager/show/{id}', 'show')->name('cityManager.show')->middleware('auth')->middleware('logs-out-banned-user');
});
#=======================================================================================#
#			                           Gym Managers Routes                          	#
#=======================================================================================#
Route::controller(GymManagerController::class)->group(function () {
    Route::get('/gymManager/create', 'create')->name('gymManager.create')->middleware('auth')->middleware('logs-out-banned-user');
    Route::post('/gymManager/store', 'store')->name('gymManager.store')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/gymManager/list', 'list')->name('gymManager.list')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/gymManager/edit/{gym}', 'edit')->name('gymManager.edit')->middleware('auth')->middleware('logs-out-banned-user');
    Route::put('/gymManager/update/{gym}', 'update')->name('gymManager.update')->middleware('auth')->middleware('logs-out-banned-user');
    Route::delete('/gymManager/{id}', 'deletegymManager')->name('gymManager.delete')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/gymManager/show/{id}', 'show')->name('gymManager.show')->middleware('auth')->middleware('logs-out-banned-user');
});
#=======================================================================================#
#			                            Ban User                              	        #
#=======================================================================================#
Route::get('/banUser/{userID}', [UserController::class, 'banUser'])->name('user.banUser')->middleware('auth')->middleware('logs-out-banned-user');
Route::get('/listBanned', [UserController::class, 'listBanned'])->name('user.listBanned')->middleware('auth')->middleware('logs-out-banned-user');
Route::PATCH('/unBan/{userID}', [UserController::class, 'unBan'])->name('user.unBan')->middleware('auth')->middleware('logs-out-banned-user');
<<<<<<< HEAD
#=======================================================================================#
#			                           Traing packege                              	        #
#=======================================================================================#
Route::get('/trainingPackeges/list', [UserController::class, ''])->name('')->middleware('auth')->middleware('');
=======

/* notFound route */
Route::get('/unAuth', [UserController::class, 'unAuth'])->name('500')->middleware('auth')->middleware('logs-out-banned-user');

#=======================================================================================#
#			                            All users Route                          	    #
#=======================================================================================#
Route::controller(AllUsersController::class)->group(function () {
    Route::get('/allUsers/list', 'list')->name('allUsers.list')->middleware('auth')->middleware('logs-out-banned-user');
    Route::get('/allUsers/show/{id}', 'show')->name('allUsers.show')->middleware('auth')->middleware('logs-out-banned-user');
    Route::delete('/allUsers/{id}', 'deletegymManager')->name('allUsers.delete')->middleware('auth')->middleware('logs-out-banned-user');
});
Route::get('/unBan/{userID}', [UserController::class, 'unBan'])->name('user.unBan')->middleware('auth')->middleware('logs-out-banned-user');
>>>>>>> 587470a155106b2d53147cb1ee698cf81f96d660
