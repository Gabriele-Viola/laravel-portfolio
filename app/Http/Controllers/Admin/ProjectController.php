<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'client' => 'required|string|max:255',
            'period_date' => 'required|date',
            'period_time' => 'required|date_format:H:i',
            'description' => 'required|string',
            'imageProject' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg, svg, gif,|max:2048',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id',
        ]);


        // dd($request);
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
        if (array_key_exists('imageProject', $data)) {
            $imgCover_url = Storage::putFile('projectsCovers', $data['imageProject']);
            $newProject->image_project = $imgCover_url;
        }

        $newProject->save();

        if (array_key_exists('images', $data)) {
            foreach ($data['images'] as $image) {
                $img_url = Storage::putFile('projectImage', $image);
                $newProject->images()->create([
                    'image' => $img_url
                ]);
            }
        }


        $newProject->technologies()->attach($data['technologies']);


        return redirect()->route('projects.show', $newProject);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $images = Image::where('project_id', $project->id)->get();
        return view('projects.show', compact('project', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $categories = Category::all();
        $technologies = Technology::all();
        $images = Image::where('project_id', $project->id)->get();


        return view('projects.edit', compact('project', 'categories', 'technologies', 'images'));
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
        if (array_key_exists('imageProject', $data)) {
            Storage::delete($project->image_project);
            $img_url = Storage::putFile('projectsCovers', $data['imageProject']);
            $project->image_project = $img_url;
        }

        $project->update();


        if (array_key_exists('images', $data)) {
            foreach ($project->images as $image) {
                Storage::delete($image->image);
                $image->delete();
            }

            foreach ($data['images'] as $image) {
                $img_url = Storage::putFile('projectImage', $image);
                $project->images()->create([
                    'image' => $img_url
                ]);
            }
        }

        if ($request->has('technologies')) {

            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->detach();
        }

        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->image_project) {
            Storage::delete($project->image_project);
        }

        foreach ($project->images as $image) {
            Storage::delete($image->image);

            $image->delete();
        }


        $project->technologies()->detach();

        $project->delete();

        return redirect()->route('projects.index');
    }
}
