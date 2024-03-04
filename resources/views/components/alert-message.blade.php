@if(session()->has('message'))

<div>
  <script>
  $(document).ready(function(){
          // Function to fade out and remove the alert after a delay
          function removeAlert() {
              $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(this).remove(); 
              });
          }

          // Show the alert
          $(".alert").alert();

          // Hide the alert after 3 seconds
          setTimeout(function() {
              removeAlert();
          }, 6000); // Adjust the delay as needed
      });
  </script>
  @if (session('type')=="error")
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{session('message')}}
        
      </div>
  @else
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('message')}}
        
      </div>
  @endif
</div>

@endif
