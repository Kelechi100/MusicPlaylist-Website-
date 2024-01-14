<?php
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\StudentController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index']); 
Route::get('/students', [StudentController::class, 'list']);
Route::get('/students/create', [StudentController::class, 'create']); 
Route::post('/students/put', [StudentController::class, 'put']); 
Route::get('/students/update/{student}', [StudentController::class, 'update']); 
Route::post('/students/patch/{student}', [StudentController::class, 'patch']); 
Route::post('/students/delete/{student}', [studentController::class, 'delete']);

//Department routes
Route::get('/deparments', [DepartmentController::class, 'list']); 
Route::get('/deparments/create', [DepartmentController::class, 'create']); 
Route::post('/deparments/put', [DepartmentController::class, 'put']); 
Route::get('/deparments/update/{Department}', [DepartmentController::class, 'update']); 
Route::post('/deparments/patch/{Department}', [DepartmentController::class, 'patch']); 
Route::post('/deparments/delete/{Department}', [DepartmentController::class, 'delete']); 