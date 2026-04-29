<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WishlistApiController;

Route::get('/wishlist',[WishlistApiController::class,'index']);
Route::post('/wishlist',[WishlistApiController::class,'store']);
Route::get('/wishlist/{id}',[WishlistApiController::class,'show']);
Route::put('/wishlist/{id}',[WishlistApiController::class,'update']);
Route::delete('/wishlist/{id}',[WishlistApiController::class,'destroy']);