<?php

use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});


route::get('/students', [StudentController::class, 'getAll'])->name('students.index');
Route::post('/students', [StudentController::class, 'insert'])->name('students.insert');
//Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
//Route::delete('/students/{id}', [StudentController::class, 'delete'])->name('students.delete');



// route::get('/students', function(){
//     $estudiantes = [StudentController::class,'getAll();'];
//     return view('students.index', compact('estudiantes'));
// });