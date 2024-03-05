<x-layout>
   
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4">
                    <h1 class="text-center mb-4">Sign Up</h1>
                    <form action="/signup" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Username:</label>
                            <input type="text" class="form-control" id="name" name="name">
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password Confirmation:</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                            @error('password_confirmation')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
</x-layout>
