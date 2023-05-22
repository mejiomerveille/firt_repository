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

// Route::post('login','App\Http\Controllers\Api\AuthController@login');
Route::post('/login',[AuthController::class,'login']);

Route::post('register','App\Http\Controllers\Api\AuthController@register');
Route::get('logout','App\Http\Controllers\Api\AuthController@logout');

//post
Route::post('posts/create','App\Http\Controllers\Api\PostsController@create')->middleware('JWTAuth');
Route::post('posts/delete','App\Http\Controllers\Api\PostsController@delete')->middleware('JWTAuth');
Route::post('posts/update','App\Http\Controllers\Api\PostsController@update')->middleware('JWTAuth');
Route::get('posts','App\Http\Controllers\Api\PostsController@posts')->middleware('JWTAuth');

//comments
Route::post('comments/create','App\Http\Controllers\Api\CommentsController@create')->middleware('JWTAuth');
Route::post('comments/delete','App\Http\Controllers\Api\CommentsController@delete')->middleware('JWTAuth');
Route::post('comments/update','App\Http\Controllers\Api\CommentsController@update')->middleware('JWTAuth');
Route::post('posts/comments','App\Http\Controllers\Api\CommentsController@comments')->middleware('JWTAuth');
//like
Route::post('posts/like','App\Http\Controllers\Api\LikesController@like')->middleware('JWTAuth');
//paiements
Route::post('paiements/create','App\Http\Controllers\Api\PaiementsController@create')->middleware('JWTAuth');
Route::post('paiements/delete','App\Http\Controllers\Api\PaiementsController@delete')->middleware('JWTAuth');
Route::post('paiements/update','App\Http\Controllers\Api\PaiementsController@update')->middleware('JWTAuth');
Route::get('commandes/paiements','App\Http\Controllers\Api\PaiementsController@commandes')->middleware('JWTAuth');

//commandes
Route::post('commandes/create','App\Http\Controllers\Api\CommandesController@create')->middleware('JWTAuth');
Route::post('commandes/delete','App\Http\Controllers\Api\CommandesController@delete')->middleware('JWTAuth');
Route::post('commandes/update','App\Http\Controllers\Api\CommandesController@update')->middleware('JWTAuth');
Route::post('commandes','App\Http\Controllers\Api\CommandesController@commandes')->middleware('JWTAuth');