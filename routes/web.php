<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard',[
        'users' => User::all(),
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/agents',[UsersController::class,'getAgents'])->name('agents.index');
    Route::post('/store/user',[UsersController::class,'storeUser'])->name('agents.store');



    Route::get('/developers',[UsersController::class,'getDevelopers'])->name('developers.index');
    Route::get('/managers',[UsersController::class,'getManagers'])->name('managers.index');
    Route::get('/qas',[UsersController::class,'getQas'])->name('qas.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
