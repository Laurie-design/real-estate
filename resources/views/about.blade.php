<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <div class="nav container">
            <a href="{{ route('home') }}" class="logo"><i class="bx bx-home-alt-2"></i>Real State</a>
            <input type="checkbox" name="" id="menu">
            <label for="menu"><i class='bx bx-menu' id="menu-icon"></i></label>
            <ul class="navbar">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ url('about') }}">About Us</a></li>
                <li><a href="{{ url('properties') }}">Properties</a></li>
                <li><a href="{{ url('sales') }}">Sales</a></li>
                <li><a href="{{ url('contact') }}">Contact us</a></li>
                <li><a href="{{ route('agent.dashboard') }}">Vous êtes agent?</a></li>
            </ul>
        </div>
    </header>

    <section class="about container">
        <div class="about-text">
            <span>About us</span>
            <h2>We Provide The Best Property For You!</h2>
            <p>Avec des années d'expérience sur le marché immobilier, nous nous engageons à fournir à nos clients </br> le plus haut niveau de service et les meilleures propriétés disponibles.  </br> Que vous cherchiez à acheter, vendre ou louer, notre équipe est là pour vous aider à atteindre vos objectifs immobiliers.

            </p>
            <p>Notre mission est de créer des relations durables avec nos clients en leur fournissant des services  </br>de qualité supérieure, des conseils précieux et des résultats exceptionnels.</p>
            {{-- <a href="#" class="btn">Learn More</a> --}}
        </div>
    </section>

    <section class="footer">
        <div class="footer-container container">
            <h2>Real Estate</h2>
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
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                </div>
            </div>
        </div>
    </section>

    <div class="copyright">
        <p>&#169; CarpoolVenam All Right Reserved</p>
    </div>
</body>
</html>
