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
                    <label for="district">Quartier</label>
                    <select name="district" id="district" class="form-control">
                      <option value=""></option>
                      @foreach ($districts as $dist)
                        <option value="{{ $dist }}">{{ $dist }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tel_client">Num. de téléphone</label>
                    <input type="text" id="tel_client" name="tel" class="form-control">
                    <p class="text-danger">
                        @error('tel')
                            {{ $message }}
                        @enderror
                    </p>
                </div>
                <div class="form-group">
                    <label for="">Type de bien</label>
                    <select name="categorie_id" id="" class="form-control">
                        <option value=""></option>
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}"
                                {{ isset($input['categorie_id']) && $input['categorie_id'] == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Prix min</label>
                    <input type="number" name="price_min" min="0" class="form-control" placeholder=""
                        value={{ isset($input['price_min']) && $input['price_min'] ? $input['price_min'] : '' }}>
                </div>
                <div class="form-group">
                    <label for="">Prix max</label>
                    <input type="number" name="price_max" min="0" class="form-control" placeholder=""
                        value={{ isset($input['price_max']) && $input['price_max'] ? $input['price_max'] : '' }}>
                </div>
                <div class="form-group">
                    <label for="">Surface min</label>
                    <input type="number" name="surface_min" min="0" class="form-control" placeholder=""
                        value={{ isset($input['surface_min']) && $input['surface_min'] ? $input['surface_min'] : '' }}>
                </div>
                <div class="form-group">
                    <label for="">Surface max</label>
                    <input type="number" name="surface_max" min="0" class="form-control" placeholder=""
                        value={{ isset($input['surface_max']) && $input['surface_max'] ? $input['surface_max'] : '' }}>
                </div>
                <div class="form-group">
                    <label for="">Décrivez votre besoin</label>
                    <textarea name="search" id="" cols="30" rows="5" class="form-control">{{ isset($input['search']) ? $input['search'] : '' }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary my-2 ml-auto">Envoyer la requete</button>
        </form>
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

    <script src="{{ URL::asset('assets/js/carousel.js') }}"></script>

</body>

</html>
