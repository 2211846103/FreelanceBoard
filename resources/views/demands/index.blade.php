{{-- filepath: d:\FreelanceBoard\resources\views\demands\index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>قائمة الطلبات</title>
</head>
<body>
    <a href="{{ route('demands.create') }}">إضافة طلب جديد</a>
    <h1>قائمة الطلبات</h1>
    <ul>
        @foreach($demands as $demand)
            <li>
                {{ $demand->name }} - {{ $demand->budget }}$
                <a href="{{ route('demands.edit', $demand->id) }}">تعديل</a>
                <form action="{{ route('demands.destroy', $demand->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                </form>
            </li>
        @endforeach