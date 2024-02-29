<x-layout>
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
</x-layout>
