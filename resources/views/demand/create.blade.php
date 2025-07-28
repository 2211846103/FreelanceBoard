    
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>إضافة عرض جديد</title>
</head>
<body>
    <h1>إضافة عرض جديد</h1>
    <form action="{{ route('demands.store') }}" method="POST">
        @csrf
        <label>اسم العرض:</label>
        <input type="text" name="name" required><br><br>

        <label>الوصف:</label>
        <textarea name="description"></textarea><br><br>

        <label>الميزانية:</label>
        <input type="number" name="budget"><br><br>

        <label>الموعد النهائي:</label>
        <input type="date" name="deadline"><br><br>

        <label>رقم المستخدم:</label>
        <input type="number" name="user_id" required><br><br>

        <button type="submit">إضافة</button>
   