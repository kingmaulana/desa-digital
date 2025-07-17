<?php

use App\Http\Controllers\HeadOfFamilyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::apiResource('user', UserController::class);
Route::get('user/all/paginated', [UserController::class, 'getAllPaginated']);

Route::apiResource('head-of-family', HeadOfFamilyController::class);
Route::get('head-of-family/all/paginated', [HeadOfFamilyController::class, 'getAllPaginated']);
