<?php

use App\Http\Controllers\Auth\AuthenticatedController;
use App\Http\Controllers\Auth\RegisteredController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LibrarianController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SpecimenController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DependencyInjection\RegisterControllerArgumentLocatorsPass;

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
    'middleware' => 'auth:sanctum'
], static function (){
    Route::get('users', [UserController::class, 'index']);
   // Route::post('users', [UserController::class, 'create']);
    Route::patch('users', [UserController::class, 'update']);
    Route::delete('users', [UserController::class, 'delete']);
});


Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
    Route::get('books', [BookController::class, 'index']);
    Route::post('books', [BookController::class, 'create']);
    Route::put('books/{id}', [BookController::class, 'update']);
    Route::delete('books/{id}', [BookController::class, 'delete']);
});

Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
    Route::post('authors', [AuthorController::class, 'create']);
});

Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
    Route::get('loans', [LoanController::class, 'index']);
    Route::post('loans', [LoanController::class, 'create']);
    Route::patch('loans', [LoanController::class, 'update']);
    Route::delete('loans', [LoanController::class, 'delete']);
});

Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
    Route::get('authors', [AuthorController::class, 'index']);
    Route::post('authors', [AuthorController::class, 'create']);
    Route::patch('authors', [AuthorController::class, 'update']);
    Route::delete('authors', [AuthorController::class, 'delete']);
});

Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
    Route::get('specimens', [SpecimenController::class, 'index']);
    Route::post('specimens',[SpecimenController::class, 'create']);
    Route::patch('specimens', [SpecimenController::class, 'update']);
    Route::delete('specimens', [SpecimenController::class, 'delete']);
});

Route::group([
    'middleware'=>'auth:sanctum'
], static function(){
    Route::get('librarians', [LibrarianController::class, 'index']);
});

Route::group(['middleware'=>'guest'],
static function (){
    Route::post('login',[AuthenticatedController::class, 'store'])->name('login');
});

