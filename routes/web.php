<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;

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

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });


Route::get('/', [GuestController::class, 'home']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
    Route::resources([
        'books' => BookController::class,
        'categories' => CategoryController::class,
        'users' => UserController::class,
    ]);

    Route::get('borrows/{id}', [ BookController::class, 'borrows'] )->name('books.borrows');
    Route::post('borrows', [ BookController::class, 'assignUser'] )->name('books.assignUser');
    
    Route::post('returnBook', [ BookController::class, 'returnBook'] )->name('books.return');
    
    
});

Route::get('booklist', [ BookController::class, 'booklist'] )->name('books.list');
Route::post('notifyme', [ BookController::class, 'notify_me'] )->name('books.notifyme');

