<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $password = $request->input('password', "");
            $name = $request->input('name', "");
            $profile = $request->input('profile', "");

            if($password){
                $user = User::find($request->user_id)->update([
                    "password" => bcrypt($request->password)
                ]);
            }
            
            if($name || $profile){
                $user = User::find($request->user_id)->update([
                    "name" => $request->name,
                    "profile" => $request->profile.".jpg"
                ]);
            }


            return response()->json([
                'code' => 'ICF-001',
                'success' => true,
                'message' => 'Update Profile Success',
                'result' => $user,
            ], Response::HTTP_OK);
        } catch(Error $e){
            return response()->json([
                'code' => 'ICF-002',
                'success' => false,
                'message' => 'Get Submit Submission Failed: ' . $e->getMessage(),
                'result' => null,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
