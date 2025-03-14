<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $technologies = Technology::all();
        return view('projects.index', compact('projects', 'technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $technologies = Technology::all();
        return view('projects.create', compact('categories', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // dd($data);

        // formatted data
        $period = $data['period_date'] . ' ' . $data['period_time'];
        // Fill all property
        $newProject = new Project();
        $newProject->title = $data['title'];
        $newProject->category_id = $data['category_id'];
        $newProject->client = $data['client'];
        $newProject->period = $period;
        $newProject->description = $data['description'];

        $newProject->save();

        $newProject->technology()->attach($data['technologies']);


        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // dd($project->technology);
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
        // formatted data
        $period = $data['period_date'] . ' ' . $data['period_time'];

        $project->title = $data['title'];
        $project->client = $data['client'];
        $project->description = $data['description'];
        $project->period = $period;
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
