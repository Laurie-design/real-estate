<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Détails du Bien Immobilier</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/properties_client_list.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
    <!-- Include the header -->
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
                <li>
                    <a href="{{ route('agent.dashboard') }}" class="btn btn-primary ru-agent" >
                        Vous êtes agent?
                    </a>
                </li>
             </ul>
        </div>
    </header>

    <!-- Property details section -->
    <div id="property-{{ $property->id }}" class="container property-container">
        <div class="row">
            @if ($property->image_path)
                <div class="col-12 col-sm-4">
                    <img src="{{ asset('storage/' . $property->image_path) }}" alt="{{ $property->title }}" class="property-image">
                </div>
            @endif
            
            @if ($property->image1_path)
                <div class="col-12 col-sm-4">
                    <img src="{{ asset('storage/' . $property->image1_path) }}" alt="{{ $property->title }}" class="property-image">
                </div>
            @endif
            
            @if ($property->image2_path)
                <div class="col-12 col-sm-4">
                    <img src="{{ asset('storage/' . $property->image2_path) }}" alt="{{ $property->title }}" class="property-image">
                </div>
            @endif

        </div>

        <div class="property-details">
            {{-- <h2>{{ $property->title }}</h2> --}}
            <p class="text-bold"><strong>Description:</strong> {{ $property->description }}</p>
            <p class=""><strong>Prix:</strong> {{ number_format($property->price, 2) }} Fcfa</p>
            <p class=""><strong>Adresse:</strong> {{ $property->address }}</p>
            {{-- <p class=""><strong>Numéro d'étage:</strong> {{ $property->floor_number }}</p> --}}
            <p class=""><strong>Meublé:</strong> {{ $property->furnished ? 'Oui' : 'Non' }}</p>
            <p class=""><strong>Nombre d'étages:</strong> {{ $property->total_floors }}</p>
            <p class=""><strong>Surface:</strong> {{ $property->surface }} m²</p>
            <p class=""><strong>Type:</strong> {{ $property->type }}</p>
        </div>

        <br>
        <br>
        
        <p class="invitation-demande">
            Ce bien vous intéresse? Remplissez le formulaire ci dessous et faites une demande.
        </p>

        <form action="{{ route('demande.store', ['id'=>$property->id]) }}" method="post" class="col-12 col-md-6">
            @csrf
            <div class="form-group">
                <label for="tel">Votre numéro de téléphone</label>
                <input type="text" id="tel" name="tel" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-submit">Demander</button>
                <a href="{{ route('properties.list') }}" class="btn btn-secondary" >
                    <i class="fas fa-arrow-left"></i> Revenir à la liste des biens
                </a>
            </div>
        </form>
        
    </div>
    <!-- Bouton Revenir à la liste des biens -->




    <!-- Include the footer -->
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

    {{-- <script>
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
    </script> --}}
</body>
</html>
