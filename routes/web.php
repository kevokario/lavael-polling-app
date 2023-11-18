<?php

use App\Http\Controllers\PollController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','verified'])->group(function(){

    Route::prefix('dashboard')->group(function(){
        Route::get('/', function () {
            return view('portal.dashboard');
        })->name('dashboard');

        //poll routes
        Route::prefix('polls')->name('polls.')->group(function(){
            Route::get('/',[PollController::class,'index'])->name('view');
            Route::get('/add',[PollController::class,'viewAdd'])->name('add');
            Route::post('/create',[PollController::class,'create'])->name('create');

            Route::get('/users',[PollController::class,'viewUsersPoll'])->name('users');
            Route::get('/{id}',[PollController::class, 'viewSinglePoll'])->name('view.single');
        });

    });


});


require __DIR__.'/auth.php';
