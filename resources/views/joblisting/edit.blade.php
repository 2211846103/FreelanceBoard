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
        <form action="{{ route("jobs.update", $listing) }}" method="post">
          @method("put")
          @csrf
          <div>
            <label>Title</label>
            <input name="title" type="text" value="{{ $listing->title }}" >
          </div>
          <div>
            <label>Description</label>
            <input name="desc" type="text" value="{{ $listing->desc }}" >
          </div>
          <div>
            <label>Budget</label>
            <input name="budget" type="number" value={{ $listing->budget }} >
          </div>
          <button type="submit">Submit</button>
        </form>

        <form action="{{ route("jobs.destroy", $listing) }}" method="post">
          @method("delete")
          @csrf
          <button type="submit">
            Delete
          </button>
        </form>
    </body>
</html>
