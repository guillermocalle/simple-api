<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return response()->json($students->toArray(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $student = new Student();

            $student->name = $request->name;
            $student->last_name = $request->last_name;

            $student->save();

            return response()->json([
                'message' => 'El registro del estudiante se realizo correctamente'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $student = Student::findOrFail($id);
        return response()->json([
            'message' => 'El empleado fue encontrado correctamente',
            'data' => $student
        ], 200);
        } catch(Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $student = Student::find($id);

            $student->name = $request->name;
            $student->last_name = $request->last_name;
            $student->save();

            return response()->json([
                'message' => 'El registro se actualizo correctamente'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $student = Student::findOrFail($id);
            $student->delete();

            return response()->json([
                'status' => true,
                'message' => 'Se elimino el registro correctamente'
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }  
    }
}
