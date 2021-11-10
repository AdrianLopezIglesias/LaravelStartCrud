<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePacientesRequest;
use App\Http\Requests\UpdatePacientesRequest;
use App\Repositories\PacienteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Paciente;
use App\Models\Profesional;
use App\Models\Tratamiento;
use App\Models\Contratacion;
use App\Models\Cita;

class PacientesController extends AppBaseController {




	//===========================================================================
	//=============================== TRANSMUTAR ================================
	//===========================================================================

	public function transmutar(Request $request, $id = 0, $view = "paciente_table", $access = "general") {

		$input = parse_str($request->form->all());

		if ($id != 0 || $request->paciente_id != 0) {
			//============================= EDITAR PACIENTE
			$paciente                = Paciente::find($input['paciente']);
			$pacienteDatosPersonales = $paciente->datospersonales;
			$paciente->fill($input)->save();
			$pacienteDatosPersonales->fill($input)->save();
		} else {
			//============================= NUEVO PACIENTE
			$paciente = Paciente::create($input);
			$paciente->datospersonales()->create($input);
		}

		//=============================== RETURN 
		switch ($view) {
			case 'paciente_show':
				return redirect(route('pacientes.show', [$paciente->id]));
				// return view('pacientes.table', compact('paciente'));
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
		if ($request->redirect == "si") {
		}
	}



	public function render(Request $request) {
		switch ($request->view) {
			case 'ver':
				return view('contratacions.show', compact('contratacion'));
				# code...
				break;
			case      'datospersonales_index':
				$paciente = Paciente::with('datospersonales')->find($request->paciente);
				$pacienteDatosPersonales = $paciente->datospersonales;
				return view('paciente_datos_personales.show_fields', compact('pacienteDatosPersonales', 'paciente'));
				break;
			case      'pacientes_editar':
				$paciente = Paciente::with('datospersonales')->find($request->paciente);
				$pacienteDatosPersonales = $paciente->datospersonales;
				return view('pacientes.create', compact('pacienteDatosPersonales', 'paciente'));
				break;
			case 'nuevo':
				$access = $request->access;
				return view('pacientes.create', compact('access'));
				# code...
				break;


				//NUEVO + EDITAR
			case 'store_new':
				$input  = $request->all();
				$access = $request->access;

				if ($request->ajax == 'si') {
					parse_str($request->form, $input);
				}
				if ($request->update == "si") {
					$paciente                = Paciente::find($input['paciente']);
					$pacienteDatosPersonales = $paciente->datospersonales;
					$paciente->fill($input)->save();
					$pacienteDatosPersonales->fill($input)->save();
				} else {
					$paciente = Paciente::create($input);
					$paciente->datospersonales()->create($input);
				}

				switch ($request->redirect) {
					case 'si':
						return redirect(route('pacientes.show', [$paciente->id]));
						break;
					case 'datos_personales_tabla':
						$pacienteDatosPersonales = $paciente->datospersonales;
						return view('paciente_datos_personales.show_fields', compact('pacienteDatosPersonales', 'paciente'));
						break;

					default:
						return view('pacientes.table', compact('paciente'));
						break;
				}
				if ($request->redirect == "si") {
				}
				break;

			case 'pacientes_buscar':
				$access = $request->access;
				$datos  = [];
				parse_str($request->form, $datos);
				$pacientes = Paciente::where('nombre', 'like', "%" . strtolower($datos['nombre']) . "%")->get();
				return view('pacientes.table', compact('pacientes'));
				break;

			case                     'table':
				$profesionalTratamientos = ProfesionalTratamiento::with(['tratamientos', 'profesional'])->where('profesional_id', $request->profesional);
				$access = $request->access;
				return view('profesional_tratamientos.table', compact('access', 'profesionalTratamientos'));
				break;

			case   'citas_index':
				$citas = Cita::where('paciente_id', $request->paciente);
				$paciente = $request->paciente;
				$access   = $request->access;
				return view('citas.manager', compact('access', 'citas', 'paciente'));
				break;

			case      'tratamientos_index':
				$paciente = Paciente::with('tratamientos')->find($request->paciente);
				$tratamientos = $paciente->tratamientos;
				$paciente     = $paciente->id;
				$access       = $request->access;
				return view('tratamientos.table', compact('access', 'tratamientos', 'paciente'));
				break;

			case           'contrataciones_index':
				$contratacions = Contratacion::where('paciente_id', $request->paciente)->get();
				$paciente = $request->paciente;
				$access   = $request->access;
				return view('contratacions.manager', compact('access', 'contratacions', 'paciente'));
				break;

			default:
				# code...
				break;
		}
	}

	/** @var  PacienteRepository */
	private $pacientesRepository;

	public function __construct(PacienteRepository $pacientesRepo) {
		$this->pacientesRepository = $pacientesRepo;
	}

	/**
	 * Display a listing of the Pacientes.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request) {
		// $pacientes = $this->pacientesRepository->paginate(10);
		$pacientes = Paciente::with('datospersonales')->paginate(10);
		return view('pacientes.index', compact('pacientes'));
	}

	/**
	 * Show the form for creating a new Pacientes.
	 *
	 * @return Response
	 */
	public function create() {
		return view('pacientes.create');
	}

	/**
	 * Store a newly created Pacientein storage.
	 *
	 * @param CreatePacientesRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePacientesRequest $request) {
		dd($request);
		$input = $request->all();

		$paciente = $this->pacientesRepository->create($input);
		$paciente->datospersonales()->create($input);
		$datospersonales = $paciente->datospersonales;

		Flash::success('Pacientes saved successfully.');

		// return redirect(route('pacientes.show'), ['paciente' => $paciente, 'datospersonales' => $datospersonales]);

	}

	/**
	 * Display the specified Pacientes.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		$paciente = $this->pacientesRepository->find($id);

		$paciente                = Paciente::with('datospersonales')->find($id);
		$pacienteDatosPersonales = $paciente->datospersonales;
		// dd($pacienteDatosPersonales);
		return view('pacientes.show', compact('paciente', 'pacienteDatosPersonales'));
	}

	/**
	 * Show the form for editing the specified Pacientes.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function edit($id) {
		$pacientes = $this->pacientesRepository->find($id);

		if (empty($pacientes)) {
			Flash::error('Pacientes not found');

			return redirect(route('pacientes.index'));
		}

		return view('pacientes.edit')->with('pacientes', $pacientes);
	}

	/**
	 * Update the specified Pacientein storage.
	 *
	 * @param int $id
	 * @param UpdatePacientesRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatePacientesRequest $request) {
		$pacientes = $this->pacientesRepository->find($id);

		if (empty($pacientes)) {
			Flash::error('Pacientes not found');

			return redirect(route('pacientes.index'));
		}

		$pacientes = $this->pacientesRepository->update($request->all(), $id);

		Flash::success('Pacientes updated successfully.');

		return redirect(route('pacientes.index'));
	}

	/**
	 * Remove the specified Pacientefrom storage.
	 *
	 * @param int $id
	 *
	 * @throws \Exception
	 *
	 * @return Response
	 */
	public function destroy($id) {
		$pacientes = $this->pacientesRepository->find($id);

		if (empty($pacientes)) {
			Flash::error('Pacientes not found');

			return redirect(route('pacientes.index'));
		}

		$this->pacientesRepository->delete($id);

		Flash::success('Pacientes deleted successfully.');

		return redirect(route('pacientes.index'));
	}
}
