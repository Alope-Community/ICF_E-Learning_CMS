<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Request $request)
    {
        $discussion = Discussion::create([
            "forum_id" => $request->forum_id,
            "message" => $request->body,
            "user_id" => $request->user_id
        ]);

        return response()->json([
            "code" => "ICF-001",
            "success" => true,
            "message" => "Kirim Diskusi Berhasil",
            "result" => $discussion
        ]);
    }
}
