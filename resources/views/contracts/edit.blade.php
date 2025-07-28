@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Contract #{{ $contract->id }}</h2>

    <form action="{{ route('contracts.update', $contract) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $contract->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="completed" {{ $contract->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $contract->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Deadline</label>
            <input type="date" name="deadline" class="form-control" value="{{ $contract->deadline }}">
        </div>

        <div class="mb-3">
            <label>Payment ($)</label>
            <input type="number" step="0.01" name="payment" class="form-control" value="{{ $contract->payment }}">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
