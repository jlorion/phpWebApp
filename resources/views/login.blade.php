 <body>
        <div style="display: flex; align-items: center; justify-content: center; ">
            <form action="/login" method="POST">
                @csrf
                <h1>Email: </h1>
                <input type="text" name="email"><br> <h2>Password: </h2>
                <input type="password" name="password"><br><br>
                <input type="submit" value="Submit">

            </form>
        </div>
    </body>

