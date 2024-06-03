<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', function () { //! call back function
    return view('welcome');   //! ==> Function Call take View Name
});

Route::get("/posts" ,[PostController::class , 'index'] )-> name('posts.index'); 

Route::get("/posts/create" , [PostController::class , 'create' ]) -> name('posts.create') ; 
//! add static route above dynamic route

Route::post("/posts" ,[PostController::class , 'store'] ) -> name('posts.store'); 

Route::get('/posts/{post}/edit' , [PostController::class , 'edit'])-> name('posts.edit') ; 

Route::put('/posts/{post} ' , [PostController::class , 'update'])-> name('posts.update');

Route::get("/posts/{post}" , [PostController::class , 'show']) -> name('posts.show') ; 

Route::delete('/posts/{post} ' , [PostController::class , 'destroy'])-> name('posts.delete');


//! 1- define a new route so the user can access it throught browser

//! 2- define controller that renders a view 

//! 3 - define view that contains list of posts

//! 4 - remove any static html data from view 

//! {} => Dynamic variable Like id

//! اسم ال model مفرد 

//! اسم ال table جمع 

//! eloquemt model ==> model class 

//! مينفعش اعمل loop علي collection

//! Posts => is object from collection 

//! post => is object from model class

//! one User have many Posts

//! ORM -> Object-Relational Mapper -> عشان احول من الداتا بيز record الي objects