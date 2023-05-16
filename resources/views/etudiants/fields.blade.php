<!-- Nom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nom', 'Nom:') !!}
    {!! Form::text('nom', null, ['class' => 'form-control','maxlength' => 25,'maxlength' => 25]) !!}
</div>

<!-- Prenom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prenom', 'Prenom:') !!}
    {!! Form::text('prenom', null, ['class' => 'form-control','maxlength' => 25,'maxlength' => 25]) !!}
</div>

<!-- Age Field -->
<div class="form-group col-sm-6">
    {!! Form::label('age', 'Age:') !!}
    {!! Form::number('age', null, ['class' => 'form-control']) !!}
</div>

<!-- Nationalite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nationalite', 'Nationalite:') !!}
    {!! Form::text('nationalite', null, ['class' => 'form-control','maxlength' => 30,'maxlength' => 30]) !!}
</div>

<!-- Id Filiere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_filiere', 'Id Filiere:') !!}
    {!! Form::number('id_filiere', null, ['class' => 'form-control']) !!}
</div>