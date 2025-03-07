<?php

use App\Livewire\Welcome;
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


Route::get('/dashboard', Welcome::class);

Route::get('/', App\Livewire\Homepage\Index::class)->name('homepage.index');
Route::get('/books', App\Livewire\Homepage\Books::class)->name('homepage.book');
Route::get('/books/{slug}', App\Livewire\Homepage\BookDetail::class)->name('homepage.book.detail');
// Route::get('/categories', App\Livewire\Homepage\Categories::class)->name('homepage.category');
// Route::get('/categories/detail', App\Livewire\Homepage\CategoryDetail::class)->name('homepage.category.detail');



Route::get('/profile', App\Livewire\Profile\Index::class)->middleware('auth')->name('profile');

Route::middleware('guest')->group(function () {
    Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', App\Livewire\Auth\Register::class)->name('register');
});

Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/books', App\Livewire\Admin\Book\Index::class)->name('books.index');
    Route::get('/admin/books/create', App\Livewire\Admin\Book\Create::class)->name('books.create');
    Route::get('/admin/books/{id}/edit', App\Livewire\Admin\Book\Edit::class)->name('books.edit');

    Route::get('/admin/categories', App\Livewire\Admin\Category\Index::class)->name('categories.index');
    Route::get('/admin/categories/create', App\Livewire\Admin\Category\Create::class)->name('categories.create');
    Route::get('/admin/categories/{id}/edit', App\Livewire\Admin\Category\Edit::class)->name('categories.edit');

    Route::get('/admin/users', App\Livewire\Admin\User\Index::class)->name('users.index');

    Route::get('/admin/reviews', App\Livewire\Admin\Review\Index::class)->name('reviews.index');

});

