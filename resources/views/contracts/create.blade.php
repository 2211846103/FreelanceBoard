@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Contract</h2>

    <form action="{{ route('contracts.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="proposal_id" class="form-label">Proposal ID</label>
            <input type="number" name="proposal_id" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="deadline" class="form-label">Deadline</label>
            <input type="date" name="deadline" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="payment" class="form-label">Payment ($)</label>
            <input type="number" step="0.01" name="payment" class="form-control" required>
        </div>

        <button class="btn btn-success">Create Contract</button>
    </form>
</div>
@endsection
