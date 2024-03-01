@if(session()->has('message'))

@if (session('type')=="error")
    <div class="alert alert-danger" role="alert">
      {{session('message')}}
    </div>
@else
    <div class="alert alert-success" role="alert">
      {{session('message')}}
    </div>
@endif
@endif
