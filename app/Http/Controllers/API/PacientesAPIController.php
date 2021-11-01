<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacientesAPIRequest;
use App\Http\Requests\API\UpdatePacientesAPIRequest;
use App\Models\Paciente;
use App\Repositories\PacienteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PacientesController
 * @package App\Http\Controllers\API
 */

class PacientesAPIController extends AppBaseController {
	/** @var  PacienteRepository */
	private $pacientesRepository;

	public function __construct(PacienteRepository $pacientesRepo) {
		$this->pacientesRepository = $pacientesRepo;
	}

	/**
	 * Display a listing of the Pacientes.
	 * GET|HEAD /pacientes
	 *
	 * @param Request $request
	 * @return Response
	 */
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
		$pacientes = $this->pacientesRepository->find($id);

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
	public function update($id, UpdatePacientesAPIRequest $request) {
		$input = $request->all();

		/** @var Pacientes $pacientes */
		$pacientes = $this->pacientesRepository->find($id);

		if (empty($pacientes)) {
			return $this->sendError('Pacientes not found');
		}

		$pacientes = $this->pacientesRepository->update($input, $id);

		return $this->sendResponse($pacientes->toArray(), 'Pacientes updated successfully');
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
