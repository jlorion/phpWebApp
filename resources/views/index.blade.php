
<x-layout>

<section>
    <div>
        @foreach($listings as $listing)
            <!--image-->
            <img src="{{json_decode($listing->images)[0]}}">
            <!--title-->
            <h2>{{$listing->title}}</h2>
            <!--price-->
            <h3>{{$listing->price}}</h3>
            <!--location-->
            <h3>{{$listing->location}}</h3>
            <!--contacts-->
            <h4>{{$listing->contacts}}</h4>
            
        @endforeach

    </div>
</section>
</x-layout>
