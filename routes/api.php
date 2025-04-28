<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\JsonResponse;



Route::get("/", function (): JsonResponse {

    return response()->json(['message' => 'Hello, World!']);

});

Route::get('/students', [StudentController::class,'getAll']);

Route::fallback(function () {
    return response()->json(['message' => 'Ruta no valida'],404);
});
