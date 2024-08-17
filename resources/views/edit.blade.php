<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Bien Immobilier</title>
    <style>
        .container {
            width: 80%;
            margin: auto;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input, .form-group textarea, .form-group select {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-group input[type="file"] {
            border: none;
        }

        .form-group button {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Modifier {{ $property->title }}</h1>
        <form action="{{ url('property/update', $property->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" id="title" name="title" value="{{ old('title', $property->title) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4" required>{{ old('description', $property->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Prix</label>
                <input type="number" id="price" name="price" value="{{ old('price', $property->price) }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="address">Adresse</label>
                <input type="text" id="address" name="address" value="{{ old('address', $property->address) }}" required>
            </div>

            <div class="form-group">
                <label for="owner_name">Nom du propriétaire</label>
                <input type="text" id="owner_name" name="owner_name" value="{{ old('owner_name', $property->owner_name) }}" required>
            </div>

            <div class="form-group">
                <label for="owner_phone">Téléphone</label>
                <input type="text" id="owner_phone" name="owner_phone" value="{{ old('owner_phone', $property->owner_phone) }}" required>
            </div>

            <div class="form-group">
                <label for="owner_email">Email</label>
                <input type="email" id="owner_email" name="owner_email" value="{{ old('owner_email', $property->owner_email) }}" required>
            </div>

            <div class="form-group">
                <label for="floor_number">Numéro d'étage</label>
                <input type="number" id="floor_number" name="floor_number" value="{{ old('floor_number', $property->floor_number) }}" required>
            </div>

            <div class="form-group">
                <label for="furnished">Meublé</label>
                <select id="furnished" name="furnished" required>
                    <option value="1" {{ old('furnished', $property->furnished) == 1 ? 'selected' : '' }}>Oui</option>
                    <option value="0" {{ old('furnished', $property->furnished) == 0 ? 'selected' : '' }}>Non</option>
                </select>
            </div>

            <div class="form-group">
                <label for="total_floors">Nombre d'étages</label>
                <input type="number" id="total_floors" name="total_floors" value="{{ old('total_floors', $property->total_floors) }}" required>
            </div>

            <div class="form-group">
                <label for="surface">Surface (m²)</label>
                <input type="number" id="surface" name="surface" value="{{ old('surface', $property->surface) }}" required>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <select id="type" name="type" required>
                    <option value="Appartement" {{ old('type', $property->type) == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                    <option value="Maison" {{ old('type', $property->type) == 'Maison' ? 'selected' : '' }}>Maison</option>
                    <option value="Villa" {{ old('type', $property->type) == 'Villa' ? 'selected' : '' }}>Villa</option>
                </select>
            </div>

            <div class="form-group">
                <label for="label">Libellé</label>
                <input type="text" id="label" name="label" value="{{ old('label', $property->label) }}" required>
            </div>

            <div class="form-group">
                <label for="image">Image (laisser vide pour conserver l'image actuelle)</label>
                <input type="file" id="image" name="image">
            </div>

            <div class="form-group">
                <button type="submit">Enregistrer les modifications</button>
            </div>
        </form>
    </div>

</body>
</html>
