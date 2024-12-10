<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
    
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                "code" => "ICF-003",
                "success" => false,
                "message" => "Login Failed, Unauthorized",
                "result" => []
            ], 401);
        }
    
        // Mendapatkan user yang berhasil diautentikasi
        $user = auth()->guard('api')->user();
    
        // Menambahkan klaim kustom
        $customClaims = [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ];
        $token = JWTAuth::claims($customClaims)->fromUser($user);
    
        return response()->json([
            "code" => "ICF-001",
            "success" => true,
            "message" => "Login success",
            "result" => [
                'token' => $token,
                'user' => $user
            ]
        ]);
    }
    

    public function register(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password'  => 'required|string|min:8',
            'password_confirmation' => 'required|string|same:password',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "code" => "ICF-003",
                "success" => false,
                "message" => "Registration Failed",
                "errors" => $validator->errors(),
                "result" => []
            ], 400);
        }
        
        try {
            User::create([
                "name" => $request->name,
                "password" => bcrypt($request->password),
                "email" => $request->email
            ]);
        
            return response()->json([
                "code" => "ICF-001",
                "success" => true,
                "message" => "Registration Successful",
                "result" => []
            ], 201);
        
        } catch (\Exception $e) {
            return response()->json([
                "code" => "ICF-003",
                "success" => false,
                "message" => "Registration Failed",
                "error" => $e->getMessage(),
                "result" => []
            ], 500);
        }
    }
}
