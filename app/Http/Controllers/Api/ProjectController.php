<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::paginate(6); //per impaginare massimo 6 record
        return response()->json([
            'success'=>true,
            'results'=>$projects,
        ]);
    }

    public function show(Project $project){

        $projects = Project::with('name', 'image', 'description', 'type')->where($project->id)->first();

        if ($projects) {
            return response()->json([
                'success' => true,
                'results' => $projects
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Product not found !'
            ]);
        }
    }
}
