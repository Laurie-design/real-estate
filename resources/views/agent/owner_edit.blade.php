@extends('layouts.agent.base')

@section('content')

<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
    <div>
        <h3 class="fw-bold mb-3">Modifier propriétaire</h3>
        <h6 class="op-7 mb-2">Modifier le propriétaire {{ $owner->name }}</h6>
    </div>
    <div class="ms-md-auto py-2 py-md-0">
        {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> --}}
        {{-- <a href="#" class="btn btn-primary btn-round">Ajouter un bien</a> --}}
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <form id="propertyForm" action="{{ route('agent.owner.update', ['id'=>$owner->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Nom complet</label>
                <input class="form-control" type="text" id="name" name="name" value="{{ $owner->name }}" placeholder="Nom du propriétaire" required>
                @error('name')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="email" name="email" value="{{ $owner->email }}" placeholder="Email du propriétaire" required>
                @error('email')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tel">Téléphone</label>
                <input class="form-control" type="text" id="tel" name="tel" value="{{ $owner->tel }}" placeholder="Téléphone du propriétaire" required>
                @error('tel')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-success">Mettre à jour</button>
            </div>
        </form>
    </div>
</div>

@endsection
