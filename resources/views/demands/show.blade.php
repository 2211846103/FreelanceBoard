{{-- filepath: d:\FreelanceBoard\resources\views\demands\show.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>عرض الطلب</title>
</head>
<body>
    <h1>تفاصيل الطلب</h1>
    <p><strong>اسم الطلب:</strong> {{ $demand->name }}</p>
    <p><strong>الوصف:</strong> {{ $demand->description }}</p>
    <p><strong>الميزانية:</strong> {{ $demand->budget }}$</p>
    <p><strong>الموعد النهائي:</strong> {{ $demand->deadline }}</p>
    <p><strong>رقم المستخدم:</strong> {{ $demand->user_id }}</p>
    <a href="{{ route('demands.index') }}">الرجوع للقائمة</a>
</body>