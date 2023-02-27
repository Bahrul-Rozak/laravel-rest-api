<?php

use App\Http\Controllers\Api\SectionController;
use App\Http\Controllers\Api\StudentclassController;
use App\Http\Controllers\Api\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Student Class Routes
Route::get('/class', [StudentclassController::class, 'Index']);
Route::post('/class/store', [StudentclassController::class, 'Store']);
Route::get('/class/edit/{id}', [StudentclassController::class, 'Edit']);
Route::post('/class/update/{id}', [StudentclassController::class, 'Update']);
Route::get('/class/delete/{id}', [StudentclassController::class, 'Delete']);

// Subject Class Routes
Route::get('/subject', [SubjectController::class, 'Index']);
Route::post('/subject/store', [SubjectController::class, 'Store']);
Route::get('/subject/edit/{id}', [SubjectController::class, 'Edit']);
Route::post('/subject/update/{id}', [SubjectController::class, 'Update']);
Route::get('/subject/delete/{id}', [SubjectController::class, 'Delete']);

// Section Routes
Route::get('/section', [SectionController::class, 'Index']);
Route::post('/section/store', [SectionController::class, 'Store']);
Route::get('/section/edit/{id}', [SectionController::class, 'Edit']);
Route::post('/section/update/{id}', [SectionController::class, 'Update']);
Route::get('/section/delete/{id}', [SectionController::class, 'Delete']);
