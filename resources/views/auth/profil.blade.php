@extends('layouts.agent.base')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Profil</h3>
            <h6 class="op-7 mb-2">Bonjour {{ Auth::user()->name }}</h6>
        </div>
    </div>
    @if ($user->district1.$user->district2.$user->district3 == "")
        <p class="text-warning">Veuillez renseigner vos quartiers</p>
    @endif
    <div class="row col-md-12">
        <form action="{{ route('agent.profil.update') }}" class="col-lg-8">
            @csrf
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                @error('name')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                @error('name')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="district1">Quartier 1</label>
                <input type="district1" class="form-control" id="district1" name="district1" value="{{ $user->district1 }}" placeholder="Quartier">
                @error('district1')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="district2">Quartier 2</label>
                <input type="district2" class="form-control" id="district2" name="district2" value="{{ $user->district2 }}" placeholder="Quartier">
                @error('district2')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="district3">Quartier 3</label>
                <input type="district3" class="form-control" id="district3" name="district3" value="{{ $user->district3 }}" placeholder="Quartier">
                @error('district3')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button class="btn btn-success">Mettre à jour le profil</button>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    
@endsection