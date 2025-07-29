{{-- filepath: d:\FreelanceBoard\resources\views\demands\index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>قائمة الطلبات</title>
    <style>
        body { font-family: Tahoma, Arial, sans-serif; background: #f7f7f7; margin: 0; padding: 0; }
        .container { max-width: 700px; margin: 40px auto; background: #fff; border-radius: 8px; box-shadow: 0 2px 8px #ccc; padding: 30px; }
        h1 { color: #333; text-align: center; }
        a.button { background: #3498db; color: #fff; padding: 8px 18px; border-radius: 4px; text-decoration: none; margin-bottom: 20px; display: inline-block;}
        ul { list-style: none; padding: 0; }
        li { background: #f1f1f1; margin-bottom: 12px; padding: 16px; border-radius: 5px; display: flex; align-items: center; justify-content: space-between;}
        .actions a, .actions form { display: inline-block; margin-left: 8px; }
        .actions a { color: #2980b9; text-decoration: none; font-weight: bold;}
        .actions a:hover { text-decoration: underline; }
        .actions button { background: #e74c3c; color: #fff; border: none; padding: 6px 12px; border-radius: 3px; cursor: pointer;}
        .actions button:hover { background: #c0392b; }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('demands.create') }}" class="button">إضافة طلب جديد</a>
        <h1>قائمة الطلبات</h1>
        <ul>
            @foreach($demands as $demand)
                <li>
                    <span>
                        <strong>{{ $demand->name }}</strong> - {{ $demand->budget }}$
                    </span>
                    <span class="actions">
                        <a href="{{ route('demands.show', $demand->id) }}">عرض</a>
                        <a href="{{ route('demands.edit', $demand->id) }}">تعديل</a>
                        <form action="{{ route('demands.destroy', $demand->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>