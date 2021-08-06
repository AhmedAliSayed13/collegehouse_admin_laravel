<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>Page Title</title>
<title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/app.css') }}" >
<link rel="stylesheet" href="{{ asset('css/style.css') }}" >
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" >

</head>
<body>

<div class="container">
  <div class="row mt-5" >
    <div class="col-lg-6 float-left index-div-1">
      <h2 >
        CollegeHousing<span class="sign-admin-text"> admin portal</span>
      </h2>
      <h4 >
        Sign in
      </h4>


      <div class="col-lg-12 float-left">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <label for="field_email">Email address</label>
            
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="field_password">Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror

          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="float-right">forget password</a>
            @endif
          </div>
          <button type="submit" class="index-link-signin btn btn-primary" id="sign-in-btn">Sign in</button>
          <button type="button" class="index-link-signin btn btn-primary" id="sign-in-google-btn" >Sign in with Google</button>
          <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
            <div class="border-bottom w-100 ml-5"></div>
            <span class="px-2 small text-muted font-weight-bold text-muted">OR</span>
            <div class="border-bottom w-100 mr-5"></div>
          </div>
          <a href="{{ route('owner.register') }}" class="index-link-register btn btn-primary mb-2" style="margin-top: 0px!important;" >Register House Owner</a>
          <a href="{{ route('tenant.register') }}" class="index-link-register btn btn-primary mb-2" style="margin-top: 0px!important;" >Register Tenant</a>
          <a href="{{ route('step1') }}" class="index-link-register btn btn-primary mb-2" style="margin-top: 0px!important;" >Application</a>  
        </form>



      </div>



    </div>
    <div class="col-lg-6 float-left">
      <img class="index-img-left" src="./images/index-1.png">
    </div>
  </div>
</div>

  





<script src="{{ asset('js/jquery-3.4.1.slim.min.js') }}" ></script>
      <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
      <script src="{{ asset('js/popper.min.js') }}" ></script>
      <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
      <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
      <script>
      // Initialize Firebase
      var firebaseConfig = {
        apiKey: "AIzaSyCPnQ7PezYsrhQ5VdnujfnLtYN6l3KvHNk",
        authDomain: "colegehouse.firebaseapp.com",
        databaseURL: "https://colegehouse-default-rtdb.firebaseio.com",
        projectId: "colegehouse",
        storageBucket: "colegehouse.appspot.com",
        messagingSenderId: "743931132464",
        appId: "1:743931132464:web:1f784fb0da42f8b69ecbf5",
        measurementId: "G-LW1FVXVN2P"
      };
      firebase.initializeApp(config);
      var facebookProvider = new firebase.auth.FacebookAuthProvider();
      var googleProvider = new firebase.auth.GoogleAuthProvider();
      var facebookCallbackLink = '/login/facebook/callback';
      var googleCallbackLink = '/login/google/callback';
      async function socialSignin(provider) {
        var socialProvider = null;
        if (provider == "facebook") {
          socialProvider = facebookProvider;
          document.getElementById('social-login-form').action = facebookCallbackLink;
        } else if (provider == "google") {
          socialProvider = googleProvider;
          document.getElementById('social-login-form').action = googleCallbackLink;
        } else {
          return;
        }
        firebase.auth().signInWithPopup(socialProvider).then(function(result) {
          result.user.getIdToken().then(function(result) {
            document.getElementById('social-login-tokenId').value = result;
            document.getElementById('social-login-form').submit();
          });
        }).catch(function(error) {
          // do error handling
          console.log(error);
        });
      }
      </script>
</body>
</html>
