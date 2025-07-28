<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    <h2>Edit User Information</h2>

<form method="POST" action="{{ route('users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $user->name }}"><br>
    <input type="email" name="email" value="{{ $user->email }}"><br>

    <select name="role">
        <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Client</option>
        <option value="freelancer" {{ $user->role == 'freelancer' ? 'selected' : '' }}>Freelancer</option>
    </select><br>

    <button type="submit">Update</button>
</form>
</body>
</html>