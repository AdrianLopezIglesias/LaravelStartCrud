<div>
	<nav class="navbar navbar-expand-md navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item ">
						<a class="nav-link" href="#"  x-on:click="view = 'datospersonales'">Datos Personales</a>
					</li>

					<li class="nav-item">
						<a class="nav-link load-div-button" 
						id="load-div-button" data-tgt="#profesional_contenido" data-attr="/profesionalTratamientos/render"
						data-opt='{"profesional": {{$profesional->id}}, "access": "profesional", "view": "table"}'>
						Tratamientos</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"  x-on:click="view = 'horarios'">Horarios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#"  x-on:click="view = 'citas'">Citas</a>
					</li>

				</ul>
			</div>
		</nav>
</div>