<?php

use App\Http\Controllers\ExerciseController;
// use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/test', function () {
//     return ['test', 'hi', 1, 2];
// });

// Route::get('/testpage', function () {
//     return view('test');
// });

// Route::get('/user/{id}', [UserController::class, 'show']);
// Route::get('/users', [UserController::class, 'getAll']);

Route::get('/exercises', [ExerciseController::class, 'getExercises']);
Route::get('/exercise/{id}', [ExerciseController::class, 'getExercise']);
