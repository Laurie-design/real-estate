@extends('layouts.agent.base')

@section('content')

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Ajouter un Bien</h3>
        {{-- <h6 class="op-7 mb-2">Liste des biens enregistrés</h6> --}}
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> --}}
        {{-- <a href="#" class="btn btn-primary btn-round">Ajouter un bien</a> --}}
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <form id="propertyForm" action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Titre:</label>
                <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Titre du bien" required>
                @error('title')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" class="form-control no-resize" name="description" rows="4" placeholder="Description du bien" required>{{ old('description') }}</textarea>
                @error('description')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Prix (FCFA):</label>
                <input class="form-control" type="number" id="price" name="price" value="{{ old('price') }}" placeholder="Prix" required>
                @error('price')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="address">Adresse:</label>
                <input class="form-control" type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Adresse du bien" required>
                @error('address')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="owner_id">Propriétaire</label>
                <select name="owner_id" id="owner_id" class="form-control" required>
                    <option value="">--</option>
                    @foreach ($owners as $owner)
                        <option value="{{ $owner->id }}" @if(old('owner_id')==$owner->id) selected @endif>{{ $owner->name }}</option>
                    @endforeach
                </select>
                @error('owner_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            {{-- <div class="form-group">
                <label for="floor_number">Numéro d'étage:</label>
                <input class="form-control" type="number" id="floor_number" name="floor_number" value="{{ old('floor_number') }}" placeholder="Numéro d'étage" required>
                @error('floor_number')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="form-group">
                <label for="furnished">Meublé:</label>
                <select class="form-select" id="furnished" name="furnished" required>
                    <option value="1" {{ old('furnished') == '1' ? 'selected' : '' }}>Oui</option>
                    <option value="0" {{ old('furnished') == '0' ? 'selected' : '' }}>Non</option>
                </select>
                @error('furnished')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="is_public">Public</label>
                <input type="checkbox" name="is_public" id="is_public" {{ old('is_public') == '1' ? 'checked' : '' }}>
                @error('furnished')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="total_floors">Nombre d'étages:</label>
                <input class="form-control" type="number" id="total_floors" name="total_floors" value="{{ old('total_floors') }}" placeholder="Nombre d'étages" required>
                @error('total_floors')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="surface">Surface (m²):</label>
                <input class="form-control" type="number" id="surface" name="surface" value="{{ old('surface') }}" placeholder="Surface en m²" required>
                @error('surface')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="categorie_id">Type</label>
                <select name="categorie_id" id="categorie_id" class="form-control" required>
                    <option value="">--</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id }}" @if(old('categorie_id')==$categorie->id) selected @endif>{{ $categorie->name }}</option>
                    @endforeach
                </select>
                @error('categorie_id')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="image">Image du bien:</label>
                <input class="form-control" type="file" id="image" name="image" accept="image/*" required>
                @error('image')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image1">Image supplémentaire du bien</label>
                <input class="form-control" type="file" id="image1" name="image1" accept="image/*">
                @error('image1')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image2">Image supplémentaire du bien</label>
                <input class="form-control" type="file" id="image2" name="image2" accept="image/*">
                @error('image2')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-success">Ajouter bien</button>
                <button type="reset" class="btn btn-danger">Annuler</button>
            </div>
        </form>
    </div>
</div>
    
@endsection