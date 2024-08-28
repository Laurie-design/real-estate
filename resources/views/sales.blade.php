<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        /* Footer Specific Styles */
        footer {
            background-color: var(--main-color);
            color: var(--bg-color);
            padding: 40px 0;
            border-radius: 5rem 0 0 0;
        }

        .footer-container {
            max-width: 1068px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 2rem;
        }

        .footer-box h3 {
            margin-bottom: 1rem;
            font-size: 1rem;
            font-weight: 400;
            color: var(--bg-color);
        }

        .footer-box a {
            font-size: 0.8rem;
            color: var(--bg-color);
            margin-bottom: 0.5rem;
            text-decoration: none;
        }

        .footer-box a:hover {
            color: var(--text-color);
        }

        .social a {
            font-size: 20px;
            margin-right: 1rem;
            color: var(--bg-color);
            text-decoration: none;
        }

        .social a:hover {
            color: var(--second-color);
        }

        .copyright {
            padding: 20px;
            text-align: center;
            color: var(--bg-color);
            background: var(--main-color);
        }
    </style>
</head>
<body>
    <header>
        <div class="nav container">
            <a href="{{ route('home') }}" class="logo"><i class="bx bx-home-alt-2"></i>Real State</a>
            <input type="checkbox" name="" id="menu">
            <label for="menu"><i class='bx bx-menu' id="menu-icon"></i></label>
            <ul class="navbar">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('sales') }}">Sales</a></li>
                <li><a href="{{ route('properties.list') }}">Properties</a></li>
                <li><a href="{{ route('contact') }}">Contact us</a></li>
                <li><a href="{{ route('agent.dashboard') }}">Vous êtes agent?</a></li>
            </ul>
        </div>
    </header>

    <section class="sales container">
        <div class="box">
            <i class='bx bx-user'></i>
            <h3>Make Your Dream True</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, vero!</p>
        </div>
        <div class="box">
            <i class='bx bx-desktop'></i>
            <h3>Start Your Membership</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, vero!</p>
        </div>
        <div class="box">
            <i class='bx bx-home-alt'></i>
            <h3>Enjoy Your New Home</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, vero!</p>
        </div>
    </section>

    <footer>
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
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright">
        <p>&#169; Real State All Right Reserved</p>
    </div>
</body>
</html>
