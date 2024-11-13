<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request) {
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
            'password' => Hash:make($request->password), 
            'role' => $request->role,
        ]);

        return response()->json(['message' => 'Пользователь успешно зарегистрирован', 
        'user' => $user], 201);
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if($validator->fails()) {
            return response()->json($validator->error(), 422);
        }

        $user = User::where('email', $request->email)->first();

        if(!$user || Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Неверные учетные даные'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message' => 'Успешный вход', 'token' => $token], 200);
    }

    public function profile(Request $request) {
        return response()->json(['user' => $request->user()])
    }
}
