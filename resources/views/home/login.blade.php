<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <div class="nav container">
            <a href="{{route('home')}}" class="logo"><i class="bx bx-home-alt-2"></i>Real State</a>
            <a href="{{route('register')}}" class="btn">Register</a>
        </div>
    </header>
    <div class="login container">
        <div class="login-container">
            <h2>Login To Continue</h2>
            <p>Log in with your data that you entered <br>during your registration</p>
            <form action="">
                <span>Enter your email address</span>
                <input type="email" name="" id="" placeholder="yourmail@gmail.com" required>
                <span>Enter your Password</span>
                <input type="password" name="" id="" placeholder="Password" required>
                <input type="submit" value="Login" class="buttom">
                <a href="#">Forgot password?</a>
            </form>
            <a href="{{route('register')}}" class="btn">Register now</a>
        </div>
        <div class="login-image">
            <img src="{{ asset('images/wel.png') }}" alt="">
        </div>
    </div>
    <!--Footer-->
    <section class="footer">
        <div class="footer-container container">
            <h2>Real State</h2>
            <div class="footer-box">
                <h3>Quick Links</h3>
                <a href="#">Agency</a>
                <a href="#">Building</a>
                <a href="#">Rates</a>
            </div>
            <div class="footer-box">
                <h3>Locations</h3>
                <a href="#">Birmingham</a>
                <a href="#">London</a>
                <a href="#">New York</a>
            </div>
            <div class="footer-box">
                <h3>Contact</h3>
                <a href="#">+44 (0) 800 123 4567</a>
                <a href="#">yourmail@gmail.com</a>
               <div class="social">
                <a href="#"><i class='bx bxl-facebook' ></i></a>
                <a href="#"><i class='bx bxl-twitter' ></i></a>
                <a href="#"><i class='bx bxl-instagram' ></i></a>
               </div>
            </div>
        </div>
    </section>
    <!--copyright-->
    <div class="copyright">
        <p>&#169; CarpoolVenam All Right Reserved</p>
    </div>
</body>
</html>
