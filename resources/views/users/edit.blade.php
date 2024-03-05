<x-layout>
    
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center mb-4">Edit Profile</h3>
                <form action="/user/edit" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @error('name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
                <form action="/user/edit" method="post" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email">
                        @error('email')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
                <form action="/user/edit" method="post" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="old_password">Former Password:</label>
                        <input type="password" class="form-control" id="old_password" name="old_password">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password Confirmation:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3 mb-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

    
</x-layout>
