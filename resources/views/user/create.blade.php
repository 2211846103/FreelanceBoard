<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add</title>
</head>
<body>
    <h2>Add new User</h2>

<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <input type="text" name="name" placeholder="name"><br>
    <input type="email" name="email" placeholder="Email"><br>
    <input type="password" name="password" placeholder="Password"><br>

    <select name="role">
        <option value="client">Client</option>
        <option value="freelancer">Freelancer</option>
    </select><br>

    <button type="submit">Register</button>
</form>
</body>
</html>