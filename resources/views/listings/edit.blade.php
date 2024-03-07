<x-layout>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/listings/{{$listing->id}}/edit" method="post">
                @csrf
                <h1>Title</h1>
                <input type="text" class="form-control mb-3" name="title" value="{{$listing->title}}">
                
                <h1>Price</h1>
                <input type="text" class="form-control mb-3" name="price" value="{{$listing->price}}">
                
                <h1>Location</h1>
                <input type="text" class="form-control mb-3" name="location" value="{{$listing->location}}">

                <h2>Contacts</h2>
                <input type="text" class="form-control mb-3" name="contacts" value="{{$listing->contacts}}">
                
                <h3>Description</h3>
                <textarea class="form-control mb-3" name="Description" rows="5">{{$listing->Description}}</textarea>
                
                <!-- Map -->
                <div id="map" class="mb-3" style="height: 300px;"></div>
                <script>
                let map = new L.map('map', {
                    center: [{{$listing->latitude}}, {{$listing->longtitude}}],
                    zoom: 6
                })

                let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                map.addLayer(layer);

                let marker = L.marker([{{$listing->latitude}}, {{$listing->longtitude}}]).addTo(map);
                map.on('click', (event) => {
                    console.log(event);
                    if (marker !== null) {
                        map.removeLayer(marker);
                    }

                    marker = L.marker([event.latlng.lat, event.latlng.lng]).addTo(map);
                    document.getElementById('lat').value = event.latlng.lat;
                    document.getElementById('lng').value = event.latlng.lng;

                })
            </script>
                
                <!-- Hidden latitude and longitude fields -->
                <input type="hidden" step="any" class="form-control" step="any" placeholder="latitude"
                aria-label="latitude" name="latitude" id="lat" value="{{$listing->latitude}}">
            <input type="hidden" step="any" class="form-control" placeholder="longtitude"
                aria-label="longtitude" name="longtitude" id="lng" value="{{$listing->longtitude}}">
                
                <!-- Add Images -->
                <div class="input-group mb-3">
                    <input type="text" id="item" class="form-control" placeholder="Image URL">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick="addItem()">Add Image</button>
                    </div>
                </div>
                <ul id="itemList" class="list-group mb-3">
                    <!-- Items will be added here -->
                </ul>
                
                <!-- Submit Button -->
                <button type="submit" id="submit-edit-form" style="background:transparent;border:none"></button>
            </form>

                <div class="d-flex justify-content-between mb-5">
                    <button type="submit" class="btn btn-primary" onclick="document.getElementById('submit-edit-form').click()">Update</button>
                    <form action="/listing/delete" method="post">
                        <div>
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button> 
                        </div>
                    </form>
                </div>
        </div>
    </div>
</div>

    <script>
    function addItem() {
        var itemInput = document.getElementById("item");
        var itemList = document.getElementById("itemList");

        // Get the value of the item input
        var itemValue = itemInput.value.trim();

        // Check if the input is not empty
        if (itemValue !== "") {
            // Create a new list item
            var listItem = document.createElement("li");
            listItem.setAttribute("class", "list-group-item ");

            // Create an input field
            var inputField = document.createElement("input");
            inputField.setAttribute("type", "hidden");
            inputField.setAttribute("name", "images[]")
            inputField.setAttribute("value", itemValue);
            inputField.setAttribute("readonly", "true"); // Make it readonly to prevent user from editing

            var imgField = document.createElement("img");
            imgField.src = itemValue;
            imgField.classList.add('img-thumbnail');

            // Create a remove button
            var removeButton = document.createElement("button");
            removeButton.textContent = "Remove";
            removeButton.classList.add("btn", "btn-warning");
            removeButton.type = "button"; // Set button type to prevent form submission

            // Add click event listener to remove the item when remove button is clicked
            removeButton.addEventListener("click", function() {
                listItem.remove();
            });
            // Append the input field to the list item
            listItem.appendChild(inputField);
            listItem.appendChild(imgField);
            listItem.appendChild(document.createElement("br"));
            listItem.appendChild(removeButton);

            // Append the new list item to the item list
            itemList.appendChild(listItem);

            // Clear the input field
            itemInput.value = "";
        }
    }
    function addExistingItem(itemValue) {
        var itemList = document.getElementById("itemList");
        // Create a new list item
        var listItem = document.createElement("li");
        listItem.setAttribute("class", "list-group-item");

        // Create an input field
        var inputField = document.createElement("input");
        inputField.setAttribute("type", "hidden");
        inputField.setAttribute("name", "images[]")
        inputField.setAttribute("value", itemValue);
        inputField.setAttribute("readonly", "true"); // Make it readonly to prevent user from editing

        var imgField = document.createElement("img");
            imgField.src = itemValue;
            imgField.classList.add('img-thumbnail');
        // Create a remove button
        var removeButton = document.createElement("button");
        removeButton.textContent = "Remove";
        removeButton.classList.add("btn", "btn-warning");
        removeButton.type = "button"; // Set button type to prevent form submission

        // Add click event listener to remove the item when remove button is clicked
        removeButton.addEventListener("click", function() {
            listItem.remove();
        });
        // Append the input field to the list item
        listItem.appendChild(inputField);
        listItem.appendChild(imgField);
        listItem.appendChild(document.createElement("br"))
        listItem.appendChild(removeButton);

        // Append the new list item to the item list
        itemList.appendChild(listItem);

    }

    @foreach(json_decode($listing->images) as $value)
        addExistingItem("{{$value}}")

    @endforeach
    </script>
    </body>

</x-layout>



