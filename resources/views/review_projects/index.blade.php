<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title> projects list</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4"> projects list</h1>

        <a href="{{ route('reviews.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">إضافة مشروع جديد</a>

        <ul class="divide-y divide-gray-200">
            @foreach ($projects as $project)
                <li class="py-3 flex justify-between items-center">
                    <div>
                        <h2 class="text-lg font-semibold">{{ $project->title }}</h2>
                        <p class="text-sm text-gray-600">rateing: {{ $project->rating }}</p>
                    </div>
                    <div class="space-x-2 space-x-reverse">
                        <a href="{{ route('reviews.show', $project) }}" class="text-blue-600 hover:underline">view</a>
                        <a href="{{ route('reviews.edit', $project) }}" class="text-yellow-600 hover:underline">edit</a>
                        <form action="{{ route('reviews.destroy', $project) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:underline" onclick="return confirm('هل أنت متأكد؟')">delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
