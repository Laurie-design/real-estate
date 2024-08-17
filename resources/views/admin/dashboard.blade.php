@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Bienvenue, {{ Auth::user()->name }} !</p>

    </div>
@endsection

@if(Auth::user()->role == 'admin')
    <p>Contenu pour les administrateurs uniquement.</p>
@endif
