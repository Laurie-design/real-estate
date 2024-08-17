<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <div class="nav container">
            <a href="{{route('home.home')}}" class="logo"><i class="bx bx-home-alt-2"></i>Real State</a>
            <a href="{{route('home.login')}}" class="btn">Login</a>
        </div>
    </header>
    <div class="login container">
        <div class="login-container">
            <h2>Welcome , Let's get started</h2>
            <p>Already have account? <a href="{{route('login')}}">Login</a></p>
            <form action="">
                <span>Full Name</span>
                <input type="text" name="" id="" placeholder="Your Name" required>
                <span>Enter your email address</span>
                <input type="email" name="" id="" placeholder="yourmail@gmail.com" required>
                <span>Phone</span>
                <input type="tel" name="" id="" placeholder="Enter your number" required>
                <span>Enter your Password</span>
                <input type="password" name="" id="" placeholder="At least 8" required>
                <input type="submit" value="Register" class="buttom">
                <a href="{{route('login')}}">Already have account?</a>
            </form>
            <a href="{{route('login')}}" class="btn">Login</a>
        </div>
        <div class="login-image">
            <img src="{{ asset('images/regis1.jpg') }}" alt="">
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
