<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\SubmitSubmission;
use Error;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubmitSubmissionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        try {
            $filePath = null;
            if($request->hasFile('file')) {
                $filePath = $request->file('file')->store('files', 'public');
            }

            SubmitSubmission::create([
                "user_id" => $request->user_id,
                "submission_id" => $request->submission_id,
                "file" => $filePath,
                "body" => $request->body,
            ]);

            return response()->json([
                'code' => 'ICF-001',
                'success' => true,
                'message' => 'Submit Submission Success',
                'result' => [],
            ], Response::HTTP_OK);
        } catch(Error $e){
            return response()->json([
                'code' => 'ICF-002',
                'success' => false,
                'message' => 'Submit Submission Failed: ' . $e->getMessage(),
                'result' => null,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
