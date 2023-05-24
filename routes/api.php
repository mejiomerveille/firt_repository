<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostsController;
use App\Http\Controllers\Api\CommentsController;
use App\Http\Controllers\Api\LikesController;
use App\Http\Controllers\Api\PaiementsController;
use App\Http\Controllers\Api\CommandesController;/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',[AuthController::class,'login']);

Route::get('logout', [AuthController::class, 'logout']);

//post
Route::post('posts/create', [PostsController::class, 'create'])->middleware('JWTAuth');
Route::post('posts/delete', [PostsController::class, 'delete'])->middleware('JWTAuth');
Route::post('posts/update', [PostsController::class, 'update'])->middleware('JWTAuth');
Route::get('posts', [PostsController::class, 'posts'])->middleware('JWTAuth');

//comments
Route::post('comments/create', [CommentsController::class, 'create'])->middleware('JWTAuth');
Route::post('comments/delete', [CommentsController::class, 'delete'])->middleware('JWTAuth');
Route::post('comments/update', [CommentsController::class, 'update'])->middleware('JWTAuth');
Route::post('posts/comments', [CommentsController::class, 'comments'])->middleware('JWTAuth');

//like
Route::post('posts/like', [LikesController::class, 'like'])->middleware('JWTAuth');

//paiements
Route::post('paiements/create', [PaiementsController::class, 'create'])->middleware('JWTAuth');
Route::post('paiements/delete', [PaiementsController::class, 'delete'])->middleware('JWTAuth');
Route::post('paiements/update', [PaiementsController::class, 'update'])->middleware('JWTAuth');
Route::get('commandes/paiements', [PaiementsController::class, 'commandes'])->middleware('JWTAuth');

//commandes
Route::post('commandes/create', [CommandesController::class, 'create'])->middleware('JWTAuth');
Route::post('commandes/delete', [CommandesController::class, 'delete'])->middleware('JWTAuth');
Route::post('commandes/update', [CommandesController::class, 'update'])->middleware('JWTAuth');
Route::post('commandes', [CommandesController::class, 'commandes'])->middleware('JWTAuth');