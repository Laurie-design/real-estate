<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD DES BIENS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>

  <body>

    <div class="container text-center">
      <div class="row">
        <div class="col s12">
          <h1>Hello, world</h1>
          <hr>
          <a href="/ajouter" class="btn btn-primary">Ajouter un bien</a>
          <hr>

          @if (session('status'))
              <div class="alert alert-success">
                  {{session('status')}}
              </div>
          @endif

          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Address</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Nbr_chambre</th>
                <th>Nbr_etage</th>
                <th>Num_etage</th>
                <th>Meuble</th>
                <th>Superficie</th>
                <th>Description</th>
                <th>Libelle</th>
                <th>Image</th>
                <th>Is public</th>
                <th>Is active</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              @php
              $ide = 1;
              @endphp
              @foreach($biens as $bien)
                <tr>
                  <td>{{$ide}}</td>
                  <td> {{$bien->address}} </td>
                  <td> {{$bien->type}} </td>
                  <td> {{$bien->prix}} </td>
                  <td> {{$bien->nbr_chambre}} </td>
                  <td> {{$bien->nbr_etage}} </td>
                  <td> {{$bien->num_etage}} </td>
                  <td> {{$bien->meuble}} </td>
                  <td> {{$bien->superficie}} </td>
                  <td> {{$bien->description}} </td>
                  <td> {{$bien->libelle}} </td>
                  <td> {{$bien->image}} </td>
                  <td> {{$bien->is_public}} </td>
                  <td> {{$bien->is_active}} </td>
                  <td>
                    <a href="/update/ {{$bien->id}}" class="btn btn-info">Mettre à jour</a>
                    <a href="/delete/ {{$bien->id}}" class="btn btn-danger">Supprimer</a>
                  </td>
                </tr>
              @php
              $ide += 1;
              @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
