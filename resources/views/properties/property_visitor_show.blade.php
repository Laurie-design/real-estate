<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails du Bien Immobilier</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <style>
        .container {
            width: 80%;
            margin: auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .property-image {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .property-details {
            margin-bottom: 20px;
        }

        .property-details h2 {
            color: #333;
        }

        .buttons {
            display: flex;
            gap: 10px;
            justify-content: flex-start;
        }

        .buttons a, .buttons button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .buttons a:hover, .buttons button:hover {
            background-color: #218838;
        }

        .buttons form {
            display: inline;
        }

        .buttons form button {
            background-color: #dc3545;
        }

        .buttons form button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <!-- Include the header -->
    <header>
        <div class="nav container">
            <a href="#home" class="logo"><i class="bx bx-home-alt-2"></i>Real State</a>
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

    <!-- Property details section -->
    <div id="property-{{ $property->id }}" class="container">
        <img src="{{ asset('storage/' . $property->image_path) }}" alt="{{ $property->title }}" class="property-image">

        <div class="property-details">
            <h2>{{ $property->title }}</h2>
            <p><strong>Description:</strong> {{ $property->description }}</p>
            <p><strong>Prix:</strong> €{{ number_format($property->price, 2) }}</p>
            <p><strong>Adresse:</strong> {{ $property->address }}</p>
            <p><strong>Propriétaire:</strong> {{ $property->owner_name }}</p>
            <p><strong>Téléphone:</strong> {{ $property->owner_phone }}</p>
            <p><strong>Email:</strong> {{ $property->owner_email }}</p>
            <p><strong>Numéro d'étage:</strong> {{ $property->floor_number }}</p>
            <p><strong>Meublé:</strong> {{ $property->furnished ? 'Oui' : 'Non' }}</p>
            <p><strong>Nombre d'étages:</strong> {{ $property->total_floors }}</p>
            <p><strong>Surface:</strong> {{ $property->surface }} m²</p>
            <p><strong>Type:</strong> {{ $property->type }}</p>
            <p><strong>Libellé:</strong> {{ $property->label }}</p>
        </div>

        <div class="buttons">
            <a href="{{ route('property.edit', $property->id) }}">Modifier</a>
            <form action="{{ route('property.destroy', $property->id) }}" method="POST" onsubmit="return confirmDelete(event, {{ $property->id }});">
                @csrf
                @method('DELETE')
                <button type="submit">Supprimer</button>
            </form>
        </div>
    </div>

    <!-- Include the footer -->
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

    <script>
        function confirmDelete(event, propertyId) {
            event.preventDefault();

            if (confirm('Êtes-vous sûr de vouloir supprimer ce bien?')) {
                fetch(`/property/delete/${propertyId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                        window.location.href = "{{ route('properties.list') }}";
                    } else {
                        alert('Une erreur est survenue lors de la suppression du bien.');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Une erreur est survenue lors de la suppression du bien.');
                });
            }
        }
    </script>
</body>
</html>
