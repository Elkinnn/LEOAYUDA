<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function index()
    {
        $estudiantes = Student::all();
        return view('students.index', compact('estudiantes'));
    }
    public function getAll()
    {
        try {
            $estudiantes = Student::all();
            return view('students.index', ['estudiantes' => $estudiantes]);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    private function successResponse($data)
    {
        return response()->json([$data], 200);
    }


    public function getById(Request $req)
    {
        $id = $req -> route('id');
        try {
            $student = Student::findOrFail($id);
            return $this->successResponse($student);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function getByCedula(Request $req)
    {
        
        try {
            $cedula = $req -> route('cedula');
            $student = Student::where('cedula', $cedula)->firstOrFail();
            return $this->successResponse($student);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    // public function insert(Request $req)
    // {
    //     try {
    //         $student = new Student();
    //         $student->cedula = $req->input('cedula');
    //         $student->nombre = $req->input('nombre');
    //         $student->apellido = $req->input('apellido');
    //         $student->direccion = $req->input('direccion');
    //         $student->telefono = $req->input('telefono');
    //         $student->save();
    //         return response()->json(['status' => 200, 'message' => 'Estudiante creado correctamente']);
    //     } catch (\Exception $e) {
    //         return $this->handleException($e);
    //     }
    // }

    public function insert(Request $req)
    {
        try{
            $estudiante = new Student($req->all());
            $estudiante->save();

            return redirect() -> route('students.index');
        }catch(\Exception $e){
            return $this->handleException($e);
        }
    }

    public function update(Request $req)
    {
        try {
            $id = $req->route('id');
            $student = Student::findOrFail($id);
            $student->cedula = $req->cedula;
            $student->nombre = $req->nombre;
            $student->apellido = $req->apellido;
            $student->direccion = $req->direccion;
            $student->telefono = $req->telefono;
            $student->save();
            return response()->json(['status' => 200, 'message' => 'Estudiante actualizado correctamente']);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }

    public function delete(Request $req)
    {
        try {
            $id = $req->route('id');
            $student = Student::findOrFail($id);
            $student->delete();
            return response()->json(['status' => 200, 'message' => 'Estudiante eliminado correctamente']);
        } catch (\Exception $e) {
            return $this->handleException($e);
        }
    }


    

    
    private function handleException($e)
    {
        return response()->json([
            'status' => 500,
            'error' => $e->getMessage()]);
    }
}
