<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index(Request $request) {
        try {

            $limit = $request->input('limit', 1000);

            $categories = Category::limit($limit)->latest()->get();

            return response()->json([
                'code' => 'ICF-001',
                'success' => true,
                'message' => 'Get All Categories Completed.',
                'result' => $categories,
            ], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 'ICF-001',
                'success' => false,
                'message' => 'Get All Categories Failed:' .  $e->getMessage(),
                'result' => [],
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
