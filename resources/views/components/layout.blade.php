<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/app.css" rel="stylesheet" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
    .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
    background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
    background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
    }
    </style>
    <title>land bnb</title>
</head>
<body>
  <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"
        integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg=" crossorigin=""></script>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    {{-- <button class="navbar-toggler mb-2s" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> --}}
    <div class="collapse navbar-collapse" id="navbarNav">
      <a class="navbar-brand d-flex align-items-center" aria-current="page" href="/">
        <img src="{{asset('images/weblogo.png')}}" width='50' height="50" class="d-inline-block align-text-top"> 
        <div >LandBnB</div>
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


    <x-alert-message/>

    <main>
    {{$slot}}
    </main>

      <footer class="bg-dark py-5 mt-5">
        <div class="container text-light text-center">
            <p class="display-2 mb-3">LandBnB</p>
            <small class="text-white-10">&copy; Hi sir Ernesto</small>
            </div>
    </footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
