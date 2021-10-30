<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTratamientoRequest;
use App\Http\Requests\UpdateTratamientoRequest;
use App\Repositories\TratamientoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Tratamiento;
use Illuminate\Support\Str; 
class TratamientoController extends AppBaseController
{
//===========================================================================
//===============================    VER     ================================
//===========================================================================
	public function ver(Request $request, $vista = ""){
		$input = [];
		parse_str($request->form, $input);

		//=============================== RETURN 
		switch ($vista) {
			case 'paciente_show': 
				return redirect(route('pacientes.show', [$paciente->id]));
				// return view('pacientes.table', compact('paciente'));
				break;
			case 'datos_personales_tabla': 
				$pacienteDatosPersonales = $paciente->datospersonales;
				return view('paciente_datos_personales.show_fields', compact('pacienteDatosPersonales', 'paciente'));
				break;
			case 'crear': 
				return view('tratamientos.create');
				break;
			case 'paciente_table': 
				return view('pacientes.table', compact('paciente'));
				break;
			
			default: 
				return view('pacientes.table', compact('paciente'));
				break;
		}
		if($request->redirect == "si"){
		}

	}




//===========================================================================
//=============================== TRANSMUTAR ================================
//===========================================================================
	public function transmutar(Request $request, $id = 0, $view = "table"){

		$input = [];
		parse_str($request->form, $input);

		if($id != 0 || $request->paciente_id != 0){
			//============================= EDITAR TRATAMIENTO
			$paciente                = Pacientes::find($input['paciente']);
			$pacienteDatosPersonales = $paciente->datospersonales;
			$paciente->fill($input)->save();
			$pacienteDatosPersonales->fill($input)->save();
		}else{
			//============================= NUEVO TRATAMIENTO
			$tratamiento = Tratamiento::create($input);
		}

		//=============================== RETURN 
		switch ($view) {
			case 'tabla': 
				$tratamientos = Tratamiento::orderByDesc('id')->paginate(10); 
				$access = "general";
				return view('tratamientos.table', compact('tratamientos', 'access'));
				break;
				
			case 'datos_personales_tabla': 
				$pacienteDatosPersonales = $paciente->datospersonales;
				return view('paciente_datos_personales.show_fields', compact('pacienteDatosPersonales', 'paciente'));
				break;

			case 'paciente_table': 
				return view('pacientes.table', compact('paciente'));
				break;
			
			default: 
				return view('pacientes.table', compact('paciente'));
				break;
		}
		if($request->redirect == "si"){
		}

	}















    /** @var  TratamientoRepository */
    private $tratamientoRepository;

    public function __construct(TratamientoRepository $tratamientoRepo)
    {
        $this->tratamientoRepository = $tratamientoRepo;
    }

    /**
     * Display a listing of the Tratamiento.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

			$tratamientos = Tratamiento::paginate(10);
        // $tratamiento = $this->tratamientoRepository->paginate(10);
				$access = "";

        return view('tratamientos.index', compact('tratamientos', 'access'));

    }

    /**
     * Show the form for creating a new Tratamiento.
     *
     * @return Response
     */
    public function create()
    {
        return view('tratamientos.create');
    }

    /**
     * Store a newly created Tratamiento in storage.
     *
     * @param CreateTratamientoRequest $request
     *
     * @return Response
     */
    public function store(CreateTratamientoRequest $request)
    {
        $input = $request->all();

        $tratamiento = $this->tratamientoRepository->create($input);

        Flash::success('Tratamiento saved successfully.');

        return redirect(route('tratamientos.index'));
    }

    /**
     * Display the specified Tratamiento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tratamiento = $this->tratamientoRepository->find($id)->with('pro');
				$view = "";
        if (empty($tratamiento)) {
            Flash::error('Tratamiento not found');

            return redirect(route('tratamientos.index'));
        }

        return view('tratamientos.show', compact('tratamiento', 'view'));
    }

    /**
     * Show the form for editing the specified Tratamiento.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tratamiento = $this->tratamientoRepository->find($id);

        if (empty($tratamiento)) {
            Flash::error('Tratamiento not found');

            return redirect(route('tratamientos.index'));
        }

        return view('tratamientos.edit')->with('tratamiento', $tratamiento);
    }

    /**
     * Update the specified Tratamiento in storage.
     *
     * @param int $id
     * @param UpdateTratamientoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTratamientoRequest $request)
    {
        $tratamiento = $this->tratamientoRepository->find($id);

        if (empty($tratamiento)) {
            Flash::error('Tratamiento not found');

            return redirect(route('tratamientos.index'));
        }

        $tratamiento = $this->tratamientoRepository->update($request->all(), $id);

        Flash::success('Tratamiento updated successfully.');

        return redirect(route('tratamientos.index'));
    }

    /**
     * Remove the specified Tratamiento from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tratamiento = $this->tratamientoRepository->find($id);

        if (empty($tratamiento)) {
            Flash::error('Tratamiento not found');

            return redirect(route('tratamientos.index'));
        }

        $this->tratamientoRepository->delete($id);

        Flash::success('Tratamiento deleted successfully.');

        return redirect(route('tratamientos.index'));
    }
}
