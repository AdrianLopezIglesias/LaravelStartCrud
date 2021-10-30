<div>
	<nav class="navbar navbar-expand-md navbar-light bg-light">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
			aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">

				<li class="nav-item">
					<a class="nav-link load-div-button" id="load-div-button" data-tgt="#paciente_contenido"
						data-attr="/paciente/render"
						data-opt='{"paciente": {{$paciente->id}}, "access": "paciente", "view": "datospersonales_index"}'>
						Datos personales
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link load-div-button" id="load-div-button" data-tgt="#paciente_contenido"
						data-attr="/paciente/render"
						data-opt='{"paciente": {{$paciente->id}}, "access": "paciente", "view": "contrataciones_index"}'>
						Contrataciones
					</a>
				</li>
				{{-- <li class="nav-item">
					<a class="nav-link load-div-button" id="load-div-button" data-tgt="#paciente_contenido"
						data-attr="/paciente/render"
						data-opt='{"paciente": {{$paciente->id}}, "access": "paciente", "view": "tratamientos_index"}'>
						Tratamientos
					</a>
				</li> --}}
				<li class="nav-item">
					<a class="nav-link load-div-button" id="load-div-button" data-tgt="#paciente_contenido"
						data-attr="/paciente/render"
						data-opt='{"paciente": {{$paciente->id}}, "access": "paciente", "view": "horarios_index"}'>
						Horarios
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link load-div-button" id="load-div-button" data-tgt="#paciente_contenido"
					data-attr="/paciente/render"
					data-opt='{"paciente": {{$paciente->id}}, "access": "paciente", "view": "profesionales_index"}'>
					Profesionales
				</a>
				</li>
				<li class="nav-item">
					<a class="nav-link load-div-button" id="load-div-button" data-tgt="#paciente_contenido"
					data-attr="/paciente/render"
					data-opt='{"paciente": {{$paciente->id}}, "access": "paciente", "view": "citas_index"}'>
					Citas
				</a>
				</li>

			</ul>
		</div>
	</nav>
</div>