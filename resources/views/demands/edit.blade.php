{{-- filepath: d:\FreelanceBoard\resources\views\demands\edit.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>تعديل الطلب</title>
    <style>
        body { font-family: Tahoma, Arial, sans-serif; background: #f7f7f7; }
        .container { max-width: 500px; margin: 40px auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #ccc; padding: 30px; }
        h1 { color: #333; text-align: center; }
        label { display: block; margin-top: 16px; color: #555; }
        input, textarea { width: 100%; padding: 8px; margin-top: 6px; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #f39c12; color: #fff; border: none; padding: 10px 20px; border-radius: 4px; margin-top: 18px; cursor: pointer; width: 100%;}
        button:hover { background: #d35400; }
        a { color: #2980b9; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>تعديل الطلب</h1>
        <form action="{{ route('demands.update', $demand->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label>اسم الطلب:</label>
            <input type="text" name="name" value="{{ $demand->name }}" required>

            <label>الوصف:</label>
            <textarea name="description">{{ $demand->description }}</textarea>

            <label>الميزانية:</label>
            <input type="number" name="budget" value="{{ $demand->budget }}" step="0.01">

            <label>الموعد النهائي:</label>
            <input type="datetime-local" name="deadline" value="{{ $demand->deadline }}">

            <label>رقم المستخدم:</label>
            <input type="number" name="user_id" value="{{ $demand->user_id }}" required>

            <button type="submit">حفظ التعديلات</button>
        </form>
        <div style="text-align:center; margin-top:15px;">
            <a href="{{ route('demands.index') }}">الرجوع للقائمة</a>
        </div>
    </div>
</body>
</html>