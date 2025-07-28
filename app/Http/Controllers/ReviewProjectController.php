<?php

namespace App\Http\Controllers;

use App\Models\ReviewProject;
use Illuminate\Http\Request;

class ReviewProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = ReviewProject::all();
        return view('review_projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('review_projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        ReviewProject::create($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review project created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $reviewProject)
    {
        $review=ReviewProject::find($reviewProject);
        return view('review_projects.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $reviewProject)
    {
        $review=ReviewProject::find($reviewProject);

         return view('review_projects.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $reviewProject)
    {
        $review=ReviewProject::find($reviewProject);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review->update($request->all());

        return redirect()->route('reviews.index')->with('success', 'Review project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $reviewProject)
    {
        $review=ReviewProject::find($reviewProject);
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review project deleted successfully.');
    }
}
