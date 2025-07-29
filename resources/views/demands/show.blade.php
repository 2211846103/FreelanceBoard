{{-- filepath: d:\FreelanceBoard\resources\views\demands\show.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>عرض الطلب</title>
    <style>
        body { font-family: Tahoma, Arial, sans-serif; background: #f7f7f7; }
        .container { max-width: 500px; margin: 40px auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #ccc; padding: 30px; }
        h1 { color: #333; text-align: center; }
        p { font-size: 18px; color: #444; margin-bottom: 12px; }
        a { color: #2980b9; text-decoration: none; }
        .back { display: block; text-align: center; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>تفاصيل الطلب</h1>
        <p><strong>اسم الطلب:</strong> {{ $demand->name }}</p>
        <p><strong>الوصف:</strong> {{ $demand->description }}</p>
        <p><strong>الميزانية:</strong> {{ $demand->budget }}$</p>
        <p><strong>الموعد النهائي:</strong> {{ $demand->deadline }}</p>
        <p><strong>رقم المستخدم:</strong> {{ $demand->user_id }}</p>
        <a href="{{ route('demands.index') }}" class="back">الرجوع للقائمة</a>
    </div>
</body>
</html>