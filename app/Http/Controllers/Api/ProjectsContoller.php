<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsContoller extends Controller
{
    public function index()
    {

        $projects = Project::with('category', 'technologies')->get();

        return response()->json([
            'success' => true,
            'data' => $projects
        ]);
    }

    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with(['category', 'technologies', 'images'])->first();
        if (!$project) {
            return response()->json([
                'success' => false,
                'message' => "Project doesn't found"
            ], 404);
        }
        return response()->json([
            'success' => true,
            'data' => $project
        ]);
    }
}
