<div class="table-responsive">
    <table class="table" id="etudiants-table">
        <thead>
        <tr>
            <th>Nom</th>
        <th>Prenom</th>
        <th>Age</th>
        <th>Nationalite</th>
        <th>Id Filiere</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->nom }}</td>
            <td>{{ $etudiant->prenom }}</td>
            <td>{{ $etudiant->age }}</td>
            <td>{{ $etudiant->nationalite }}</td>
            <td>{{ $etudiant->id_filiere }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['etudiants.destroy', $etudiant->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('etudiants.show', [$etudiant->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('etudiants.edit', [$etudiant->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
