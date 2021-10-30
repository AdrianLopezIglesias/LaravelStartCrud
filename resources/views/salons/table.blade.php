<div class="table-responsive">
    <table class="table" id="salons-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Turnos registrados</th>
                <th ></th>
            </tr>
        </thead>
        <tbody>
        @foreach($salons as $salon)
            <tr>
                <td>{{ $salon->nombre }}</td>
								<td></td>
								<td></td>
								<td >
									<a class="btn btn-outline-secondary" 
									href="{{ route('salons.show', [$salon->id]) }}">
									Ver</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
