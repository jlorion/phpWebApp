<h1> Manage listings</h1>

    @unless($listings->isEmpty())
        @foreach($listings as $value)
        <img src="{{json_decode($value->images)[0]}}">
        
        <h3> {{$value->title}}</h3>
        <h4> {{$value->price}}</h4>
        <hr>
        @endforeach
    @endunless
