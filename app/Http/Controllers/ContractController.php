<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::all();
        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contracts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            //'proposal_id' => 'required|exists:proposals,id',
            'deadline' =>'required|date',
            'payment' => 'required|numeric'
        ]);
        $contract = Contract::create($request->only('proposal_id', 'deadline', 'payment'));
        return redirect()->route('contracts.index')->with('success', 'contract created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        return $contract;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contract $contract)
    {
        return view('contracts.edit' , compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract )
    {
        $request->validate([
            'status' => 'in:active,completed,cancelled',
            'deadline' => 'date|nullable',
            'payment' => 'numeric|nullable',
        ]);

        $contract->update($request->only('status', 'deadline', 'payment'));

        return redirect()-> route('contracts.index')->with('success', 'Contract updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        if($contract->status !== 'completed'){
            $contract->update(['status' => 'cancelled']);
            return redirect()->route('contracts.index')->with('success', 'Contract cancelled.');
        }

        return redirect()->route('contracts.index')->with('error', 'completed contracts cannot be cancelled.');
    }
}
