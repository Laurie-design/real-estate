@extends('layouts.agent.base')

@section('content')

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Modifier le bien {{ $property->title }}</h3>
        {{-- <h6 class="op-7 mb-2">Liste des biens enregistrés</h6> --}}
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> --}}
        {{-- <a href="#" class="btn btn-primary btn-round">Ajouter un bien</a> --}}
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <form id="propertyForm" action="{{ route('property.update', ['id'=>$property->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="title">Titre:</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ $property->title }}" placeholder="Titre du bien" required>
                @error('title')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" class="form-control no-resize" name="description" rows="4" placeholder="Description du bien" required>{{ $property->description }}</textarea>
                @error('description')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Prix (€):</label>
                <input class="form-control" type="number" id="price" name="price" value="{{ $property->price }}" placeholder="Prix" required>
                @error('price')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Adresse:</label>
                <input class="form-control" type="text" id="address" name="address" value="{{ $property->address }}" placeholder="Adresse du bien" required>
                @error('address')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="owner_name">Nom du propriétaire:</label>
                <input class="form-control" type="text" id="owner_name" name="owner_name" value="{{ $property->owner_name }}" placeholder="Nom du propriétaire" required>
                @error('owner_name')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="owner_phone">Téléphone:</label>
                <input class="form-control" type="text" id="owner_phone" name="owner_phone" value="{{ $property->owner_phone }}" placeholder="Téléphone" required>
                @error('owner_phone')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="owner_email">Email:</label>
                <input class="form-control" type="email" id="owner_email" name="owner_email" value="{{ $property->owner_email }}" placeholder="Email" required>
                @error('owner_email')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="floor_number">Numéro d'étage:</label>
                <input class="form-control" type="number" id="floor_number" name="floor_number" value="{{ $property->floor_number }}" placeholder="Numéro d'étage" required>
                @error('floor_number')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="furnished">Meublé:</label>
                <select class="form-select" id="furnished" name="furnished" required>
                    <option value="1" {{ $property->furnished == '1' ? 'selected' : '' }}>Oui</option>
                    <option value="0" {{ $property->furnished == '0' ? 'selected' : '' }}>Non</option>
                </select>
                @error('furnished')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_public">Visibilité:</label>
                <select class="form-select" id="is_public" name="is_public" required>
                    <option value="1" {{ $property->is_public == '1' ? 'selected' : '' }}>Publique</option>
                    <option value="0" {{ $property->is_public == '0' ? 'selected' : '' }}>Privée</option>
                </select>
                @error('furnished')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="total_floors">Nombre d'étages:</label>
                <input class="form-control" type="number" id="total_floors" name="total_floors" value="{{ $property->total_floors }}" placeholder="Nombre d'étages" required>
                @error('total_floors')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="surface">Surface (m²):</label>
                <input class="form-control" type="number" id="surface" name="surface" value="{{ $property->surface }}" placeholder="Surface en m²" required>
                @error('surface')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="label">Libellé:</label>
                <input class="form-control" type="text" id="label" name="label" value="{{ $property->label }}" placeholder="Libellé" required>
                @error('label')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="type">Type de bien:</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="Appartement" {{ $property->type == 'Appartement' ? 'selected' : '' }}>Appartement</option>
                    <option value="Maison" {{ $property->type == 'Maison' ? 'selected' : '' }}>Maison</option>
                    <option value="Villa" {{ $property->type == 'Villa' ? 'selected' : '' }}>Villa</option>
                    <option value="Studio" {{ $property->type == 'Studio' ? 'selected' : '' }}>Studio</option>
                </select>
                @error('type')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image du bien:</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*">
                <small class="text-warning">Laissez ce champ vide si vous ne souhaitez pas changer d'image</small>
                @error('image')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-success">Modifier bien</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
            </div>
        </form>
    </div>
</div>
    
@endsection