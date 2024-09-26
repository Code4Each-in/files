@extends('layout')

@push('styles')
<style>
* {
  box-sizing: border-box;
}
body {
  align-items: center;
  display: flex;
  justify-content: center;
  flex-direction: column;
  background: #f6f5f7;
  font-family: 'Montserrat', sans-serif;
  /* min-height: 100%; */
  margin: 4.5%;
}
 .container {
  position: relative;
  width: 768px;
  max-width: 100%;
  min-height: 620px;
  background: #fff;
  border-radius: 10px;
  overflow: hidden;
  box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
}
 .sign-up, #main_id .sign-in {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  transition: all 0.6s ease-in-out;
}
 .sign-up {
  width: 50%;
  opacity: 0;
  z-index: 1;
}
 .sign-in {
  width: 50%;
  z-index: 2;
}
form {
  background: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 50px;
  height: 100%;
  text-align: center;
  position: relative;
 /* / Added for positioning of error messages / */
}
 form#signUpForm .form-group {
  position: relative;
  width: 300px;
}
form#signInForm h1 {
  padding-bottom: 20px;
  color: #2e5555;
  font-weight: bold;
  font-size: 30px;
  margin: 0;
}
 form#signUpForm h1 {
  padding-bottom: 20px;
  color: #2e5555;
  font-weight: bold;
  font-size: 30px;
  margin: 0;
}
p {
  font-size: 14px;
  font-weight: 100;
  line-height: 20px;
  letter-spacing: 0.5px;
  margin: 15px 0 20px;
}
input {
  background: #eee;
  padding: 12px 15px;
  margin: 8px 0;
 /* // Adjusted margin for spacing  */
  width: 100%;
  border-radius: 5px;
  border: none;
  outline: none;
  position: relative;
 /* / Added for positioning of error messages / */
}
input.error {
  border: 1px solid red;
}
 .error-message {
  color: red;
  font-size: 0.875rem;
  position: absolute;
  bottom: -1.5rem;
 /* / Adjust as needed / */
  left: 0;
  width: 100%;
  text-align: left;
 /* / Align text to the left / */
}
a {
  color: #333;
  font-size: 14px;
  text-decoration: none;
  margin: 15px 0;
}
 button {
  color: #fff;
  background: #ff4b2b;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 55px;
  margin: 20px;
  border-radius: 20px;
  border: 1px solid #ff4b2b;
  outline: none;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
  cursor: pointer;
}
button:active {
  transform: scale(0.9);
}
 .button {
  color: #fff;
  background: #ff4b2b;
  font-size: 12px;
  font-weight: bold;
  padding: 12px 55px;
  margin: 20px;
  border-radius: 20px;
  border: 1px solid #ff4b2b;
  outline: none;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: transform 80ms ease-in;
  cursor: pointer;
}
.button:active {
  transform: scale(0.9);
}
 #SignIn, #main_id #SignUp {
  background-color: transparent;
  border: 2px solid #fff;
}
 .container.right-panel-active .sign-in {
  transform: translateX(100%);
}
 .container.right-panel-active .sign-up {
  transform: translateX(100%);
  opacity: 1;
  z-index: 5;
}
 .overlay-container {
  position: absolute;
  top: 0;
  left: 50%;
  width: 50%;
  height: 100%;
  overflow: hidden;
  transition: transform 0.6s ease-in-out;
  z-index: 100;
}
 .container.right-panel-active .overlay-container {
  transform: translateX(-100%);
}
 div#signInEmailError {
  padding-bottom: 10px;
}
 .overlay {
  position: relative;
  color: #fff;
  background: linear-gradient(to left, #3c7474, #ff228c);
  left: -100%;
  height: 100%;
  width: 200%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
}
.container.right-panel-active .overlay {
  transform: translateX(50%);
}
 .overlay-left, #main_id .overlay-right {
  position: absolute;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  padding: 0 40px;
  text-align: center;
  top: 0;
  height: 100%;
  width: 50%;
  transform: translateX(0);
  transition: transform 0.6s ease-in-out;
  background: linear-gradient(to right, #3c7474, #ff228c);
}
 .overlay-left {
  transform: translateX(-20%);
}
 .overlay-right {
  right: 0;
  transform: translateX(0);
}
 .container.right-panel-active .overlay-left {
  transform: translateX(0);
}
 .container.right-panel-active .overlay-right {
  transform: translateX(20%);
}
.form-group {
  position: relative;
 /* / Allows for error message positioning / */
 /* / Space below each form group / */
}
 .text-danger {
  color: red;
  font-size: 0.875em;
 /* / Adjust font size as needed / */
 /* margin-top: 0.25em;
  */
}
</style>
@endpush
@section('content')

<div id="main_id">
<div class="container" id="main">
    <div class="sign-up">
        <form id="signUpForm" novalidate>
            @csrf
            <h1>Create Account</h1>
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" id="name" class="form-control">
                <div id="nameError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" id="email" class="form-control">
                <div id="emailError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <input type="text" name="phone" placeholder="Phone" id="phone" class="form-control">
                <div id="phoneError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                <div id="passwordError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" class="form-control">
                <div id="password_confirmationError" class="text-danger"></div>
            </div>
            <button type="button" id="signUpButton">Register</button>
        </form>
    </div>
    <div class="sign-in">
        <form id="signInForm" novalidate>
            @csrf
            <h1>Sign In</h1>
            <div class="form-group">
                <input type="email" name="email1" placeholder="Email" id="signInEmail" class="form-control">
                <div id="signInEmailError" class="text-danger"></div>
            </div>
            <div class="form-group">
                <input type="password" name="password1" placeholder="Password" id="signInPassword" class="form-control">
                <div id="signInPasswordError" class="text-danger"></div>
            </div>
            <button type="button" id="signInButton">Log In</button>
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-left">
                <h1>Welcome Back To C4E</h1>
                <p>To keep connected with us please login with your personal info</p>
                <!-- <button id="SignIn">Log In</button> -->
                <a href="{{ route('login') }}" class="button" id="SignIn">Log In</a>
            </div>
            <div class="overlay-right">
                <h1>Welcome To Join C4E</h1>
                <p>Enter your personal details and start your journey with us</p>
                <!-- <button id="SignUp">Register</button> -->
                <a href="{{ route('register') }}" class="button" id="SignUp">Register</a>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
@section('js_scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
  const signInButton = document.getElementById('SignIn');
  const signUpButton = document.getElementById('SignUp');
  const container = document.querySelector('.container');

  var pathname = window.location.pathname;
  var pageKey = pathname.replace(/[/\\]/g, '');

  if(pageKey=='login'){
    container.classList.remove('right-panel-active');
  }else if(pageKey=='register'){
    container.classList.add('right-panel-active');
  }  

  signInButton.addEventListener('click', function() {
    container.classList.remove('right-panel-active');
  });

  signUpButton.addEventListener('click', function() {
    container.classList.add('right-panel-active');
  });

  $(document).ready(function() {
    var pathname = window.location.pathname;

  $('#signUpButton').on('click', function() {
    var formData = $('#signUpForm').serialize();
    $.ajax({
      url: '{{ route('register') }}',
      type: 'POST',
      data: formData,
      success: function(response) {
        // Redirect or display a success message
        window.location.href = '{{ route('login') }}';
      },
      error: function(xhr) {
        var errors = xhr.responseJSON.errors;
        $('.text-danger').empty();
        if (errors) {
          for (var key in errors) {
            // Use the input field ID to display errors
            $('#' + key).after('<div class="text-danger">' + errors[key][0] + '</div>');
          }
        }
      }
    });
  });

  $('#signInButton').on('click', function() {
    var formData = $('#signInForm').serialize();
    $.ajax({
      url: '{{ route('login.post') }}', // Updated route name
      type: 'POST',
      data: formData,
      success: function(response) {
        // Redirect or handle login success
        window.location.href = '{{ route('home') }}';
      },
      error: function(xhr) {
                var errors = xhr.responseJSON.errors;
                $('.text-danger').empty(); // Clear previous error messages
                if (errors) {
                    // Handle errors for email1 and password1
                    if (errors.email1) {
                        $('#signInEmailError').text(errors.email1[0]);
                    }
                    if (errors.password1) {
                        $('#signInPasswordError').text(errors.password1[0]);
                    }
                }
            }
    });
  });
});

});

</script>
@endsection
