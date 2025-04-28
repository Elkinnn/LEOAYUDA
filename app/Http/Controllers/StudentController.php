<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController extends Controller
{
    public function getAll()
    {
        try {
            return $this->successResponse(Student::all());
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    private function successResponse($data)
    {
        return response()->json([$data], 200);
    }

    private function handleException($e)
    {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}
