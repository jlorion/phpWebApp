<x-layout>
    <body>
        <div style="display: flex; align-items: center; justify-content: center; ">
            <h3>Edit things</h3>
            <form action="/user/edit" method="post">
                @csrf
                <h1>UserName: </h1>
                <input type="text" name="name"><br>
                <input type="submit" value="Submit">
            </form>
            <form action="/user/edit" method="post">
                @csrf
                <h1>Email: </h1>
                <input type="text" name="email"><br>
                <input type="submit" value="Submit">
            </form>
            <form action="/user/edit" action="post">
                @csrf
                <h3>Former Passowrd:</h3>
                <input type="password" name="password">
                <h2>Password: </h2>
                <input type="password" name="new_password"><br><br>
                <h2>Password Confirmation: </h2>
                <input type="password" name="password_confirmation"><br><br>
                <input type="submit" value="Submit">
            </form>

        </div>
    </body>
</x-layout>