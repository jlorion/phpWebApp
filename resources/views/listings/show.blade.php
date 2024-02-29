<x-layout>
    <h3>Images</h3>
    @foreach(json_decode($listing->images) as $value)
    <img src="{{$value}}">
    @endforeach
    <h3>Title</h3>
    <h1>{{$listing->title}}</h1>
    <h3>price</h3>
    {{$listing->price}}
    <h3> contacts</h3>
    {{$listing->contacts}}
    <h3>description</h3>
    {{$listing->Description}}
    <h3>MAP</h3>
    <div id="map" style="width: 256px; height: 256px; border-color:red; border-width:10px;">
                <!--  <iframe width="544" height="300" frameborder="0" style="border:0" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed/v1/view?key=AIzaSyBmIwbHivFRB9G8bnd9tuFCKWWeFNg6VWc&center=<%=listing.lat%>,<%=listing.lng %>&zoom=18&maptype=satellite" frameborder="0"></iframe> -->
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