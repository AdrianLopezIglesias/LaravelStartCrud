<div class="table-responsive">
    <table class="table" id="mice-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mice as $mouse)
            <tr>
                <td>{{ $mouse->nombre }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['mice.destroy', $mouse->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('mice.show', [$mouse->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('mice.edit', [$mouse->id]) }}" class='btn btn-default btn-xs'>
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
