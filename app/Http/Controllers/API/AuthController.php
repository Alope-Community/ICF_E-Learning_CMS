<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                "code" => "ICF-003",
                "success" => false,
                "message" => "Login Failed, Unauthorize",
                "result" => []
            ], 401);
        }

        return response()->json([
            "code" => "ICF-001",
            "success" => true,
            "message" => "Login success",
            "result" => [
                'token' => $token,
                'user' => Auth::user()
            ]
        ]);
    }
}
