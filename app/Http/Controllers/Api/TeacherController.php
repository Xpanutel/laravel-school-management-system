<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddTeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function add(AddTeacherRequest $request) 
    {    
        $teacher = Teacher::create($request->validated());

        return response()->json([
            'message' => 'Учитель успешно добавлен в базу', 
            'teacher' => $teacher
        ], 201);
    }

    public function delete(Request $request, $id) 
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

    public function getbyid($id) 
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

    public function getll() 
    {
        return response()->json(Teacher::all());
    }
}
