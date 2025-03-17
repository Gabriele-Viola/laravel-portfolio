<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('settings.Technologies.indexTech', compact('technologies'));
        // return 'here we are';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('settings.technologies.createTech');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newTechnology = new Technology();
        $newTechnology->name = $data['name'];
        $newTechnology->description = $data['description'];
        if (array_key_exists('image', $data)) {

            $img_url = Storage::putFile('technologiesImg', $data['image']);
            $newTechnology->image = $img_url;
        }


        $newTechnology->save();
        return redirect()->route('admin.settings.technologies.show', $newTechnology);
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('settings.technologies.showTech', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('settings.technologies.editTech', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $data = $request->all();
        $technology->name = $data['name'];
        $technology->description = $data['description'];
        if (array_key_exists('image', $data)) {
            Storage::delete($technology->image);
            $img_url = Storage::putFile('technologiesImg', $data['image']);
            $technology->image = $img_url;
        }

        $technology->update();
        return redirect()->route('admin.settings.technologies.show', $technology);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {

        if ($technology->image) {
            Storage::delete($technology->image);
        }
        $technology->delete();
        return redirect()->route('admin.settings.technologies.index');
    }
}
