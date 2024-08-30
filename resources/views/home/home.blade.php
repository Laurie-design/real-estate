<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estate Real</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <div class="nav container">
            <a href="{{ route('home') }}" class="logo"><i class="bx bx-home-alt-2"></i> ImmoPlus</a>
            <input type="checkbox" name="" id="menu">
            <label for="menu"><i class='bx bx-menu' id="menu-icon"></i></label>
            <ul class="navbar">
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ url('about') }}">À propos de nous</a></li>
                <li><a href="{{ url('properties') }}">Propriétés</a></li>
                {{-- <li><a href="{{ url('contact') }}">Contact nous</a></li> --}}
                <li><a href="{{ route('agent.dashboard') }}" class="btn btn-primary ru-agent">Vous êtes agent?</a></li>
            </ul>
        </div>
    </header>


    <section class="home container" id="home">
        <div class="home-text">
            <h2>Trouvez votre prochain<br>Endroit parfait pour <br>Vivre.</h2>
        </div>
    </section>


    <section class="about container" id="about">
        <div class="about-img">
            <img src="{{ asset('images/img12.jpg') }}" alt="">
        </div>
        <div class="about-text">
            <span>A propos de nous</span>
            <h3>Nous vous proposons <br>des meilleurs propriétés!</h3>
            <p>Votre partenaire de confiance pour trouver, vendre ou louer des propriétés d'exception, avec un service personnalisé et des conseils d'experts pour réaliser tous vos projets immobiliers.</p>
            <a href="{{ url('about') }}" class="btn">Lire Plus</a>
        </div>
    </section>

    {{-- <section class="sales container" id="sales">
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
    </section> --}}

    <section class="properties container" id="properties">
        <div class="heading">
            <span>Récent</span>
            <h2>Nos propriétés en vedette</h2>
            <p>Découvrez notre sélection exclusive de propriétés,<br>soigneusement choisies pour répondre à toutes vos attentes en matière de confort et de qualité.</p>
        </div>
        <div class="properties-container">
            @foreach($properties as $property)
            <div class="box">
                <img src="{{ asset('storage/' . $property->image_path) }}" alt="{{ $property->title }}">
                <h3>${{ number_format($property->price, 2) }}</h3>
                <div class="content">
                    <div class="text">
                        <h3>{{ $property->title }}</h3>
                        <p>{{ $property->address }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- <section class="newsletter container">
        <h2>Have Question in mind? <br> Let us help you</h2>
        <form action="">
            <input type="email" name="" id="email-box" placeholder="yourmail@gmail.com" required>
            <input type="submit" value="Send" class="btn">
        </form>
    </section> --}}

    <section>
 </section>
 <section class="footer">
    <div class="footer-container container">
        <h2>ImmoPlus</h2>
        <div class="footer-box">
            <h3>Liens rapides</h3>
            <a href="#">Agence</a>
            <a href="#">Bâtiment</a>
            <a href="#">Tarifs</a>
        </div>
        <div class="footer-box">
            <h3>Emplacements</h3>
            <a href="#">Lomé</a>
            <a href="#">Sokodé</a>
            <a href="#">Kara</a>
        </div>
        
        <div class="footer-box">
            <h3>Contact</h3>
            <a href="#">+228 93 25 46 12</a>
            <a href="#">votremail@gmail.com</a>
            <div class="social">
                <a href="#"><i class='bx bxl-facebook'></i></a>
                <a href="#"><i class='bx bxl-twitter'></i></a>
                <a href="#"><i class='bx bxl-instagram'></i></a>
            </div>
        </div>
    </div>
</section>

<div class="copyright">
    <p>&#169; CarpoolVenam Tous droits réservés</p>
</div>
</body>
</html>
