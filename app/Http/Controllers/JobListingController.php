<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->cannot('viewAny')) {
            abort(403);
        }

        $listings = JobListing::all();
        return view("joblisting.index", compact("listings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->cannot('create')) {
            abort(403);
        }

        return view("joblisting.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->cannot('create')) {
            abort(403);
        }

        $job = JobListing::create([
            "client_id" => 3,
            "title" => $request->input("title"),
            "desc" => $request->input("desc"),
            "budget" => $request->input("budget")
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $jobListing)
    {
        $listing = JobListing::find($jobListing);

        if (auth()->user()->cannot('view', $listing)) {
            abort(403);
        }

        return view("joblisting.show", compact("listing"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $jobListing)
    {
        $listing = JobListing::find($jobListing);

        if (auth()->user()->cannot('update')) {
            abort(403);
        }

        return view("joblisting.edit", compact("listing"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $jobListing)
    {
        $listing = JobListing::find($jobListing);

        if (auth()->user()->cannot('update', $listing)) {
            abort(403);
        }

        $listing->update([
            "title" => $request->input("title"),
            "desc" => $request->input("desc"),
            "budget" => $request->input("budget")
        ]);

        return $this->show($jobListing);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $jobListing)
    {
        $listing = JobListing::find($jobListing);

        if (auth()->user()->cannot('delete')) {
            abort(403);
        }

        $listing->delete();

        return $this->index();
    }
}
