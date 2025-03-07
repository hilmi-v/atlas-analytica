<?php

use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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



// homepage
Route::get('/', App\Livewire\Homepage\Index::class)->name('homepage.index');
Route::get('/books', App\Livewire\Homepage\Books::class)->name('homepage.book');
Route::get('/books/{slug}', App\Livewire\Homepage\BookDetail::class)->name('homepage.book.detail');
Route::get('/user/{username}', App\Livewire\Homepage\UserDetail::class)->name('homepage.user');

Route::get('/categories', App\Livewire\Homepage\Categories::class)->name('homepage.category');
Route::get('/categories/{slug}', App\Livewire\Homepage\CategoryDetail::class)->name('homepage.category.detail');


// profile
Route::get('/profile', App\Livewire\Profile\Index::class)->middleware(['auth', 'verified'])->name('profile');

Route::middleware('guest')->group(function () {
    Route::get('/login', App\Livewire\Auth\Login::class)->name('login');
    Route::get('/register', App\Livewire\Auth\Register::class)->name('register');
    Route::get('/forgot-password', App\Livewire\Auth\ForgotPassword::class)->name('forgot.password');
    Route::get('/reset-password/{token}', App\Livewire\Auth\ResetPassword::class)->name('password.reset');
});

// verification
Route::get('/email/verify', App\Livewire\Auth\EmailNotice::class)->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/profile');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back();
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->middleware('auth')->name('logout');

// admin
Route::middleware(['auth', 'role:admin', 'verified'])->group(function () {
    Route::get('/dashboard', Welcome::class);

    Route::get('/admin/books', App\Livewire\Admin\Book\Index::class)->name('books.index');
    Route::get('/admin/books/create', App\Livewire\Admin\Book\Create::class)->name('books.create');
    Route::get('/admin/books/{id}/edit', App\Livewire\Admin\Book\Edit::class)->name('books.edit');

    Route::get('/admin/categories', App\Livewire\Admin\Category\Index::class)->name('categories.index');
    Route::get('/admin/categories/create', App\Livewire\Admin\Category\Create::class)->name('categories.create');
    Route::get('/admin/categories/{id}/edit', App\Livewire\Admin\Category\Edit::class)->name('categories.edit');

    Route::get('/admin/users', App\Livewire\Admin\User\Index::class)->name('users.index');

    Route::get('/admin/reviews', App\Livewire\Admin\Review\Index::class)->name('reviews.index');
});

