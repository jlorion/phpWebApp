<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
    <title>Laravel Web</title>
</head>
<body>
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
        integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <a class="navbar-brand" aria-current="page" href="/">
        <img src="...">
      </a>
      
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a href="/about" class="nav-link"> about</a>
        </li>
        @auth
        <li class="nav-item">
          <a href="/listing/create" class="nav-link"> Make Listings</a>
        </li>
        @endauth
      </ul>
      <ul class="navbar-nav justify-content-end">
        @auth
          <li class="nav-item">
              <a href="/user/edit" class="nav-link">
                  {{auth()->user()->name}}
              </a>
          </li>
          <li class="nav-item">
              <form class="inline" method="POST" action="/logout">
                  @csrf
                  <button type="submit" class="nav-link">
                      <i class="fa-solid fa-door-closed"></i> Logout
                  </button>
              </form>
          </li>
      @else
          <li class="nav-item">
              <a href="/signup" class="hover:text-laravel nav-link"><i class="fa-solid fa-user-plus"></i> Register</a>
          </li>
          <li class="nav-item">
              <a href="/login" class="hover:text-laravel nav-link"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
  

    <main>
    {{$slot}}
    </main>

    <x-alert-message />
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>