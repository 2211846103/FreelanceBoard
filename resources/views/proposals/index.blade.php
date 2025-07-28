<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>قائمة العروض</title>
</head>
<body>
    <a href="{{ route('proposals.create') }}">إضافة عرض جديد</a>
    <h1>قائمة العروض</h1>
    <ul>
        @foreach($proposals as $proposal)
            <li>
                {{ $proposal->name }} - {{ $proposal->budget }}$
                <a href="{{ route('proposals.edit', $proposal->id) }}">تعديل</a>
                <form action="{{ route('proposals.destroy', $proposal->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
                </form>
            </li>
        @endforeach
        
    </ul>
</body>
</html>
