<div>
	<h4>Profesionales</h4>
	@foreach ($profesionales as $profesional )
	<div class="form-check">
    <input type="checkbox" class="form-check-input" name="profesional[]" value="{{$profesional->id}}" id="profesional_{{$profesional->id}}" checked>
    <label class="form-check-label" for="profesional_{{$profesional->id}}" >{{$profesional->nombre}}</label>
  </div>
	@endforeach
</div>