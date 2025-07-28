@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Payments</h2>

    {{-- ✅ نموذج إنشاء دفعة جديدة --}}
    <form method="POST" action="{{ route('payments.store') }}">
        @csrf
        <div class="mb-3">
            <label>Amount</label>
            <input type="number" name="amount" step="0.01" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Payment Method</label>
            <input type="text" name="payment_method" class="form-control">
        </div>
        <div class="mb-3">
            <label>Is Fake?</label>
            <input type="checkbox" name="is_fake" value="1">
        </div>
        <button type="submit" class="btn btn-primary">Create Payment</button>
    </form>

    <hr>

    {{-- ✅ جدول عرض الدفعات --}}
    <table class="table mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->id }}</td>
                <td>{{ $payment->amount }}</td>
                <td>{{ $payment->payment_method }}</td>
                <td>{{ $payment->status }}</td>
                <td>
                    {{-- ✅ نموذج تحديث الحالة --}}
                    <form method="POST" action="{{ route('payments.update', $payment->id) }}" style="display: inline-block;">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()" class="form-select form-select-sm d-inline" style="width: auto;">
                            <option value="pending" {{ $payment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="paid" {{ $payment->status == 'paid' ? 'selected' : '' }}>Paid</option>
                            <option value="refunded" {{ $payment->status == 'refunded' ? 'selected' : '' }}>Refunded</option>
                        </select>
                    </form>

                    {{-- ✅ حذف (لو أدمن فقط) --}}
                    @if (auth()->user()->is_admin)
                    <form method="POST" action="{{ route('payments.destroy', $payment->id) }}" style="display: inline-block;" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
