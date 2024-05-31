<?php

use App\Http\Controllers\Comment\CreateCommentController;
use App\Http\Controllers\Comment\GetCommentsController;
use App\Http\Controllers\Comment\SearchCommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Rebing\GraphQL\GraphQLController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'graphql'], function () {
    Route::post('/', [GraphQLController::class, 'query']);
});

Route::group(['prefix' => 'comments'], function () {
    Route::get('/', GetCommentsController::class);
    Route::get('/search', SearchCommentController::class);
    Route::get('/create', CreateCommentController::class);
});
