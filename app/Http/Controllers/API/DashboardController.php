<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $user = User::find($request->user_id);

            if (!$user) {
                return response()->json(['message' => 'User not found'], 404);
            }

            $courses = $user->courses()->with(['category', 'user'])->get(); 

            return response()->json([
                'code' => 'ICF-001',
                'success' => true,
                'message' => 'Get Data Dashboard Success',
                'result' => [
                    "courses" => $courses
                ],
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 'ICF-002',
                'success' => false,
                'message' => 'Join to Course Failed: ' . $e->getMessage(),
                'result' => null,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
