<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('projects.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // formatted array
        $technologies = array_keys($data['technologies']);
        // formatted data
        $period = $data['period_date'] . ' ' . $data['period_time'];
        // Fill all property
        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->category_id = $data['category_id'];
        $newProject->client = $data['client'];
        $newProject->period = $period;
        $newProject->description = $data['description'];
        $newProject->technologies = $technologies;
        $newProject->save();
        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->category);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        return view('projects.edit', compact('project', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        // formatted array
        $technologies = array_keys($data['technologies']);
        // formatted data
        $period = $data['period_date'] . ' ' . $data['period_time'];

        $project->title = $data['title'];
        $project->client = $data['client'];
        $project->description = $data['description'];
        $project->period = $period;
        $project->technologies = $technologies;
        $project->category_id = $data['category_id'];

        $project->update();
        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
