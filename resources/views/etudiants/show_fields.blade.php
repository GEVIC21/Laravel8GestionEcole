<!-- Nom Field -->
<div class="col-sm-12">
    {!! Form::label('nom', 'Nom:') !!}
    <p>{{ $etudiant->nom }}</p>
</div>

<!-- Prenom Field -->
<div class="col-sm-12">
    {!! Form::label('prenom', 'Prenom:') !!}
    <p>{{ $etudiant->prenom }}</p>
</div>

<!-- Age Field -->
<div class="col-sm-12">
    {!! Form::label('age', 'Age:') !!}
    <p>{{ $etudiant->age }}</p>
</div>

<!-- Nationalite Field -->
<div class="col-sm-12">
    {!! Form::label('nationalite', 'Nationalite:') !!}
    <p>{{ $etudiant->nationalite }}</p>
</div>

<!-- Id Filiere Field -->
<div class="col-sm-12">
    {!! Form::label('id_filiere', 'Id Filiere:') !!}
    <p>{{ $etudiant->id_filiere }}</p>
</div>

