<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        try {
            $limit = $request->input('limit', 10);

            $courses = Course::with("category")->with("user")->latest()->paginate($limit);

            return response()->json([
                'code' => 'ICF-001',
                'success' => true,
                'message' => 'Get All Courses Completed.',
                'result' => $courses,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 'ICF-001',
                'success' => false,
                'message' => 'Get All Courses Failed:' .  $e->getMessage(),
                'result' => [],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show(string $slug)
    {
        try {

            $course = Course::with("category")->with("user")->whereSlug($slug)->first();

            if (!$course) {
                throw new Exception("Course not found.", Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'code' => 'ICF-002',
                'success' => true,
                'message' => 'Get Course By ID Completed.',
                'result' => $course,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 'ICF-002',
                'success' => false,
                'message' => 'Get Course By ID Failed: ' . $e->getMessage(),
                'result' => null,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
