<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'Hello World';
});

Route::controller(StudentController::class)->group(function () {
    Route::get('/student', 'index');
    Route::post('/student', 'store');
    Route::get('/student/{id}', 'show');
    Route::put('/student/{id}', 'update');
    Route::delete('/student/{id}', 'destroy');
});

// Route::get('/student', [StudentController::class, 'index']);
// Route::post('/student', [StudentController::class, 'store']);