<!DOCTYPE html>
<html>
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
  <div class="row mt-4 mb-4" >
    <div class="col-lg-7 float-left register-div-1 ">
      <h2 >
        CollegeHousing<span class="sign-admin-text"> admin portal</span>
      </h2>
      <h4>
        Register
      </h4>
      <div class="col-lg-12 float-left">
        <form method="POST" action="{{ route('register') }}">
            @csrf
          <div class="form-row mt-3">
            <div class="col">
              <label for="first_name">First Name</label>
              <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}"  autocomplete="first_name" autofocus>
              @error('first_name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div>
            <div class="col">
              <label for="last_name">Last Name</label>
              <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}"  autocomplete="last_name" autofocus>
              @error('last_name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div>
          </div>

          <div class="form-row mt-3">
            <div class="col">
              <label for="field_email">Email Address</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email">
              @error('email')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col">
              <label for="phone">Phone Number</label>
              <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}"  autocomplete="phone" autofocus>
              @error('phone')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div>
          </div>

          <div class="form-row mt-3">
            <div class="col">
              <label for="field_password">Password</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col">
              <label for="field_confirm_password">Retype Password</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
            </div>
          </div>

          <div class="form-row mt-3">
            <div class="col">
              <label for="address">Address</label>
              <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"  autocomplete="address" autofocus>
              @error('address')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div>
            <div class="col">
                <label for="zip">Postcode/Zip</label>
                <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}"  autocomplete="zip" autofocus>
                @error('zip')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            
          </div>

            <div class="form-row mt-3">
              <div class="col">
                <label for="city_id">City</label>
                <select id="city_id"  class="form-control @error('city_id') is-invalid @enderror" name="city_id"   autocomplete="city_id" autofocus>
                  <option value="">Select City</option>
                  @foreach($cities as $city)   
                    <option value="{{ $city->id}}">{{ $city->name}}</option>
                  @endforeach    
                </select>
                  @error('city_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="col">
                <label for="state">State</label>
                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}"  autocomplete="state" autofocus>
                @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>



            






          <div class="form-check mt-3">
            <input type="checkbox" class="form-check-input"  @error("condition") is-invalid @enderror" name="condition" id="field_condition">
            <label class="form-check-label" for="condition">I have agreed to the terms and conditions</label>
            @error('condition')
                <span class="invalid-feedback d-block" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
          </div>


          <button type="submit" class="index-link-signin btn btn-primary" id="sign-in-btn">Register</button>

          </form>

      </div>



    </div>
    <div class="col-lg-5 float-left">
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
