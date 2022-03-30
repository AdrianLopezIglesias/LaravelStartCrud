<div class="table-responsive">
    <table class="table" id="pensamientos-table">
        <thead>
            <tr>
                <th>Texto</th>
        <th>Metadata</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pensamientos as $pensamiento)
            <tr>
                <td>{{ $pensamiento->texto }}</td>
            <td>{{ $pensamiento->metadata }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['pensamientos.destroy', $pensamiento->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('pensamientos.show', [$pensamiento->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('pensamientos.edit', [$pensamiento->id]) }}" class='btn btn-default btn-xs'>
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
