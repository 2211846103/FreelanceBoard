<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    // 📌 عرض جميع الدفعات الخاصة بالمستخدم أو كل الدفعات (لو أدمن)
   public function index()
{
    if (auth()->user()->is_admin) {
        $payments = Payment::with('user')->latest()->get();
    } else {
        $payments = Payment::where('user_id', auth()->id())->latest()->get();
    }

    return view('payments.index', compact('payments'));
}


    // 📌 إنشاء دفعة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'nullable|string',
            'project_id' => 'nullable|exists:projects,id',
            'is_fake' => 'nullable|boolean',
        ]);

        $payment = Payment::create([
            'user_id' => Auth::id(),
            'project_id' => $request->project_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'status' => 'pending',
            'is_fake' => $request->is_fake ?? false,
        ]);

        return response()->json(['message' => 'Payment created successfully', 'payment' => $payment], 201);
    }

    // 📌 تحديث حالة الدفع (paid/refunded)
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,paid,refunded,failed',
        ]);

        $payment = Payment::findOrFail($id);

        // فقط الأدمن أو صاحب الدفع يقدر يحدث
        if (Auth::user()->id !== $payment->user_id && !Auth::user()->is_admin) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $payment->status = $request->status;
        $payment->save();

        return response()->json(['message' => 'Payment status updated', 'payment' => $payment]);
    }

    // 📌 حذف الدفعة (أدمن فقط)
    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        if (!Auth::user()->is_admin) {
            return response()->json(['message' => 'Only admin can delete payments'], 403);
        }

        $payment->delete();

        return response()->json(['message' => 'Payment deleted successfully']);
    }
}
