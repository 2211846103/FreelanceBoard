<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>تعديل العرض</title>
</head>
<body>
    <h1>تعديل العرض</h1>
    <form action="{{ route('demands.update', $proposal->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label>اسم العرض:</label>
        <input type="text" name="name" value="{{ $proposal->name }}" required><br><br>

        <label>الوصف:</label>
        <textarea name="description">{{ $proposal->description }}</textarea><br><br>

        <label>الميزانية:</label>
        <input type="number" name="budget" value="{{ $proposal->budget }}"><br><br>

        <label>الموعد النهائي:</label>
        <input type="date" name="deadline" value="{{ $proposal->deadline }}"><br><br>

        <button type="submit">حفظ