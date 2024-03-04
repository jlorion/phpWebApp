<x-layout>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach(json_decode($listing->images) as $value)
                    <div class="carousel-item @if(array_search($value, json_decode($listing->images))==0) active @endif">
                        <img src="{{$value}}" class="d-block w-100" alt="Listing Image">
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
                <div class="card-body">
                    <h1 class="card-text">{{$listing->title}}</h1>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <h3>Price</h3>
                        <p>{{$listing->price}}</p>
                    </li>
                    <li class="list-group-item">
                        <h3>Location</h3>
                        <p>{{$listing->location}}</p>
                    </li>
                    <li class="list-group-item">
                        <h3>Contacts</h3>
                        <p>{{$listing->contacts}}</p>
                    </li>
                    <li class="list-group-item">
                        <h3>Description</h3>
                        <p>{{$listing->Description}}</p>
                    </li>
                </ul>
            </div>
            </div>
            <div class="col-md-4 mb-5">
                <h3>Map</h3>
                <div id="map" style="height: 300px; border: 1px solid red;"></div>
            </div>
        </div>
    </div>

    <script>
                let map = L.map('map', {
                    center: [{{$listing->latitude}}, {{$listing->longtitude}}],
                    zoom: 10
                })
                let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                map.addLayer(layer);

                let marker = L.marker([{{$listing->latitude}}, {{$listing->longtitude}}]).addTo(map);
    </script>






</x-layout>
