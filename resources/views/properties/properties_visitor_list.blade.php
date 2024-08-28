<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des Propriétés</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
                <li><a href="{{ route('agent.dashboard') }}">Vous êtes agent?</a></li>

            </ul>
        </div>
    </header>

    <section id="search-form" class="">
        <form action="" method="GET">
            <div class="form-row">
              <div class="col-6">
                <label for="">Que recherchez vous?</label>
                <input type="text" class="form-control" name="search" placeholder="" value="{{ isset($input['search']) ? $input['search'] :'' }}">
              </div>
              <div class="col-6">
                <label for="">Type de bien</label>
                <select name="type" id="" class="form-control">
                    <option value=""></option>
                    <option value="maison" {{ (isset($input['type']) && $input['type']=='maison') ? 'selected' : '' }}>Maison</option>
                    <option value="appartement" {{ isset($input['type']) && $input['type']=='appartement' ? 'selected' : '' }}>Appartement</option>
                    <option value="studio" {{ isset($input['type']) && $input['type']=='studio' ? 'selected' : '' }}>Studio</option>
                    <option value="villa" {{ isset($input['type']) && $input['type']=='villa' ? 'selected' : '' }}>Villa</option>
                </select>
              </div>
              <div class="col">
                <label for="">Prix min</label>
                <input type="number" name="price_min" min="0" class="form-control" placeholder="" value={{ isset($input['price_min']) && $input['price_min'] ? $input['price_min'] : '' }}>
              </div>
              <div class="col">
                <label for="">Prix max</label>
                <input type="number" name="price_max" min="0" class="form-control" placeholder="" value={{ isset($input['price_max']) && $input['price_max'] ? $input['price_max'] : '' }}>
              </div>
              <div class="col">
                <label for="">Surface min</label>
                <input type="number" name="surface_min" min="0" class="form-control" placeholder="" value={{ isset($input['surface_min']) && $input['surface_min'] ? $input['surface_min'] : '' }}>
              </div>
              <div class="col">
                <label for="">Surface max</label>
                <input type="number" name="surface_max" min="0" class="form-control" placeholder="" value={{ isset($input['surface_max']) && $input['surface_max'] ? $input['surface_max'] : '' }}>
              </div>
            </div>
            <a href="{{ route('properties.list') }}" class="btn btn-danger my-2 ml-auto">Effacer la recherche</a>
            <button type="submit" class="btn btn-primary my-2 ml-auto">Rechercher</button>
          </form>
    </section>

    <section class="properties-container">
        {{-- <h1>Liste des Propriétés</h1> --}}
        @if ($properties->isEmpty())
            <p>
                Aucune propriété disponible. <br>
                <a href="{{ route('requete.create', [
                    'search'=>isset($input['search']) ? $input['search'] :'',
                    'type'=>isset($input['type']) ? $input['type'] :'',
                    'price_min'=>isset($input['price_min']) ? $input['price_min'] :'',
                    'price_max'=>isset($input['price_max']) ? $input['price_max'] :'',
                    'surface_min'=>isset($input['surface_min']) ? $input['surface_min'] :'',
                    'surface_max'=>isset($input['surface_max']) ? $input['surface_max'] :'',
                ]) }}">
                    Envoyer une requête
                </a>
            </p>
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
                        <p class="info-p description">{{ $property->description }}</p>
                        <p class="info-p address"> {{ $property->address }}</p>
                        <p class="info-p surface">Surface : {{ $property->surface }} m²</p>
                        <div class="action-group">
                            <a href="{{ route('property.show', ['id'=>$property->id]) }}" class="btn btn-primary">Voir</a>
                            <p class="info-p price">{{ number_format($property->price, 2) }} Fcfa</p>
                        </div>
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

</body>
</html>
