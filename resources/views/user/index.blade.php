<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
</head>
<body>
    <h2>Users</h2>

<a href="{{ route('users.create') }}">Add User</a>

@foreach ($users as $user)
    <p>
        {{ $user->name }} - {{ $user->email }} - {{ $user->role }}
        <a href="{{ route('users.edit', $user->id) }}">Edit</a>
        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </p>
@endforeach
</body>
</html>