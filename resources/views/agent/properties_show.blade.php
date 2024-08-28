@extends('layouts.agent.base')

@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">{{ $property->title }}</h3>
            <h6 class="op-7 mb-2">Détails du produit {{ $property->title }}</h6>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            {{-- <a href="#" class="btn btn-label-info btn-round me-2">Manage</a> --}}
            <a href="{{ route('property.edit', ['id'=>$property->id]) }}" class="btn btn-primary btn-round">Modifier le bien</a>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Images
                                </td>
                                <td>
                                    <img src="{{ asset('storage/' . $property->image_path) }}" alt="{{ $property->title }}" class="property-image medium">
                                    @if ($property->image1_path)
                                        <img src="{{ asset('storage/' . $property->image1_path) }}" alt="{{ $property->title }}" class="property-image medium">   
                                    @endif
                                    @if ($property->image2_path)
                                        <img src="{{ asset('storage/' . $property->image2_path) }}" alt="{{ $property->title }}" class="property-image medium">
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Titre
                                </td>
                                <td>
                                    {{ $property->title }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Description
                                </td>
                                <td>
                                    {{ $property->description }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Prix
                                </td>
                                <td>
                                    {{ $property->price }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Adresse
                                </td>
                                <td>
                                    {{ $property->address }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Propriétaire
                                </td>
                                <td>
                                    {{ $property->owner->name }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Num étage
                                </td>
                                <td>
                                    {{ $property->floor_number }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Nombre d'étages
                                </td>
                                <td>
                                    {{ $property->total_floors }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Appartement meublé
                                </td>
                                <td>
                                    {{ $property->furnished ? "Oui" : "Non" }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Visibilité
                                </td>
                                <td>
                                    {{ $property->is_public ? "Publique" : "Privé" }}
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Surface
                                </td>
                                <td>
                                    {{ $property->surface }}
                                </td>
                            </tr>
                            
                            <tr>
                                <td style="width: 40%; vertical-align: middle">
                                    Type
                                </td>
                                <td>
                                    {{ $property->type }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
