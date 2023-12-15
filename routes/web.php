<?php

use App\Http\Controllers\AlumnosController;
use App\Http\Controllers\CursosController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', 'cursos');

Route::resource('cursos', CursosController::class);
Route::resource('alumnos', AlumnosController::class);
