<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SpecimenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\User;



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
Route::controller(UserController::class)->group(function(){
    Route::get('/users', 'index')->name('mostrar');
    Route::delete('/users/{id}','delete')->name('delete.users');
    Route::patch('/users/{id}', 'update')->name('update');
    
});
// Ruta para gedners
Route::post('genders/create',[GenderController::class, 'create']);

//rutas para mostrar los autores
Route::get('authors',[AuthorController::class, 'index']);
Route::patch('authors/{id}', [AuthorController::class,'update']);

// rutas para libros
//Route::get('books',[BookController::class, 'index']);
//Route::get('books/filter',[BookController::class, 'filter']);

//rutas para prestamos
Route::post('loans/create', [LoanController::class, 'create']);
Route::patch('loans/update', [LoanController::class, 'update']);

//rutas para ejemplares
Route::patch('specimens/{id}', [SpecimenController::class, 'update']);
Route::get('specimens', [SpecimenController::class, 'index']);
Route::post('specimen', [SpecimenController::class, 'create']);
Route::delete('specimens/{id}', [SpecimenController::class, 'delete']);


Route::get('genders', [GenderController::class, 'index']);

/*
Route::get('users',function(){
    return User::all();
});

Route::get('users/{id}', function($id){
    return User::find($id);
});

Route::delete('users/{id}', function($id){
    User::destroy($id);
});

Route::patch('users', function(){
    User::Where('name', 'yolanda')->update (['name'=>'Ivan']);
});*/

/*
Route::get('users', function (){
    return User::WhereIn('id', [1,3])->get();
});*/
/*
Route::get('users/email', function (){
    return User::whereName('Aldo')->get();
});

/*Route::get('users', function (){
    return User::WhereNotIn('id', [1,3])->get();
});*/

/*Route::get('users', function (){
    return User::WhereBetween('id', [1,3])->get();
});*/

/*Route::get('users', function (){
    return User::WhereNotNull('updated_at')->get();
});*/
/*
Route::get('users', function () {
    return User::where('email', 'like', '%gmail.com')
    ->orWhere('email','like','%hotmail.com')->get();
});*/
