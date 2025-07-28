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
        return Contract::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'proposal_id' => 'required|exists:proposals,id',
            'deadline' =>'required|date',
            'payment' => 'required|numeric'
        ]);

        $contract = Contract::create($request->only('proposal_id', 'deadline', 'payment'));
        return response()->json($contract, 201);
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
    public function edit(string $id)
    {
        //
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

        return response()->json($contract);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        if($contract->status !== 'completed'){
            $contract->update(['status' => 'cancelled']);
            return response()->json(['message' => 'contract cancelled']);
        }

        return response()->json(['error' => 'Completed contracts cannot be cancelled'], 403);
    }
}
