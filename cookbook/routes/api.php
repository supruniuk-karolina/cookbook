<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/recipes/{id}', [RecipeApiController::class, 'show']);
Route::get('/recipes', [RecipeApiController::class, 'index']);