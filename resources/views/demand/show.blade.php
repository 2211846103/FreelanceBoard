<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>عرض العرض</title>
</head>
<body>
    <h1>تفاصيل العرض</h1>
    <p><strong>اسم العرض:</strong> {{ $proposal->name }}</p>
    <p><strong>الوصف:</strong> {{ $proposal->description }}</p>
    <p><strong>الميزانية:</strong> {{ $proposal->budget }}$</p>
    <p><strong>الموعد النهائي:</strong> {{ $proposal->deadline }}</p>
    <p><strong>رقم المستخدم:</strong> {{ $proposal->user_id }}</p>
    <a href="{{ route('demands.index') }}">الرجوع للقائمة</a>
</body>
</html>