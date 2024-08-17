<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Propriétés</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Styles spécifiques pour la liste des propriétés */
        .properties-container {
            max-width: 1200px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .property-item {
            background-color: #f9f9f9;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .property-item img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .property-info {
            padding: 15px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .property-info h2 {
            margin: 0;
            font-size: 18px;
            margin-bottom: 10px;
        }

        .property-info .address {
            margin-top: auto;
            font-size: 14px;
            color: #555;
        }

        .property-info .price {
            font-size: 16px;
            font-weight: bold;
            color: #000;
            text-align: right;
            margin-top: 10px;
        }

        .property-info .details-button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
            width: 100%;
        }

        .property-info .details-button:hover {
            background-color: #0056b3;
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
                <li><a href="{{ route('property.create') }}">Ajouter un bien</a></li>
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
                    <img src="{{ asset('storage/' . $property->image_path) }}" alt="Image du Bien">
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

</body>
</html>
