<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function registerUser(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required|in:teacher,student',
            'name' => 'required|string|max:200',
        ]);

        if($validator->fails()) {
            return response()->json($validator->error(), 422);
        }

        $user = User::create([
            'fullname' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'role' => $request->role,
        ]);

        return response()->json([
            'message' => 'Пользователь успешно зарегистрирован', 
            'user' => $user
        ], 201);
    }

    public function loginUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()) {
            return response()->json($validator->error(), 422);
        }

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Неверные учетные даные'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message' => 'Успешный вход', 'token' => $token], 200);
    }

    public function profileUser(Request $request) 
    {
        return response()->json($request->user());
    }

    public function deleteUser(Request $request, $id) 
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'Пользователь успешно удален'], 200);

    }  
}
