<?php

use Illuminate\Http\Request;
use Modules\Article\Http\Controllers\API\ArticleAPIController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/article', function (Request $request) {
//     return $request->user();
// });

//post article
Route::post('/addArticle',[ArticleAPIController::class, 'store'] );

// get all articles
Route::get('/getALLarticles',[ArticleAPIController::class, 'index'] );

//get article by id
Route::get('/articleByID/{id}',[ArticleAPIController::class, 'show'] );

//update article
Route::put('/updateArticle/{id}',[ArticleAPIController::class, 'update'] );

//delete article
Route::delete('/deleteArticle/{id}',[ArticleAPIController::class, 'destroy'] );
