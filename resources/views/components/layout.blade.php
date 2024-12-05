<html lang="en">
  <head>
    <title>{{ $title ?? 'Example Website' }}</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
  </head>
  
  <body>
    <nav>
      <h3 class="text-2xl">Freshtrack Admin</h3>
      <hr>
    </nav>

    <section class="min-h-screen px-20 my-12">
      {{ $slot }}
    </section>

    <footer>
      <hr />
      © 2023 freshtrack.com
    </footer>
  </body>
</html>