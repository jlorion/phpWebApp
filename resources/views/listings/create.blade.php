<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/listing/create" method="post">
                    @csrf
                    <div>
                        <h1>Title</h1>
                        <input type="text" class="form-control mb-3" name="title" >
                        @error('title')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <h1>Price</h1>
                        <input type="text" class="form-control mb-3" name="price" >
                        @error('price')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    
                    <div>
                    <h1>Location</h1>
                    <input type="text" class="form-control mb-3" name="location" >
                        @error('location')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    <div>

                    <div>
                    <h2>Contacts</h2>
                    <input type="text" class="form-control mb-3" name="contacts" >
                        @error('contacts')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    
                    <div>
                    <h3>Description</h3>
                    <textarea class="form-control mb-3" name="Description" rows="5"></textarea>
                        @error('Description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    
                    <!-- Map -->
                    <div id="map" class="mb-3" style="height: 300px;"></div>
                    <script>
                        let map = new L.map('map', {
                            center: [10.628216112538693, 124.34875488281251],
                            zoom: 6
                        })

                        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
                        map.addLayer(layer);

                        let marker = null;
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
                    <!---->

                    <input type="hidden" step="any" class="form-control" step="any" placeholder="latitude"
                        aria-label="latitude" name="latitude" id="lat">
                    <input type="hidden" step="any" class="form-control" placeholder="longtitude"
                        aria-label="longtitude" name="longtitude" id="lng">
                    <!-- Add Images -->
                    <div>
                        <div class="input-group mb-3">
                            <input type="text" id="item" class="form-control" placeholder="Image URL">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="addItem()">Add Image</button>
                            </div>
                        </div>
                        <ul id="itemList" class="list-group mb-3">
                            <!-- Items will be added here -->
                        </ul>
                            @error('images[]')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <!---->

                    <button type="submit" class="btn btn-primary mb-5">Submit</button>

                </form>
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
        </script>
    </div>

</x-layout>
