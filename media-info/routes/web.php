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

Route::get('/login',[UserController::class,'login'])->name('user.login');

Route::post('/users/authenticate',[UserController::class,'authenticate']);

Route::post('/logout',[UserController::class,'logout']);

//Categories 
Route::get('/categories',[CategoryController::class, 'getCategories']);

//Movie
Route::get('/categories/{categoryId}',[MovieController::class ,'getAllMoviesByCategoryId']);

Route::get('/movie_page/{movie}',[MovieController::class, 'getMovie']);

//Comment
Route::get('/comments/{id}' , [CommentController::class , 'getCommentsByMovieId']);

Route::get('/commentCount/{id}', [CommentController::class, 'getCountCommentByMovieId']);

//Auth
Route::group(['middleware' => ['auth']], function () {
    Route::get('/editUser',[UserController::class, 'editPage']);
    Route::post('/storeEditUser', [UserController::class, 'storeEditUser']);

    Route::get('/add',[MovieController::class, 'addMovie']);
    Route::post('/storeMovie',[MovieController::class, 'storeMovie']);
    Route::get('/edit/{movie}',[MovieController::class, 'editMovie']);
    Route::post('/storeEditMovie',[MovieController::class, 'storeEditMovie']);

    Route::post('/addComment', [CommentController::class,'addComment']);

    return redirect('/');
});



