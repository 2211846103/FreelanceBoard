<?php


namespace App\Http\Controllers;
use App\Models\Proposal; 
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    use \Illuminate\Foundation\Validation\ValidatesRequests;
    public function index()
    {
        $proposals = Proposal::all();
        return view("proposals.index", compact('proposals')); 
    }

    public function create()
    {
        return view('proposals.create');
    }

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
            return redirect()->route('proposals.show')->with('error', 'Proposal not found.');
        }

        return view('proposals.show', compact('proposal'));
    }

    public function edit($id)
    {
        $proposal = Proposal::find($id);
        if (!$proposal) {
            return redirect()->route('proposals.index')->with('error', 'Proposal not found.');
        }

        return view('proposals.edit', compact('proposal'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'budget' => 'nullable|numeric',
            'deadline' => 'nullable|date',
        ]);
        $proposal = Proposal::find($id);
        if (!$proposal) {
            return redirect()->route('proposals.index')->with('error', 'Proposal not found.');
        }

        $proposal->update($request->all());

        return redirect()->route('proposals.index')->with('success', 'Proposal updated successfully.');
    }

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