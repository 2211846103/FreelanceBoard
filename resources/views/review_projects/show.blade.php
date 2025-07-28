<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title> project description</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">{{ $review->title }}</h1>

        <p class="mb-2"><span class="font-medium">description:</span> {{ $review->description }}</p>
        <p class="mb-4"><span class="font-medium">rateing:</span> {{ $review->rating }}</p>

        <div class="flex space-x-2 space-x-reverse">
            <a href="{{ route('reviews.edit', $review) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">edit</a>
            <a href="{{ route('reviews.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">back</a>
        </div>
    </div>
</body>
</html>
