<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function addTeacher(Request $request) 
    {    
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:200',
            'email' => 'required|email|unique:email',
            'subject' => 'required|string|max:100',
            'user_id' => 'required|exists:users,id', 
        ]);
        
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $teacher = Teacher::create([
            'full_name' => $request->full_name,
            'email' => $request->email, 
            'subject' => $request->subject,
            'user_id' => $request->user_id,
        ]);

        return response()->json([
            'message' => 'Учитель успешно добавлен в базу', 
            'teacher' => $teacher
        ], 201);
    }

    public function deleteTeacher(Request $request, $id) 
    {
        $teacher = Teacher::where('teacher_id', $id)->first();

        if(!$teacher) {
            return response()->json([
                'message' => 'Учитель не найден'
            ], 404);
        }

        $teacher->delete();

        return response()->json([
            'message' => 'Учитель успешно удален'
        ], 200);
    }  

    public function getTeacherById($id) 
    {
        $teacher = Teacher::where('teacher_id', $id)->first();

        if (!$teacher) {
            return response()->json([
                'message' => 'Учитель не найден'
            ], 404);
        }

        return response()->json([
            'message' => 'Учитель успешно найден',
            'teacher' => $teacher
        ], 200); 
    }

    public function getAllTeacher() 
    {
        return response()->json(Teacher::all());
    }
}
