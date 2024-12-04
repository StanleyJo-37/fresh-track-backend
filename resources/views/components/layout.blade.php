<html>
  <head>
    <title>{{ $title ?? 'Example Website' }}</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </head>
  
  <body>
    <nav>
      <h3>Welcome to my website</h3>
      <hr>
      <a href="/food">
        Go to food
      </a>
    </nav>
    {{ $slot }}
    <footer>
      <hr />
      © 2023 freshtrack.com
    </footer>
  </body>
</html>