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
}
