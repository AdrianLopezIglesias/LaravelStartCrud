<?php
namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacientesAPIRequest;
use App\Http\Requests\API\UpdatePacientesAPIRequest;
use App\Models\Paciente;
use App\Repositories\PacienteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

class PacientesAPIController extends AppBaseController {
	private $pacientesRepository;

	public function __construct(PacienteRepository $pacientesRepo) {
		$this->pacientesRepository = $pacientesRepo;
	}

	public function index(Request $request) {
		$nombre = !empty($request->nombre) ? $request->nombre : false;
		$dni = !empty($request->dni) ? $request->dni : false;
		$telefono = !empty($request->telefono) ? $request->telefono : false;

		$pacientes = Paciente::with(['datospersonales', 'contrataciones', 'citas', 'tratamientos'])
			->when($nombre, function ($query, $nombre) {
				return $query->where('nombre', 'like', '%' . $nombre . '%');
			})
			->when($dni, function ($query, $dni) {
				return $query->whereHas('datospersonales', function ($q) use ($dni) {
					$q->where('dni', 'like', '%' . $dni . '%');
				});
			})
			->when($telefono, function ($query, $telefono) {
				return $query->whereHas('datospersonales', function ($q) use ($telefono) {
					$q->where(function ($query) use ($telefono) {
						$query->where('telefono_principal', 'like', '%' . $telefono . '%')
							->orWhere('telefono_emergencias', 'like', '%' . $telefono . '%');
					});
				});
			})
			->paginate(15);
		return $this->sendResponse($pacientes, 'Pacientes retrieved successfully');


		// if (isset($request->nombre) && $request->nombre != "") {
		//     $nombre = mb_strtolower($request->nombre);
		//     $pacientes = Paciente::where('nombre', 'like', '%' . $nombre . '%')
		//         ->with(['datospersonales', 'contrataciones', 'citas', 'tratamientos'])
		//         ->paginate(10);
		//     return $this->sendResponse($pacientes, 'Pacientes retrieved successfully');
		// } else {
		//     $pacientes = Paciente::with(['datospersonales', 'contrataciones', 'citas', 'tratamientos'])->paginate(10);
		// }
		// return $this->sendResponse($pacientes, 'Pacientes retrieved successfully');
	}

	/**
	 * Store a newly created Pacientes in storage.
	 * POST /pacientes
	 *
	 * @param CreatePacientesAPIRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatePacientesAPIRequest $request) {
		$input = $request->all();

		$pacientes = $this->pacientesRepository->create($input);

		return $this->sendResponse($pacientes->toArray(), 'Pacientes saved successfully');
	}

	/**
	 * Display the specified Pacientes.
	 * GET|HEAD /pacientes/{id}
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		/** @var Pacientes $pacientes */
		$pacientes = Paciente::with(['datospersonales', 'contrataciones', 'citas', 'tratamientos'])->find($id);

		// $pacientes = $this->pacientesRepository->find($id);

		if (empty($pacientes)) {
			return $this->sendError('Pacientes not found');
		}

		return $this->sendResponse($pacientes->toArray(), 'Pacientes retrieved successfully');
	}

	/**
	 * Update the specified Pacientes in storage.
	 * PUT/PATCH /pacientes/{id}
	 *
	 * @param int $id
	 * @param UpdatePacientesAPIRequest $request
	 *
	 * @return Response
	 */
	public function update($id, Request $request) {
		$input = $request->all();
		$paciente = Paciente::with('datospersonales')->find($id);


		if (empty($paciente)) {
			return $this->sendError('Pacientes not found');
		}
		$paciente->update($input);
		$paciente->datospersonales()->update([
			'dni' => $input['datospersonales']['dni'],
			'fecha_nacimiento' => $input['datospersonales']['fecha_nacimiento'],
			'domicilio' => $input['datospersonales']['domicilio'],
			'telefono_principal' => $input['datospersonales']['telefono_principal'],
			'telefono_emergencias' => $input['datospersonales']['telefono_emergencias'],
			'genero' => $input['datospersonales']['genero']
		]);


		return $this->sendResponse($paciente->toArray(), 'Pacientes updated successfully');
	}

	/**
	 * Remove the specified Pacientes from storage.
	 * DELETE /pacientes/{id}
	 *
	 * @param int $id
	 *
	 * @throws \Exception
	 *
	 * @return Response
	 */
	public function destroy($id) {
		/** @var Pacientes $pacientes */
		$pacientes = $this->pacientesRepository->find($id);

		if (empty($pacientes)) {
			return $this->sendError('Pacientes not found');
		}

		$pacientes->delete();

		return $this->sendSuccess('Pacientes deleted successfully');
	}
}
