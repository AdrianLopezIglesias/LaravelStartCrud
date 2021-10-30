@if(isset($paciente))
<a class="dropdown-item btn btn-default" 
data-toggle="modal" 
id="modal-open-button" 
data-target="#mediumModal"
data-attr="/contratacions/render" 
data-opt='{"paciente": {{$paciente}}, "view": "nueva"}'>
Nueva contratación
</a>
@endif
@include('pacientes.table')