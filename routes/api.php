<?php

use App\Http\Controllers\Auth\AuthenticatedController;
use App\Http\Controllers\Auth\RegisteredController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookPhotoController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SpecimenController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;
use App\Http\Controllers\AuthorPhotoController;
use App\Http\Controllers\StatuController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
   // Route::apiResource('authors',AuthorController::class);
   // Route::apiResource('users', UserController::class);
    //Route::apiResource('books',AuthorController::class);
    //Route::apiResource('loans', UserController::class);
   // Route::apiResource('librarians',AuthorController::class);
    Route::apiResource('genders', UserController::class);
    Route::apiResource('status',StatuController::class);
    //Route::apiResource('specimens', UserController::class);
    
});


Route::group([
    'middleware' => 'auth:sanctum'
], static function (){
    Route::get('users', [UserController::class, 'index']);
    Route::patch('users', [UserController::class, 'update']);
    Route::delete('users', [UserController::class, 'delete']);
});




Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
    Route::get('books', [BookController::class,'index'])->name('books.index');
    Route::post('books', [BookController::class,'store'])->name('books.store');
    Route::put('books/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('books/{id}', [BookController::class, 'delete'])->name('books.delete');
    //Route::get('books',[BookController::class, 'bookdate']);
});


Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
    Route::get('loans', [LoanController::class, 'index'])->name('loans.index');
    Route::post('loans', [LoanController::class, 'store'])->name('loans.store');
    Route::patch('loans/{id}', [LoanController::class, 'update'])->name('loans.update');
    Route::delete('loans/{id}', [LoanController::class, 'delete'])->name('loans.delete');
});


Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
    Route::get('specimens', [SpecimenController::class, 'index'])->name('specimens.index');
    Route::post('specimens',[SpecimenController::class, 'store'])->name('specimens.store');
    Route::patch('specimens', [SpecimenController::class, 'update'])->name('specimens.update');
    Route::delete('specimens', [SpecimenController::class, 'delete'])->name('specimens.delete');
});

Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
    Route::get('librarians', [LibrarianController::class, 'index'])->name('librarians.index');
    Route::post('librarians',[LibrarianController::class,'store'])->name('librarians.store');
    Route::delete('librarians/{librarian}', [LibrarianController::class, 'destroy']);
    Route::patch('librarians/{id}', [LibrarianController::class, 'restore']);
});

Route::post('users', [UserController::class, 'store']);
Route::group(['middleware'=>'guest'],
static function (){
    Route::post('login',[AuthenticatedController::class, 'store'])->name('login');
});

Route::group([
    'controller' => BookPhotoController::class,
    'as' => 'books.photo.',
], static function () {
    Route::post('book/photo/file', 'storeFile')->name('file.store');
    Route::post('book/photo/base64', 'storeBase64')->name('base64.store');
});

Route::group([
    'controller' => AuthorPhotoController::class,
    'as' =>'authors.photo',
], static function(){
    Route::post('author/photo/file', 'storeFile')->name('author.file');
});



