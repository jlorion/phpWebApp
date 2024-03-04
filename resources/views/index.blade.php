
<x-layout>
<section class="jumbotron text-center">
    <div class="masthead pt-10" style="background-image: url('https://www.redfin.com/blog/wp-content/uploads/2021/06/Views-Napa.jpg'); background-size: cover; background-position: center; ">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xl-6">
                    <div class="text-center text-white">
                        <h1 class="m-5">Really Scuffed Airbnb type website!</h1>
                        <form action="/" class="m-5">
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="search" class="form-control form-control-lg" placeholder="Search for something..." />
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="tab">
        <div class="d-flex justify-content-center align-items-center">
            <button class="tablinks" onclick="openCity(event, 'Home')">All Listings</button>
            @auth    
            <button class="tablinks" onclick="openCity(event, 'User')">My Listings</button>
            @endauth
        </div>
    </div >
    <div class="container">
            <div id="Home" class="tabcontent" >
                <div class="row">
                    @foreach($listings as $listing)
                        <div class="col-md-4">
                            <div class="card mb-4 box-shadow">
                                <img class="card-img-top" src="{{json_decode($listing->images)[0]}}" >
                                <div class="card-body">
                                    <h3 class="card-title">{{$listing->title}}</h3>
                                    <p>{{$listing->location}}</p>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <div class="btn-group">
                                            <a href="/listings/{{$listing->id}}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>

            @auth
                <div id="User" class="tabcontent">
                    <div class="row">
                        @foreach($listings as $listing)
                            @if(auth()->user()->id === $listing->user_id)
                                <div class="col-md-4">
                                    <div class="card mb-4 box-shadow">
                                        <img class="card-img-top" src="{{json_decode($listing->images)[0]}}" >
                                        <div class="card-body">
                                            <h3 class="card-title">{{$listing->title}}</h3>
                                            <p>{{$listing->location}}</p>
                                            <div class="d-flex justify-content-end align-items-center">
                                                <div class="btn-group">
                                                    <a href="/listings/{{$listing->id}}" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                                    <a href="/listings/{{$listing->id}}/edit" type="button" class="btn btn-sm btn-outline-secondary">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endauth
        </div>
    </div>
</section>
<script>
function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
} 
openCity(event, 'Home')
</script>
</x-layout>
