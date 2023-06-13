<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Doctrine\DBAL\Schema\View;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        //in questa pagina visualizzerò tutti i miei progetti
        $projects = Project::all();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.project.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     *
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        // $newProject = new Project();

        // $newProject->name = $data['name'];
        // $newProject->image = $data['image'];
        // $newProject->description = $data['description'];

        $newProject= Project::create($data);

        return redirect()->route('admin.project.show', $newProject->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function show(Project $project)
    {
        $types = Type::all();
        return view('admin.project.show', compact('project','types'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        return view('admin.project.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     *
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $project->update($data);

        return redirect()->route('admin.project.show', $project->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.project.index');
    }
}
