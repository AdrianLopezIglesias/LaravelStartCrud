<div>
    <nav class="navbar navbar-expand-md navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link"   x-on:click="open = ! open" href="#">Datos personales <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"  x-on:click="view = 'contrataciones'">Contrataciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" x-on:click="view = 'citas'" >Citas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Mensajes</a>
            </li>
          </ul>
        </div>
      </nav>
</div>