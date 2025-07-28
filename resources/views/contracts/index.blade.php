@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contracts</h1>
    <a href="{{ route('contracts.create') }}" class="btn btn-primary mb-3">Create Contract</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proposal</th>
                <th>Status</th>
                <th>Deadline</th>
                <th>Payment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contracts as $contract)
            <a href="{{route('contracts.show', $contract)}}"><tr>
                <td>{{ $contract->id }}</td>
                <td>{{ $contract->proposal_id }}</td>
                <td>{{ ucfirst($contract->status) }}</td>
                <td>{{ $contract->deadline }}</td>
                <td>${{ number_format($contract->payment, 2) }}</td>
                <td>
                    <a href="{{ route('contracts.edit', $contract) }}" class="btn btn-sm btn-warning">Edit</a>
                    
                    @if ($contract->status !== 'completed')
                    <form action="{{ route('contracts.destroy', $contract) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('Cancel this contract?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Cancel</button>
                    </form>
                    @endif
                </td>
            </tr></a>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
