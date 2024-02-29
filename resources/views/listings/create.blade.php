<x-layout>
    <body>
        <div style="display: flex; align-items: center; justify-content: center; ">
            <form action="/listing/create" method="post">
                @csrf
                <h1>title </h1>
                <input type="text" name="title"><br>
                <h1>price</h1>
                <input type="text" name="price"><br>
                <!-- contacts design here-->
                <h2>contacts</h2>
                <input type="text" name="contacts">
                <!--text are description pwede ra nimo e balot ug div or someshit-->
                <h3>description</h3>
                <textarea type="text" name="description" rows="5"></textarea>
                <!-- map and map script kung mag edit ka sa map ⬇️ dri lang sa div e edit-->
                <div id="map" class="mb-3" style="height: 300px; width: 544px;">
                </div>
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
                
                <!---pwede nani dli hilabtan kay invisble mani--->
                <input type="hidden" step="any" class="form-control" step="any" placeholder="latitude"
                    aria-label="latitude" name="latitude" id="lat">
                <input type="hidden" step="any" class="form-control" placeholder="longtitude"
                    aria-label="longtitude" name="longtitude" id="lng">

                <!--pang add ug images as a list -->
                <input type="text" id="item" >
                <button type="button" onclick="addItem()">Add shit</button>
                <br>
                <ul id="itemList">
                    <!-- Items will be added here -->
                </ul>
                <!---->
                
                <input type="submit" value="Submit">

            </form>
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

            // Create an input field
            var inputField = document.createElement("input");
            inputField.setAttribute("type", "text");
            inputField.setAttribute("name", "images[]")
            inputField.setAttribute("value", itemValue);
            inputField.setAttribute("readonly", "true"); // Make it readonly to prevent user from editing
            
            // Create a remove button
            var removeButton = document.createElement("button");
            removeButton.textContent = "Remove";
            removeButton.type = "button"; // Set button type to prevent form submission

            // Add click event listener to remove the item when remove button is clicked
            removeButton.addEventListener("click", function() {
                listItem.remove();
            });
            // Append the input field to the list item
            listItem.appendChild(inputField);
            listItem.appendChild(removeButton);

            // Append the new list item to the item list
            itemList.appendChild(listItem);

            // Clear the input field
            itemInput.value = "";
        }
    }
    </script>
    </body>
    
</x-layout>