

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Page Title</title>

<link rel="stylesheet" href="{{ asset('css/style.css') }}" >
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >
</head>
<body>

<div class="container">
  <div class="row mt-5" >
    <div class="col-lg-6 float-left index-div-1">
      <h2 >
        College Housing
      </h2>
      <h4 >
        The purpose of lorem ipsum
      </h4>
      <p>
        Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a 
      </p>
      @auth
      <div class="col-lg-12 float-left">
      <a href="{{ url($url) }}" class="index-link-signin btn btn-primary">Home</a>
      </div>
      @else
      @if (Route::has('login'))
      <div class="col-lg-12 float-left">
      
        
        
        
        <a href="{{ route('login') }}" class="index-link-signin btn btn-primary">sign in</a>
       
      </div>
      @endif
      @if(Route::has('register'))
      <div class="col-lg-6 float-left">
       
        <a href="{{ route('tenant.register') }}" class="index-link-register btn btn-secondary">Register Tenant</a>
        
      </div>

      <div class="col-lg-6 float-left">
       
        <a href="{{ route('owner.register') }}" class="index-link-register btn btn-secondary">Register House Owner</a>
        
      </div>
      @endif
      @endauth
    
    </div>
    <div class="col-lg-6 float-left">
      <img class="index-img-left" src="./images/index-1.png">
    </div>
  </div>
</div>
<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" ></script>
<script src="{{ asset('js/bootstrap.min.js') }}" ></script>
<script src="{{ asset('js/popper.min.js') }}" ></script>
</body>
</html>