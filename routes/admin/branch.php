<?php

use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Route;

Route::get('/branch/lists', [branchController::class, 'lists']);
Route::post('/branch/create', [branchController::class, 'create']);
Route::post('/branch/update', [branchController::class, 'update']);
Route::post('/branch/delete', [branchController::class, 'delete']);


