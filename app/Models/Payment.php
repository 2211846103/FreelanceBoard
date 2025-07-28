<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // 👇 تحديد الأعمدة القابلة للكتابة
    protected $fillable = [
        'user_id',
        'amount',
        'payment_method',
        'status',
        'is_fake',
    ];

    // 👇 العلاقة مع المستخدم
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 👇 العلاقة مع المشروع (اختياري لو فيه مشاريع)

}
