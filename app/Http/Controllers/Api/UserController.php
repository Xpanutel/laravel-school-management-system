<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function reg(RegisterUserRequest $request) 
    {
        $user = User::create($request->validated());

        return response()->json([
            'message' => 'Пользователь успешно зарегистрирован', 
            'user' => $user
        ], 201);
    }

    public function login(LoginUserRequest $request) {

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Неверные учетные даные'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message' => 'Успешный вход', 'token' => $token], 200);
    }

    public function user(Request $request) 
    {
        return response()->json($request->user());
    }

    public function delete(Request $request, $id) 
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }

        $user->delete();
        return response()->json(['message' => 'Пользователь успешно удален'], 200);

    }  
}
