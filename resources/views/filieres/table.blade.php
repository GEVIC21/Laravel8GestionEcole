<div class="table-responsive">
    <table class="table" id="filieres-table">
        <thead>
        <tr>
            <th>Libelle</th>
        <th>Id Filiere</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($filieres as $filiere)
            <tr>
                <td>{{ $filiere->libelle }}</td>
            <td>{{ $filiere->id_filiere }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['filieres.destroy', $filiere->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('filieres.show', [$filiere->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('filieres.edit', [$filiere->id]) }}"
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
