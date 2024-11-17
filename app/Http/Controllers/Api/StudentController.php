<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function addStudent(Request $request) 
    {    
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:200',
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'enrollment_date' => 'required|date|after_or_equal:today',
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $student = Student::create([
            'full_name' => $request->full_name,
            'date_of_birth' => $request->date_of_birth, 
            'gender' => $request->gender,
            'enrollment_date' => $request->enrollment_date,
        ]);

        return response()->json([
            'message' => 'Студент успешно добавлен в базу', 
            'student' => $student
        ], 201);
    }

    public function profileStudent($id) 
    {
        $student = Student::where('student_id', $id)->first();

        if (!$student) {
            return response()->json(['message' => 'Студент не найден'], 404);
        }

        return response()->json($student);
    }

    public function deleteStudent(Request $request, $id) 
    {
        $student = Student::where('student_id', $id)->first();

        if(!$student) {
            return response()->json(['message' => 'Студент не найден'], 404);
        }

        $student->delete();
        return response()->json(['message' => 'Студент успешно удален'], 200);

    }  
}
