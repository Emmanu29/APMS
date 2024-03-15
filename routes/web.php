<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConsultationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});

*/


/*
Route::get('/register',[UserController::class,'register']);

Route::get('/login',[UserController::class,'login'])->name('login')->middleware('guest');

Route::post('/login/process',[UserController::class,'process']);

Route::post('/logout',[UserController::class,'logout']);

Route::post('/store',[UserController::class,'store']);




Route::get('/', [AnimalController::class, 'index'])->middleware('auth');;

Route::get('/add/animal', [AnimalController::class, 'create']);

Route::post('/add/animal',[AnimalController::class, 'store']);

Route::get('/animal/{animal}', [AnimalController::class, 'show']);

Route::put('/animal/{animal}',[AnimalController::class, 'update']);

Route::delete('/animal/{animal}', [AnimalController::class, 'destroy'])->name('animal.destroy');
*/

Route::controller(UserController::class)->group(function(){

     Route::get('/register','register');

     Route::get('/login','login')->name('login')->middleware('guest');

    // Route::post('/login/process', 'process')->middleware('checkIsDeleted');

    // Route::post('/logout', 'logout');

    // Route::post('/store', 'store')->middleware('checkIsDeleted');

    // Route::get('/users', 'index')->middleware(['auth', 'checkIsDeleted']);

    // Route::get('/user/{user}', 'show')->middleware('checkIsDeleted');

    // Route::put('/user/{user}', 'update')->middleware('checkIsDeleted');

    // Route::delete('/user/{user}', 'destroy')->name('user.destroy')->middleware('checkIsDeleted');

    Route::post('/login/process','process');

    Route::post('/logout','logout');

    Route::post('/store','store');

    Route::get('/users','index')->middleware('auth');

    Route::get('/user/{user}', 'show');

    Route::put('/user/{user}', 'update');

    Route::delete('/user/{user}', 'destroy')->name('user.destroy');

    Route::get('/users/search',  'search')->name('users.search');
});

Route::controller(AnimalController::class)->group(function(){
    Route::get('/patients','index')->middleware('auth');

    Route::get('/','showDashboard')->middleware('auth');

    Route::get('/add/animal','create');

    Route::post('/add/animal','store');

    Route::get('/animal/{animal}', 'show');

    Route::put('/animal/{animal}', 'update');

    Route::delete('/animal/{animal}', 'destroy')->name('animal.destroy');

    Route::get('/animals/search',  'search')->name('animals.search');
    
});


Route::controller(ConsultationController::class)->group(function(){
    Route::get('/consultation/{consultation}','showReview');

    Route::post('/add/review', 'storeExpertReview');
});