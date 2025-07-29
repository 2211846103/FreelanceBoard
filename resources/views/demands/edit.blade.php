{{-- filepath: d:\FreelanceBoard\resources\views\demands\edit.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>تعديل الطلب</title>
</head>
<body>
    <h1>تعديل الطلب</h1>
    <form action="{{ route('demands.update', $demand->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>اسم الطلب:</label>
        <input type="text" name="name" value="{{ $demand->name }}" required><br><br>

        <label>الوصف:</label>
        <textarea name="description">{{ $demand->description }}</textarea><br><br>

        <label>الميزانية:</label>
        <input type="number" name="budget" value="{{ $demand->budget }}" step="0.01"><br><br>

        <label>الموعد النهائي:</label>
        <input type="datetime-local" name="deadline" value="{{ $demand->deadline }}"><br><br>

        <button type="submit">حفظ التعديلات</button>
    </form>
</body>
</html>