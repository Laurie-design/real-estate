@extends('layouts.agent.base')

@section('content')

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Modifier Catégorie</h3>
        <h6 class="op-7 mb-2">Modifier la catégorie {{ $categorie->name }}</h6>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> --}}
        {{-- <a href="#" class="btn btn-primary btn-round">Ajouter un bien</a> --}}
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <form id="propertyForm" action="{{ route('agent.categorie.update', ['id' => $categorie->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Nom </label>
                <input class="form-control" type="text" id="name" name="name" value="{{ $categorie->name }}" placeholder="Nom de la Catégorie" required>
                @error('name')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" class="form-control no-resize" name="description" rows="4" placeholder="Description du bien" required>{{ $categorie->description }}</textarea>
                @error('description')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <button class="btn btn-success">Modifier</button>
                {{-- <button type="reset" class="btn btn-danger">Annuler</button> --}}
            </div>
        </form>
    </div>
</div>

@endsection
