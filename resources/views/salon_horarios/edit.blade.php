

        <div class="card">
					{!! Form::model($salonHorario, ['route' => ['salonHorarios.update', $salonHorario->id], 'method' => 'patch']) !!}
					
					<div class="card-body">
							<p>{{$salonHorario->dia_semana_show}}</p>
                <div class="row">
                    @include('salon_horarios.fields')
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="#" data-dismiss="modal" class="btn btn-default">Cancel</a>
            </div>

           {!! Form::close() !!}

