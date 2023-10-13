<?php
use App\Http\Controllers\ShortenController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/shortens', [ShortenController::class, 'index'])->name('shortens.index');
Route::get('/shortens/create', [ShortenController::class, 'create'])->name('shortens.create');
Route::get('/shortens/detail', [ShortenController::class, 'detail'])->name('shortens.detail');
Route::post('/create', [ShortenController::class, 'store'])->name('shortens.store');
Route::get('/shortens/{id}/edit', [ShortenController::class, 'show'])->name('shortens.show');
Route::put('/shortens/{id}', [ShortenController::class, 'update'])->name('shortens.update');
Route::delete('/shortens/{id}', [ShortenController::class, 'destroy'])->name('shortens.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
