<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
    </head>
    <body>
        <div style="display: flex; align-items: center; justify-content: center; ">
            <form action="/signup" method="post">
                @csrf
                <h1>UserName: </h1>
                <input type="text" name="name"><br>
                <h1>Email: </h1>
                <input type="text" name="email"><br>
                <h2>Password: </h2>
                <input type="password" name="password"><br><br>
                <h2>Password Confirmation: </h2>
                <input type="password" name="password_confirmation"><br><br>
                <input type="submit" value="Submit">

            </form>
        </div>
    </body>
</html>
