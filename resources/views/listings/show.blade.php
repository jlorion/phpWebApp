<x-layout>
    <h3>Images</h3>
    @foreach(json_decode($listing->images) as $value)
    <img src="{{$value}}">
    @endforeach
    <h3>Title</h3>
    <h1>{{$listing->title}}</h1>
    <h3>price</h3>
    {{$listing->price}}
    <h3>location</h3>
    {{$listing->location}}
    <h3> contacts</h3>
    {{$listing->contacts}}
    <h3>description</h3>
    {{$listing->Description}}
    <h3>MAP</h3>
    <div id="map" style="width: 256px; height: 256px; border-color:red; border-width:10px;">
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
