<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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

// Route::post('login','Api\AuthController@login');
Route::post('/login',[AuthController::class,'login']);

Route::post('register','Api\AuthController@register');
Route::get('logout','Api\AuthController@logout');

//post
Route::post('posts/create','Api\PostsController@create')->middleware('JWTAuth');
Route::post('posts/delete','Api\PostsController@delete')->middleware('JWTAuth');
Route::post('posts/update','Api\PostsController@update')->middleware('JWTAuth');
Route::get('posts','Api\PostsController@posts')->middleware('JWTAuth');

//comments
Route::post('comments/create','Api\CommentsController@create')->middleware('JWTAuth');
Route::post('comments/delete','Api\CommentsController@delete')->middleware('JWTAuth');
Route::post('comments/update','Api\CommentsController@update')->middleware('JWTAuth');
Route::post('posts/comments','Api\CommentsController@comments')->middleware('JWTAuth');
//like
Route::post('posts/like','Api\LikesController@like')->middleware('JWTAuth');
//paiements
Route::post('paiements/create','Api\PaiementsController@create')->middleware('JWTAuth');
Route::post('paiements/delete','Api\PaiementsController@delete')->middleware('JWTAuth');
Route::post('paiements/update','Api\PaiementsController@update')->middleware('JWTAuth');
Route::get('commandes/paiements','Api\PaiementsController@commandes')->middleware('JWTAuth');

//commandes
Route::post('commandes/create','Api\CommandesController@create')->middleware('JWTAuth');
Route::post('commandes/delete','Api\CommandesController@delete')->middleware('JWTAuth');
Route::post('commandes/update','Api\CommandesController@update')->middleware('JWTAuth');
Route::post('commandes','Api\CommandesController@commandes')->middleware('JWTAuth');