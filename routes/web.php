<?php

use App\Http\Controllers\AlgorithmController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');

    return "Кэш очищен.";
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // StudentController
    Route::resource('students', StudentController::class);

    // ContestController
    Route::resource('contests', ContestController::class);

    // ApplicationController
    Route::resource('applications', ApplicationController::class);
    Route::get('applications/create/student/{student}', [ApplicationController::class, 'create'])
        ->name('create.student.application');
    Route::post('applications/store/student/{student}', [ApplicationController::class, 'store'])
        ->name('store.student.application');

    // AlgorithmController
    Route::resource('algorithms', AlgorithmController::class);
    Route::controller(AlgorithmController::class)->group(function () {
        Route::get('algorithm1', 'algorithmByApplicationDate')->name('algorithm1');
        Route::get('algorithm2')->name('algorithm2');
    });
});

require __DIR__ . '/auth.php';
