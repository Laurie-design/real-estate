<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Ajouter un Bien Immobilier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        a {
            text-decoration: none;
            color: #333;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        .form-container {
            background: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .form-container h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-group button:hover {
            background-color: #007bff;
        }
        #successMessage {
            display: none;
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.6s ease-in-out;
        }
    </style>
</head>
<body>

    <div id="successMessage"></div>

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

    <section class="admin container">
        <div class="form-container">
            <h1>Ajouter un Bien Immobilier</h1>
            <form id="propertyForm" action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Titre:</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Titre du bien" required>
                    @error('title')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" placeholder="Description du bien" required>{{ old('description') }}</textarea>
                    @error('description')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="price">Prix (€):</label>
                    <input type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Prix" required>
                    @error('price')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Adresse:</label>
                    <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Adresse du bien" required>
                    @error('address')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="owner_name">Nom du propriétaire:</label>
                    <input type="text" id="owner_name" name="owner_name" value="{{ old('owner_name') }}" placeholder="Nom du propriétaire" required>
                    @error('owner_name')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="owner_phone">Téléphone:</label>
                    <input type="text" id="owner_phone" name="owner_phone" value="{{ old('owner_phone') }}" placeholder="Téléphone" required>
                    @error('owner_phone')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="owner_email">Email:</label>
                    <input type="email" id="owner_email" name="owner_email" value="{{ old('owner_email') }}" placeholder="Email" required>
                    @error('owner_email')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="floor_number">Numéro d'étage:</label>
                    <input type="number" id="floor_number" name="floor_number" value="{{ old('floor_number') }}" placeholder="Numéro d'étage" required>
                    @error('floor_number')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="furnished">Meublé:</label>
                    <select id="furnished" name="furnished" required>
                        <option value="1" {{ old('furnished') == '1' ? 'selected' : '' }}>Oui</option>
                        <option value="0" {{ old('furnished') == '0' ? 'selected' : '' }}>Non</option>
                    </select>
                    @error('furnished')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="is_public">Visibilité:</label>
                    <select id="is_public" name="is_public" required>
                        <option value="1" {{ old('is_public') == '1' ? 'selected' : '' }}>Publique</option>
                        <option value="0" {{ old('is_public') == '0' ? 'selected' : '' }}>Privée</option>
                    </select>
                    @error('furnished')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="total_floors">Nombre d'étages:</label>
                    <input type="number" id="total_floors" name="total_floors" value="{{ old('total_floors') }}" placeholder="Nombre d'étages" required>
                    @error('total_floors')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="surface">Surface (m²):</label>
                    <input type="number" id="surface" name="surface" value="{{ old('surface') }}" placeholder="Surface en m²" required>
                    @error('surface')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="label">Libellé:</label>
                    <input type="text" id="label" name="label" value="{{ old('label') }}" placeholder="Libellé" required>
                    @error('label')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="type">Type de bien:</label>
                    <select id="type" name="type" required>
                        <option value="Appartement" {{ old('type') == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                        <option value="Maison" {{ old('type') == 'Maison' ? 'selected' : '' }}>Maison</option>
                        <option value="Villa" {{ old('type') == 'Villa' ? 'selected' : '' }}>Villa</option>
                        <option value="Studio" {{ old('type') == 'Studio' ? 'selected' : '' }}>Studio</option>
                    </select>
                    @error('type')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image du bien:</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                    @error('image')
                        <div style="color: red;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit">Ajouter le Bien</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.getElementById('propertyForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displaySuccessMessage(data.message);
                    this.reset();
                } else {
                    alert('Une erreur est survenue lors de l\'ajout du bien.');
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Une erreur est survenue lors de l\'ajout du bien.');
            });
        });

        function displaySuccessMessage(message) {
            const successMessageDiv = document.getElementById('successMessage');
            successMessageDiv.innerText = message;
            successMessageDiv.style.display = 'block';

            setTimeout(() => {
                successMessageDiv.style.opacity = '1';
                setTimeout(() => {
                    successMessageDiv.style.opacity = '0';
                    setTimeout(() => {
                        successMessageDiv.style.display = 'none';
                    }, 600);
                }, 3000);
            }, 10);
        }
    </script>

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
