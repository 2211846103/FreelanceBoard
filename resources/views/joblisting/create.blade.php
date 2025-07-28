<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Job Listings - FreelanceBoard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif
    </head>
    <body>
        <form action="/jobs" method="post">
          @csrf
          <div>
            <label>Title</label>
            <input name="title" type="text" placeholder="Title" >
          </div>
          <div>
            <label>Description</label>
            <input name="desc" type="text" placeholder="Description" >
          </div>
          <div>
            <label>Budget</label>
            <input name="budget" type="number" placeholder="0" >
          </div>
          <button type="submit">Submit</button>
        </form>
    </body>
</html>
