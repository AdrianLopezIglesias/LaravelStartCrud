<div class="table-responsive">
  <table class="table" id="tratamientos-table">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Descripcion Corta</th>
        <th>Area</th>
        <th>Sesiones</th>
        <th>Valor</th>
        <th>Activo</th>
        <th>Profesional</th>
        <th>Equipamiento</th>
        <th>Imagen Principal</th>
        <th colspan="3">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($tratamientos as $tratamiento)
      <tr>
        <td>{{ $tratamiento->nombre }}</td>
        <td>{{\Illuminate\Support\Str::limit($tratamiento->descripcion, 100, '...') }}</td>
        <td>{{\Illuminate\Support\Str::limit($tratamiento->descripcion_corta, 100, '...') }}</td>
        <td>{{ $tratamiento->area }}</td>
        <td>{{ $tratamiento->sesiones }}</td>
        <td>{{ $tratamiento->valor }}</td>
        <td>{{ $tratamiento->activo }}</td>
        <td>{{ $tratamiento->profesional }}</td>
        <td>{{ $tratamiento->equipamiento }}</td>
        <td>{{ $tratamiento->imagen_principal }}</td>
        <td width="120">
          {!! Form::open(['route' => ['tratamientos.destroy', $tratamiento->id], 'method' => 'delete']) !!}
          <div class='btn-group'>
            <a href="{{ route('tratamientos.show', [$tratamiento->id]) }}" class='btn btn-default btn-xs'>
              <i class="far fa-eye"></i>
            </a>
            <a href="{{ route('tratamientos.edit', [$tratamiento->id]) }}" class='btn btn-default btn-xs'>
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