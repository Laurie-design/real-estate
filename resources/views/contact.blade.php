<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <style>
        /* Global Styles */
        .contact-form {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f7f7f7;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

.contact-form h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

.form-group input[type="text"],
.form-group input[type="email"],
.form-group textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    color: #333;
}

.form-group textarea {
    resize: vertical;
}

.form-group button {
    width: 100%;
    padding: 12px;
    background-color:#3492fd;
    color: white;
    font-size: 18px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-group button:hover {
    background-color:#3492fd;.
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
                {{-- <li><a href="{{ url('contact') }}">Contact nous</a></li> --}}
                <li><a href="{{ route('agent.dashboard') }}" class="btn btn-primary ru-agent">Vous êtes agent?</a></li>
            </ul>
        </div>
    </header>

    <section class="contact container">
        <div class="contact-form">
            <h1>Contact Us</h1>
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" placeholder="Your Message" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Send Message</button>
                </div>
            </form>
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
