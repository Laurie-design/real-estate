<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>À propos de nous</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .nav.container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            
        }
        .logo {
            font-size: 1rem;
            color: var(--text-color);
            text-decoration: none;
        }
        .navbar {
            list-style: none;
            display: flex;
            gap: 20px;
        }
        .navbar a {
            color: var(--text-color);
            text-decoration: none;
            font-size: 1em;
        }
        .about.container {
            padding: 50px 20px;
            text-align: center;
            background-color: #f5f5f5; 
        }
        .about-text h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
            margin-top: 40px; 
            color:var(--text-color);
            
        }
        .about-text p { 
        font-size: 1.2em;
        margin-bottom: 20px

            line-height: 1.8;
        }
        .footer {
            background-color:  var(--main-color);
            color: #fff;
            padding: 40px 20px;
        }
        .footer-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .footer-box {
            flex: 1;
            margin-right: 20px;
        }
        .footer-box h3 {
            font-size: 1.2em;
            margin-bottom: 15px;
        }
        .footer-box a {
            display: block;
            color: #fff;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 1em;
        }
        .footer-box a:hover {
            text-decoration: underline;
        }
        .social a {
            color: #fff;
            margin-right: 10px;
            font-size: 1.5em;
        }
        .copyright {
            text-align: center;
            padding: 10px 0;
            background-color:  var(--main-color);
            color: #fff;
        }
    </style>
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
                <li><a href="{{ route('agent.dashboard') }}" class="btn btn-primary ru-agent">Vous êtes agent?</a></li>
            </ul>
        </div>
    </header>

    <section class="about container">
        <div class="about-text">
            {{-- <span>À propos de nous</span> --}}
            <h2>Nous vous proposons les meilleures propriétés !</h2>
            <p>Votre partenaire de confiance pour trouver, vendre ou louer des propriétés d'exception, avec un service personnalisé et des conseils d'experts pour réaliser tous vos projets immobiliers. Depuis plusieurs années, nous nous engageons à offrir une expérience immobilière unique, adaptée aux besoins spécifiques de chacun de nos clients. Que vous soyez à la recherche de la maison de vos rêves, d'une opportunité d'investissement ou d'un lieu idéal pour votre entreprise, nous mettons à votre disposition notre expertise et notre réseau pour vous accompagner à chaque étape.</p>
            
            <p>Notre approche se distingue par une attention particulière portée aux détails et à la satisfaction client. Nous croyons fermement que chaque transaction immobilière est une étape cruciale dans la vie de nos clients, et c'est pourquoi nous nous efforçons de créer des relations durables fondées sur la confiance et la transparence. Notre équipe d'experts est toujours à l'écoute pour comprendre vos besoins spécifiques et vous proposer des solutions sur mesure, que ce soit pour l'achat, la vente, ou la location de biens immobiliers.</p>
            
            <p>En choisissant nos services, vous bénéficiez d'un accompagnement complet, allant de l'évaluation précise de votre propriété à la négociation finale, en passant par la gestion des aspects juridiques et administratifs. Nous sommes fiers de notre capacité à transformer des projets immobiliers en réussites, en alliant innovation, connaissance approfondie du marché, et un service client irréprochable. Faites nous confiance pour vous guider vers le succès dans tous vos projets immobiliers.</p>
        </div>
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
