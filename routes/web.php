<?php

use App\Http\Controllers\AuthorController;
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
    
    
});*/


// Ruta para mostrar todos los usuarios
Route::get('/users', [UserController::class, 'index']);
Route::delete('users/{id}', [UserController::class,'delete']);
Route::patch('users/{id}', [UserController::class,'update']);
Route::post('users/create', [UserController::class,'create']);

//rutas para mostrar los autores
Route::get('authors',[AuthorController::class, 'index']);
Route::patch('authors/{id}', [AuthorController::class,'update']);


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
