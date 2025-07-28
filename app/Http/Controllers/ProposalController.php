<?php

namespace App\Http\Controllers;
use App\Models\Proposal; 
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    
    public function index()
    {

      return view("proposals.index"); 
        
    }

    /**
     * Show the form for creating a new proposal.
     */
    public function create()
    {
        return view('proposals.create');
    }

    /**
     * Store a newly created proposal in storage.
     */
    public function store(Request $request)
    {
      $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|date',
            'user_id' => 'required|exists:users,id',
        ]);

        
        $proposal = new Proposal($request->all());
        $proposal->save();

        return redirect()->route('proposals.index')->with('success', 'Proposal created successfully.');
    }

    
    public function show($id)
    {
       $proposal = Proposal::find($id);
        if (!$proposal) {
            return redirect()->route('proposals.index')->with('error', 'Proposal not found.');
        }

        return view('proposals.show', compact('proposal'));
    }

    /**
     * Show the form for editing the specified proposal.
     */
    public function edit($id)
    {
        $proposal = Proposal::find($id);
        if (!$proposal) {
            return redirect()->route('proposals.index')->with('error', 'Proposal not found.');
        }

        return view('proposals.edit', compact('proposal'));

    }

    /**
     * Update the specified proposal in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|date',
        ]);
        $proposal = Proposal::findOrFail($id);

        $proposal = Proposal::find($id);
        if (!$proposal) {
            return redirect()->route('proposals.index')->with('error', 'Proposal not found.');
        }

        $proposal->update($request->all());

        return redirect()->route('proposals.index')->with('success', 'Proposal updated successfully.');
    }

    /**
     * Remove the specified proposal from storage.
     */
    public function destroy($id)
    {
       $proposal = Proposal::find($id);
        if (!$proposal) {
            return redirect()->route('proposals.index')->with('error', 'Proposal not found.');
        }

        $proposal->delete();

        return redirect()->route('proposals.index')->with('success', 'Proposal deleted successfully.');
    }
}
