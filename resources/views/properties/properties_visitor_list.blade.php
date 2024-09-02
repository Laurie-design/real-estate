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

    <section id="search-form" class="">
        <form action="" method="GET">
            <div class="form-row">
              {{-- <div class="col-6">
                <label for="">Que recherchez vous?</label>
                <input type="text" class="form-control" name="search" placeholder="" value="{{ isset($input['search']) ? $input['search'] :'' }}">
              </div> --}}
              <div class="col-12 col-md-3">
                <label for="">Type de bien</label>
                <select name="categorie_id" id="" class="form-control">
                    <option value=""></option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (isset($input['categorie_id']) && $input['categorie_id']==$cat->id) ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
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
            <div>
                <p>Aucune propriété disponible.</p>
                <p class="text-center">
                    <a href="{{ route('requete.create', [
                        'search'=>isset($input['search']) ? $input['search'] :'',
                        'categorie_id'=>isset($input['categorie_id']) ? $input['categorie_id'] :'',
                        'price_min'=>isset($input['price_min']) ? $input['price_min'] :'',
                        'price_max'=>isset($input['price_max']) ? $input['price_max'] :'',
                        'surface_min'=>isset($input['surface_min']) ? $input['surface_min'] :'',
                        'surface_max'=>isset($input['surface_max']) ? $input['surface_max'] :'',
                    ]) }}" class="btn btn-success text-success-emphasis">
                        Envoyer une requête
                    </a>
                </p>
            </div>
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
                        <p class="info-p surface"> {{ $property->surface }} m²</p>
                        <div class="action-group">
                            <a href="{{ route('property.show', ['id'=>$property->id]) }}" class="btn btn-primary">Voir</a>
                            <p class="info-p price">{{ number_format($property->price, 2) }} Fcfa</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        {{-- <section class="footer">
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
        </div> --}}

    <script src="{{ URL::asset('assets/js/carousel.js') }}"></script>

</body>
</html>
