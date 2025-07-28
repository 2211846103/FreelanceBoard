<a href="{{ route('proposal.create') }}">إضافة عرض جديد</a>
<h1>قائمة العروض</h1>
<ul>
    @foreach($proposals as $proposal)
        <li>
            {{ $proposal->name }} - {{ $proposal->budget }}$
            <a href="{{ route('proposal.edit', $proposal->id) }}">تعديل</a>
            <form action="{{ route('proposal.destroy', $proposal->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('هل أنت متأكد من الحذف؟')">حذف</button>
            </form>
        </li>
    @endforeach
</ul>