<?php
use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\HomeController;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\MovieController;
use App\Http\Controllers\CommentController;
use  App\Http\Controllers\CategoryController;

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

//Home 
Route::get('/',[HomeController::class,'index']);

//User
Route::get('/register',[UserController::class,'create']);

Route::post('/users',[UserController::class,'store']);

Route::get('/login',[UserController::class,'login']);

Route::post('/users/authenticate',[UserController::class,'authenticate']);

Route::post('/logout',[UserController::class,'logout']);

Route::get('/editUser',[UserController::class, 'editPage']);

Route::post('/storeEditUser', [UserController::class, 'storeEditUser']);

//Categories 
Route::get('/categories',[CategoryController::class, 'getCategoris']);

//Movie
Route::get('/categories/{name}',[MovieController::class ,'getAllMoviesByCategory']);

Route::get('/movie_page/{movie}',[MovieController::class, 'getMovie']);

Route::get('/add',[MovieController::class, 'addMovie']);

Route::post('/storeMovie',[MovieController::class, 'storeMovie']);

//Comment
Route::get('/comments/{id}' , [CommentController::class , 'getCommentsByMovieId']);

Route::post('/addComment', [CommentController::class,'addComment']);

Route::get('/commentCount/{id}', [CommentController::class, 'getCountCommentByMovieId']);


