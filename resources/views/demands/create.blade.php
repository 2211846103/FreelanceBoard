{{-- filepath: d:\FreelanceBoard\resources\views\demands\create.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>إضافة طلب جديد</title>
</head>
<body>
    <h1>إضافة طلب جديد</h1>
    <form action="{{ route('demands.store') }}" method="POST">
        @csrf

        <label>اسم الطلب:</label>
        <input type="text" name="name" required><br><br>

        <label>الوصف:</label>
        <textarea name="description"></textarea><br><br>

        <label>الميزانية:</label>
        <input type="number" name="budget" step="0.01"><br><br>

        <label>الموعد النهائي:</label>
        <input type="datetime-local" name="deadline"><br><br>

        <label>رقم المستخدم:</label>
        <input type="number" name="user_id" required><br><br>

        <button type="submit">إضافة</button>
    </form>
</body>