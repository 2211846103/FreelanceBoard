<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use Illuminate\Support\Facades\DB;
use App\Models\Demand;
class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Logic to retrieve and display a list of demands
        $demands = Demand::all(); // Assuming Demand is a model for the demands table
        return view('demands.index', compact('demands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $demands = Demand::all();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $demands = Demand::create($request->all());
        return redirect()->route('demands.index')->with('success', 'Demand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Logic to display a specific demand
        $demand = Demand::findOrFail($id);
        return view('demands.show', compact('demand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $demands = Demand::findOrFail($id);
        return view('demands.edit', compact('demand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $demand = Demand::findOrFail($id);
        $demand->update($request->all());
        return redirect()->route('demands.index')->with('success', 'Demand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $demand = Demand::findOrFail($id);
        $demand->delete();
        return redirect()->route('demands.index')->with('success', 'Demand deleted successfully.');
    }
}
