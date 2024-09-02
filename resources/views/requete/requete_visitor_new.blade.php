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
    {{-- <link rel="stylesheet" href="{{ asset('css/properties_client_list.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/carousel.css') }}"> --}}
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
                <li><a href="{{ route('agent.dashboard') }}" class="btn btn-primary ru-agent">Vous êtes agent?</a></li>

            </ul>
        </div>
    </header>

    
    <section id="search-form" class="container">
        <h2 class="pt-5 pb-3 mx-4">Envoyer une requête</h2>
        <form action="{{ route('requete.store') }}" method="GET" class="col-12 col-md-6 mx-2">
            <div class="form">
                <div class="form-group">
                    <label for="tel_client">Num. de téléphone</label>
                    <input type="text" id="tel_client" name="tel" class="form-control">
                    <p class="text-danger">@error('tel'){{ $message }}@enderror</p>
                </div>
              <div class="form-group">
                <label for="">Type de bien</label>
                <select name="type" id="" class="form-control">
                    <option value=""></option>
                    <option value="maison" {{ (isset($input['type']) && $input['type']=='maison') ? 'selected' : '' }}>Maison</option>
                    <option value="appartement" {{ isset($input['type']) && $input['type']=='appartement' ? 'selected' : '' }}>Appartement</option>
                    <option value="studio" {{ isset($input['type']) && $input['type']=='studio' ? 'selected' : '' }}>Studio</option>
                    <option value="villa" {{ isset($input['type']) && $input['type']=='villa' ? 'selected' : '' }}>Villa</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Prix min</label>
                <input type="number" name="price_min" min="0" class="form-control" placeholder="" value={{ isset($input['price_min']) && $input['price_min'] ? $input['price_min'] : '' }}>
              </div>
              <div class="form-group">
                <label for="">Prix max</label>
                <input type="number" name="price_max" min="0" class="form-control" placeholder="" value={{ isset($input['price_max']) && $input['price_max'] ? $input['price_max'] : '' }}>
              </div>
              <div class="form-group">
                <label for="">Surface min</label>
                <input type="number" name="surface_min" min="0" class="form-control" placeholder="" value={{ isset($input['surface_min']) && $input['surface_min'] ? $input['surface_min'] : '' }}>
              </div>
              <div class="form-group">
                <label for="">Surface max</label>
                <input type="number" name="surface_max" min="0" class="form-control" placeholder="" value={{ isset($input['surface_max']) && $input['surface_max'] ? $input['surface_max'] : '' }}>
              </div>
              <div class="form-group">
                <label for="">Décrivez votre besoin</label>
                <textarea name="search" id="" cols="30" rows="5" class="form-control">{{ isset($input['search']) ? $input['search'] :'' }}</textarea>
              </div>
            </div>
            <button type="submit" class="btn btn-primary my-2 ml-auto">Envoyer la requete</button>
          </form>
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
