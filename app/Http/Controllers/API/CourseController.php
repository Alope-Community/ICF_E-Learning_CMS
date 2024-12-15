<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Mail\StudentJoinToCourse;
use App\Models\Course;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search = $request->input('search', "");
            $category = $request->input('category', "");
            $categories = $request->input('categories', "");
            $limit = $request->input('limit', 10);
            $sortBy = $request->input('sortBy', 'default'); 
        
            $courses = Course::with("category")
                ->with("user")
                ->when($search, function ($query, $search) {
                    $query->where('title', 'like', "%$search%");
                })
                ->when($category, function ($query, $category) {
                    $query->whereHas('category', function ($q) use ($category) {
                        $q->where('slug', 'like', "%$category%");
                    });
                })
                ->when($categories, function ($query, $categories) {
                    $categoriesArray = explode(',', $categories);
                    $query->whereHas('category', function ($q) use ($categoriesArray) {
                        $q->whereIn('slug', $categoriesArray); 
                    });
                })
                ->when($sortBy, function ($query, $sortBy) {
                    if ($sortBy === 'oldest') {
                        $query->oldest(); 
                    } elseif ($sortBy === 'name') {
                        $query->orderBy('title', 'asc');
                    } else {
                        $query->latest();
                    }
                })
                ->latest()
                ->paginate($limit);
        
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
                'message' => 'Get All Courses Failed:' . $e->getMessage(),
                'result' => [],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }        
    }

    public function show(Request $request, string $slug)
    {

        try {

            $course = Course::with("category")->with("submission")->with("user")->with("users")->whereSlug($slug)->first();

            if (!$course) {
                throw new Exception("Course not found.", Response::HTTP_NOT_FOUND);
            }

            $exists = $course->users()->wherePivot('user_id', $request->user_id)->exists();

            return response()->json([
                'code' => 'ICF-001',
                'success' => true,
                'message' => 'Get Course By ID Completed.',
                'result' => [
                    "data" => $course,
                    "haveJoined" => $exists
                ],
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
    
    public function join(Request $request)
    {
        
        try {

            $course_id = $request->input('course_id', "");
            $code = $request->input('code', "");

            $course = null;
            if($course_id){
                $course = Course::with("user")->find($request->course_id);
            } else if($code){
                $course = Course::with("user")->whereCourseCode($request->code)->first();
            }

            $userID = $request->user_id;

            $user = User::find($userID);
    
            $course->users()->attach($userID);

            if (!$course) {
                throw new Exception("Course not found.", Response::HTTP_NOT_FOUND);
            }

            Mail::to($course->user->email)->send(new StudentJoinToCourse([
                'teacher_name'         =>  $course->user->name,
                'student_name'            =>  $user->name,
                'course_name'            =>  $course->name,
            ]));

            return response()->json([
                'code' => 'ICF-001',
                'success' => true,
                'message' => 'Join to Course Success',
                'result' => $course,
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
    
    public function leave(Request $request)
    {
        try {
            $course = Course::find($request->course_id);
            $userID = $request->user_id;
    
            $course->users()->detach($userID);

            if (!$course) {
                throw new Exception("Course not found.", Response::HTTP_NOT_FOUND);
            }

            return response()->json([
                'code' => 'ICF-001',
                'success' => true,
                'message' => 'Join to Course Success',
                'result' => $course,
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
