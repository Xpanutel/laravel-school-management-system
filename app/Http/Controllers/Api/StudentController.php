<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\AddStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function show($id)
    {
        $student = Student::where('student_id', $id)->first();
        if (!$student) {
            return response()->json(['message' => 'Студент не найден'], 404);
        }
        return response()->json($student);
    }

    public function store(AddStudentRequest $request)
    {
        $student = Student::create($request->validated());

        return response()->json([
            'message' => 'Студент успешно добавлен в базу', 
            'student' => $student
        ], 201);
    }

    public function update(UpdateStudentRequest $request, $id)
    {
        $student = Student::where('student_id', $id)->first();
        if (!$student) {
            return response()->json(['message' => 'Студент не найден'], 404);
        }

        $student->update($request->validated());
        return response()->json($student);
    }

    public function destroy($id)
    {
        $student = Student::where('student_id', $id)->first();
        if (!$student) {
            return response()->json(['message' => 'Студент не найден'], 404);
        }

        $student->delete();
        return response()->json(['message' => 'Студент удален']);
    }
}
