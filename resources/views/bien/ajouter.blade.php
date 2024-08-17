<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>


    <div class="container text-start">
      <div class="row">
        <div class="col s12">
        <h1>Ajouter un bien</h1>
        <hr>

        @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif

        <ul>
           @foreach ($errors->all() as $error)
             <li class="alert alert-danger">{{ $error }}</li>
           @endforeach
        </ul>

        <form action="/ajouter/traitement" method="POST">
            @csrf
            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>

            <div class="mb-3">
              <label for="type" class="form-label">Type</label>
              <input type="text" class="form-control" id="type" name="type" value="{{ old('type') }}">
            </div>

            <div class="mb-3">
              <label for="prix" class="form-label">Prix</label>
              <input type="text" class="form-control" id="prix" name="prix" value="{{ old('prix') }}">
            </div>

            <div class="mb-3">
                <label for="nbr_chambre" class="form-label">Nbr_chambre</label>
                <input type="number" class="form-control" id="nbr_chambre" name="nbr_chambre" value="{{ old('nbr_chambre') }}">
              </div>

              <div class="mb-3">
                <label for="nbr_etage" class="form-label">Nbr_etage</label>
                <input type="number" class="form-control" id="nbr_etage" name="nbr_etage" value="{{ old('nbr_etage') }}">
              </div>

              <div class="mb-3">
                <label for="num_etage" class="form-label">Num_etage</label>
                <input type="number" class="form-control" id="num_etage" name="num_etage" value="{{ old('num_etage') }}">
              </div>

              <div class="mb-3">
                <label for="meuble" class="form-label">Meuble</label>
                <input type="text" class="form-control" id="meuble" name="meuble" value="{{ old('meuble') }}">
              </div>

              <div class="mb-3">
                <label for="superficie" class="form-label">Superficie</label>
                <input type="number" class="form-control" id="superficie" name="superficie" value="{{ old('superficie') }}">
              </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
              </div>

              <div class="mb-3">
                <label for="libelle" class="form-label">Libelle</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="{{ old('libelle') }}">
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" accept="image/*"  name="image" >
              </div>

              <div class="mb-3">
                <label for="is_public" class="form-label">Is public</label>
                <input type="checkbox" class="form-check-input" id="is_public" name="is_public" value="1">
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Is active</label>
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1">
            </div>

            <button type="submit" class="btn btn-primary">Ajouter un bien</button>
            <br> <br>
            <a href="/bien" class="btn btn-danger">Liste des biens</a>
        </form>

        </div>

      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
