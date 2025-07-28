<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title> add project</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">  add new project</h1>

        <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 font-medium">title</label>
                <input type="text" name="title" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">description</label>
                <textarea name="description" class="w-full border border-gray-300 p-2 rounded" required></textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium">rateing (1-5)</label>
                <input type="number" name="rating" min="1" max="5" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">save</button>
        </form>
    </div>
</body>
</html>
