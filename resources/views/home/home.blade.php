<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estate Real</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <header>
        <div class="nav container">
            <a href="#home" class="logo"><i class="bx bx-home-alt-2"></i>Real State</a>
            <input type="checkbox" name="" id="menu">
            <label for="menu"><i class='bx bx-menu' id="menu-icon"></i></label>
            <ul class="navbar">
                <li><a href="#home">Home</a></li>
                <li><a href="{{ route('about') }}">About Us</a></li>
                <li><a href="{{ route('sales') }}">Sales</a></li>
                <li><a href="{{ route('properties.list') }}">Properties</a></li>
                <li><a href="{{ route('contact') }}">Contact us</a></li>
                {{-- <li><a href="{{ route('property.create') }}">Ajouter un bien</a></li> --}}
            </ul>
        </div>
    </header>


    <section class="home container" id="home">
        <div class="home-text">
            <h1>Find Your Next <br>Perfect Place To <br>Live.</h1>
        </div>
    </section>


    <section class="about container" id="about">
        <div class="about-img">
            <img src="{{ asset('images/img12.jpg') }}" alt="">
        </div>
        <div class="about-text">
            <span>About us</span>
            <h2>We Provide The Best <br>Property For You !</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora possimus vero nostrum provident. Eligendi optio pariatur repellendus incidunt explicabo facere ad numquam animi.</p>
            <a href="#" class="btn">Learn More</a>
        </div>
    </section>

    <section class="sales container" id="sales">
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

    <section class="properties container" id="properties">
        <div class="heading">
            <span>Recent</span>
            <h2>Our Featured Properties</h2>
            <p>Lorem ipsum dolor sit amet consectetur <br>adipisicing elit. Dolorem, modi?</p>
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
                    <a href="{{ route('property.show', $property->id) }}" class="btn">Voir Détail</a>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <section class="newsletter container">
        <h2>Have Question in mind? <br> Let us help you</h2>
        <form action="">
            <input type="email" name="" id="email-box" placeholder="yourmail@gmail.com" required>
            <input type="submit" value="Send" class="btn">
        </form>
    </section>

    <section>
{{-- <style>
body {
    font-family: Arial, sans-serif;
    padding: 20px;
    background-color: #f4f4f4;
}

.contact-form {
    background: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    max-width: 400px;
    margin: auto;
}

.contact-form h2 {
    margin-top: 0;
}

.input-group {
    display: flex;
    gap: 10px;
    margin-bottom: 10px;
}

input, select, textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    text-transform: uppercase;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background-color: #0056b3;
}

</style>
    <div class="contact-form">
        <h2>Contacter O COIN BBQ</h2>
        <form action="#" method="post">
            <label for="info-request">Demande d'information</label>
            <select id="info-request">
                <option selected>Choisir une option</option>
                <!-- Add options as needed -->
            </select>
            <div class="input-group">
                <input type="text" id="first-name" required placeholder="Votre prénom">
                <input type="text" id="last-name" required placeholder="Votre nom">
            </div>
            <input type="email" id="email" required placeholder="Votre email">
            <input type="text" id="phone" placeholder="Votre téléphone">
            <textarea id="message" required placeholder="Votre message"></textarea>
            <button type="submit">Envoyer via la messagerie</button>
        </form>
    </div> --}}

 </section>
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
