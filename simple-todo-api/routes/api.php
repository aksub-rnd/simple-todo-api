<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get("/", [TodoController::class, "get"]);
Route::delete("/{id}", [TodoController::class, "delete"]);
Route::post("/post", [TodoController::class, "post"]);
// Route::put("/{id}", [TodoController::class, "put"]);
