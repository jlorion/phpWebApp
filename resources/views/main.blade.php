

<section>
    <h1>hello Sir Ernesto</h1>

@auth
        <h1>Welcome {{auth()->user()->name}}</h1>
        <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit">logout</button>
    </form>
@endauth
</section>
