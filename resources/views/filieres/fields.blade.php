<!-- Libelle Field -->
<div class="form-group col-sm-6">
    {!! Form::label('libelle', 'Libelle:') !!}
    {!! Form::text('libelle', null, ['class' => 'form-control','maxlength' => 25,'maxlength' => 25]) !!}
</div>

<!-- Id Filiere Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_filiere', 'Id Filiere:') !!}
    {!! Form::number('id_filiere', null, ['class' => 'form-control']) !!}
</div>