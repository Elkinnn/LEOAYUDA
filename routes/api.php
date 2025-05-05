<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\JsonResponse;



Route::get("/", function (): JsonResponse {

    return response()->json(['message' => 'Hello, World!']);

});

Route::get('/students', [StudentController::class,'getAll']);
Route::get('/students/buscar/{id}', [StudentController::class,'getById']);
Route::get('/students/buscarBycedula/{cedula}', [StudentController::class,'getByCedula']);
Route::post('/students/insert', [StudentController::class,'insert']);
Route::put('/students/update/{id}', [StudentController::class,'update']);
Route::delete('/students/delete/{id}', [StudentController::class,'delete']);



Route::fallback(function () {
    return response()->json(['message' => 'Ruta no valida'],404);
});
