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

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <a class="navbar-brand" aria-current="page" href="/">
        <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBwgHBgkIBwgKCgkLDRYPDQwMDRsUFRAWIB0iIiAdHx8kKDQsJCYxJx8fLT0tMTU3Ojo6Iys/RD84QzQ5OjcBCgoKDQwNGg8PGjclHyU3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3Nzc3N//AABEIAFwAXAMBEQACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAAABQMEBgIBB//EADkQAAIBAwEFBgQEAwkAAAAAAAECAwAEEQUSEyExQQYiMlFhgUJxkaEUM1KSYnLRFRYjQ0RTgrHB/8QAGgEAAgMBAQAAAAAAAAAAAAAAAAQCAwUBBv/EADMRAAIBAgUBBgUDBAMAAAAAAAECAAMRBBIhMUFRBRNhcZHRIoGhsfAUMsEjQuHxM1LS/9oADAMBAAIRAxEAPwD7jRCFEIUQhRCcPLHH43VfmaqqV6VL97ASQVm2EjF5A3KQH2qhcfhm2aS7lxxPRdQE43qg+pxUhjcOTbOJzu36SUEHiDmmQQdRIT2uwhRCFEIUQhRCFEJHPMkCbUhwP+6or4inQTPUMkiM5sIquNQll4J3F9OdeaxXa1aronwj6+vtHkw6rvrKLyKvF2GfU1l6sb7xgKeJMlxFGoHfPyQ07TZKa2JkCjEyFp1ZssSM/qBFKPmY5iJMIQNJZs3kRtpHIX7Gm8FUq0zmVrD6SmqqkWIjSC7DnZk4N9jXo8PjlqHK+hib0iNRLVaEphRCFEIUQkc0qwxl35Cqa9dKFMu+wklUsbCIridp3LuceQ6AV4zE4l8TUzv/AKmnTphBYSsC8p7vdTz6n5VRa0t0XfeXIYUhTIUZ5knnWiiimmsXZixka5lkyfn7UmoNapcyf7RC5vYIpfwxYNcmFpY4TwMirjOPcj61pBCRfiUZrRNHr9njexE28QtILpnPFDvSwVMD4u708xVdWm1NgE3JIt5SxagYfHHIuQ6FcbMnVaXqVwU+HeT7sg34jDTbstiGU8fhJ6+la/ZXaBb+jVOvB/iK4ijb4ljKt6KQohCiET6pPvJ92PCn3NeV7YxXeVe6Gy/eP4ZMq5usWt/ivsfAvi9T5Vk7RsfCL8yzAuWz0FMYanmOY8SlzxOrh/hHvU8TU/snEHM7hTYTjzPOrKFPKtzuZxzczJ3byx768lt79limR7SPUEUbqd3CDYkVtrY75ypzwOAccKfJAHG2tug19ZQqlmtF168ukS2NzdQpf2yzKDFb24jeIhG2WRV8YUZ7pyRzByKTU9/mAOUnqdN/Ha/WNVaXdAHcTWRyw3ltFc2kqyJIoeKVDkMDxHsazmUoxVhJow+UmifaUOOBH2NcBKm4gy20mhtJt/Ar9eR+de2wWI/UUQ/PPnMqomRrSampCcyNsRs5+EZqFVxTQueBedUXNpm5ZMK0jc+JNeCLF2udzNdV2EiLpa2ryzMFRFLyMegxkmuqpdgo3MHYamY/s5qV9Z6ra6hfSSG119jtQv8A6aXBMIHlmMbJ/iArZJphGpr/AGfXr9dfKUNTZbOefwTbQSxT3UkQkRpYgrSIDxUHOzkeuD9KzaVNqjZ2GkmWAFhLtPSqZ6fT9GN7cWzyia8nUmQTXTPKFJzhQWyoBAI2cYwPKqMRWq6Zdh4aXkkVfnC00WOG6juZ7q5unizud+VxHkYJAVRk4JGTk4J8zSrVyVygAX3tzLjc7m8q2K/2Pr0mnoMWV+HuLZQOEcoOZEHo2Q4Hnt1Y576iH5XQ+XB/j0lY+FrcGOV7k5HRxn3pbiXnVY20eTvyR9CNoVu9h1fien8/4iOKXQGNK9HE5Xvzi0l/lpLtE2wr+Uto/wDIJnbj8vHmwH3rxi7zVTeU+0+n3GpdmNUtbMbU81s6RrnG0SOWemRw96f7PULUFRtotWPw2Exi6lL2jvo9Ks7C5ia1v7aR2lhZNyibMjbeQAGz3QOOefKmO4/TKXdtwR5k6D3k6lYVRlUdJe7OXgftZFMjBrm7muI7pBzWMbWxtfy7pV9MnzrqKygodgBbz0v63JnagTukYHW/59o77bdozpNt+Es5VS9ljLtKwyLWIcDIR1PRV6n0BqdNR+469B1PT38JUq5ja9up6CZKPSIrnSQYoGs75jvo7iQhp0l+GRm5lvPj1IpVsSy1rlsy7EcW5AH29ZqjDI9HKFt94zXtJqmqQW8FlC1hcpHm9mmhJCSct2gOA2SM55Yx1PCD0KVElmOYHYA8dT094nRo1KhsdLbzqXWRf2lhPdRrDqmm6lbrcQqeA3jbrbXzRhISPpzFSWjlZgpurKbfLWx8RaUVLqbNuDNdL+ZEfUj7VnjYxhdjGGl8LtcdQa0uyDbFDyMWxH/HHVeumdIL5dq0lx+nNJ9oLmwr+Usom1QTOT/lZ8iD968Wu81k3lXtbql3o+mQz6eluzPcxwlp87KBzgNgcTxKj3rYpKgBB4EVsWYDrMrajW4Lu7uxqtus926vIEsu6CqhRgMxPICljXpfCMm3U/4mgOzzy/0nVncazpup3WpLFpV9Lcqiy4hNtIwXPxgsCePUdBTAxlJ1CsCLeN/ppKW7OddUN/pM8t1Nqup7c9rc3OrCXfXViUwqPw3W1Ie6I0Gdnnk8cZzVlS9iQQE2B8OdN7nn0hSCoAtrsNSPHjXaw4mgi0rXLjvXWpW9oD/lWsG2R/zfn+0Ulmw6/tUnzP8AA94znrtyB5D3kh0XVIkzBrRkbyurVSD+zZNR7ygd0t5H3vDNWGzX8x7Wii6t7ifXtHt9SsDDdG8TdXNvJtRSoh3jKTwI8AOyRzAIJxTNKyUnam11sbg7gnQffeLYl84AdbNfefRpPzYh6k/asobQXYxhpYzdg+Sk1p9jrfFA9AYriT/TjqvWzPnjAMpU8iMVF1DKVPM6DY3meMGZGiboSDXhxQYVTTbiagfQMIv1WyGr6VcaZOxUyIY9oc1b4WHqCAR8qs711qr4fWddRYkczLadcSTQtHdKI7yBzDcx/pkHP2PMHqCKMRS7p7Dbjymrh6wrIG55nGpTzrubSyx+MumKRMwyIwBlnI8gPqSB1ooU1Yln/aN/b5/aGIqlAAu5294XE0egQw6To0In1CcGTMrcAPimlbmePTmTwHLhcP616tU2UdPsImAVORNSfy5i+7trSELJ2j1SS5lkPBZZTHGT5JEpwffJ9a6tWq5tQSw9T8yf8S00aSC9Zrnx9pFZx6BcTbnSb5rS6HFVtrhonHrsHgfcGpO2KQZqq3HiLj149ZxUw1Q2Q2PgY47IQ32o6xNf6hcLcwadt2trMsexvXON4xA4ZXATIwM7XCoYlkSkFQWLakdOnrv6RJrmpYm4E2MfflZ+g7o/9rPPSWHQWjjR4+Ekh690V6HsOjYNVPlEMU2oWMq34pCiEoX0IVjKOGfFWN2hhwrd8Od4zRe4yxQ7lJ9+BkcmHpXnxWBqZjHgt1yxT2h0OS9kXVdHeNb8IFdHOI7lByVj0I6N05HIrQulRMr7cHp+dJCnUei91+YmV0a7R+0t22pIbK6SBIbe2usK+OLSFeOGBOwMgnw1VUpFaACai9yRt0Hlz6xkV1q1c22m33lS3vdxpd92gkTez3jl4lz4kzswoPmMe7GiomesuHGy/wC2P50l1Ju7omsdz+AR5ptjb6LaNe6pPD+MkUNc3cxCgH9Kk+FRyA9+ZNVu7VWyUx8PA/OZWAFGeodTuZXurP8Avju4YLQJpysGbUZ4sOcf7APHP8fIdM1Yr/pLkn4un/r2i9WoKuij5+011vbw2VtFZWUaxRxKFVV5KtZ7MzsXbmSVQBeWoYiSsUY58BRTptVcIu5kWa12M0MEQhiVF6CvcYeiKFJaY4mU7ZmuZJV0jCiE5dVdSrDIPAiouiupVhoZ0Eg3ESXdq9u/AZQnga8fjsA+GfTVTsZo0qoceMi/Dui5hbBPiU8j/SuikwTKDJd4CfilDUbKzvoDb6rZxTRH4J4w659M0qO9otdTY+EmUDjrEkvYns9KFVYriONSGWOK+mVFI4jChsDGOGKuGOxAN9L+Q9pE0tLa2+ct2vZzQrOZJls45p04rLcO07r8i5JHtUGxVdhlvYeGn2nRRF729Y3y7+EFR5nn9KX0EssBJI49nCoCST7k0AM5sN5EtyY6sLPcLtyfmH7V6vs3s/8ATjO/7j9JnVq2c2G0uVqyiFEIUQhRCeMoYYIyPWuMoYWIhKktn1iPsay63Z3NM/KMLW/7RZcxyq5242AHpwrz+Lo1lf41IEbpspGhlYohPhX6UneXAmdovRF/aK6oZzZdZEnrLUNhPKeK7A82/pWhQ7KxFXcZR4+0pfEIvjGdtZxW/EDL/qPOvRYTAUsNqup6xOpVZ95Yp6VQohCiEKIQohCiEKIQohOSinmo+lQNNDuJ25noAA4ACpAAbTk9rsIUQhRCFEIUQn//2Q==" style:>
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

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
