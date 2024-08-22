<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Propriétés</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/properties_client_list.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/carousel.css') }}">
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
            </ul>
        </div>
    </header>

    <section class="properties-container">
        {{-- <h1>Liste des Propriétés</h1> --}}
        @if ($properties->isEmpty())
            <p>Aucune propriété disponible.</p>
        @else
            @foreach ($properties as $property)
                <div class="property-item">
                    <div id="{{ $property->id."carousel" }}" class="lite-carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <img class=" active" src="{{ asset('storage/' . $property->image_path) }}" alt="First slide">
                            @if ($property->image1_path)
                                <img class="" src="{{ asset('storage/' . $property->image1_path) }}" alt="Second slide">
                            @endif
                            @if ($property->image2_path)
                                <img class="" src="{{ asset('storage/' . $property->image2_path) }}" alt="Third slide">  
                            @endif
                        </div>
                    </div>
                    {{-- <img src="{{ asset('storage/' . $property->image_path) }}" alt="Image du Bien"> --}}
                    <div class="property-info">
                        <h2><a href="{{ route('property.show', $property->id) }}">{{ $property->title }}</a></h2>
                        <p class="address">{{ $property->address }}</p>
                        <p class="price">€{{ number_format($property->price, 2) }}</p>
                    </div>
                </div>
            @endforeach
        @endif
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

    <script src="{{ URL::asset('assets/js/carousel.js') }}"></script>
    <script src="{{ URL::asset('assets/js/') }}"></script>

</body>
</html>
