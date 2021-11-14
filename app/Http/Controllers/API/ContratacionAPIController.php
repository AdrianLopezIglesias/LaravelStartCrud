<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContratacionAPIRequest;
use App\Http\Requests\API\UpdateContratacionAPIRequest;
use App\Repositories\ContratacionRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\Contratacion;
use Response;

/**
 * Class ContratacionController
 * @package App\Http\Controllers\API
 */

class ContratacionAPIController extends AppBaseController {
	/** @var  ContratacionRepository */
	private $contratacionRepository;

	public function __construct(ContratacionRepository $contratacionRepo) {
		$this->contratacionRepository = $contratacionRepo;
	}

	public function index(Request $request) {
		$paciente = !empty($request->paciente) ? $request->paciente : false;

		$contrataciones = Contratacion::with(['paciente', 'citas', 'tratamiento'])

			->when($paciente, function ($query, $paciente) {
				return $query->where('paciente_id', $paciente);
			})

			// ->when($telefono, function ($query, $telefono) {
			// 	return $query->whereHas('datospersonales', function ($q) use ($telefono) {
			// 		$q->where(function ($query) use ($telefono) {
			// 			$query->where('telefono_principal', 'like', '%' . $telefono . '%')
			// 				->orWhere('telefono_emergencias', 'like', '%' . $telefono . '%');
			// 		});
			// 	});
			// })
			->paginate(15);
		return $this->sendResponse($contrataciones, 'Contrataciones retrieved successfully');
	}


	/**
	 * Store a newly created Contratacion in storage.
	 * POST /contratacions
	 *
	 * @param CreateContratacionAPIRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateContratacionAPIRequest $request) {
		$input = $request->all();

		$contratacion = $this->contratacionRepository->create($input);

		return $this->sendResponse($contratacion->toArray(), 'Contratacion saved successfully');
	}

	/**
	 * Display the specified Contratacion.
	 * GET|HEAD /contratacions/{id}
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		/** @var Contratacion $contratacion */
		$contratacion = $this->contratacionRepository->find($id);

		if (empty($contratacion)) {
			return $this->sendError('Contratacion not found');
		}

		return $this->sendResponse($contratacion->toArray(), 'Contratacion retrieved successfully');
	}

	/**
	 * Update the specified Contratacion in storage.
	 * PUT/PATCH /contratacions/{id}
	 *
	 * @param int $id
	 * @param UpdateContratacionAPIRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateContratacionAPIRequest $request) {
		$input = $request->all();

		/** @var Contratacion $contratacion */
		$contratacion = $this->contratacionRepository->find($id);

		if (empty($contratacion)) {
			return $this->sendError('Contratacion not found');
		}

		$contratacion = $this->contratacionRepository->update($input, $id);

		return $this->sendResponse($contratacion->toArray(), 'Contratacion updated successfully');
	}

	/**
	 * Remove the specified Contratacion from storage.
	 * DELETE /contratacions/{id}
	 *
	 * @param int $id
	 *
	 * @throws \Exception
	 *
	 * @return Response
	 */
	public function destroy($id) {
		/** @var Contratacion $contratacion */
		$contratacion = $this->contratacionRepository->find($id);

		if (empty($contratacion)) {
			return $this->sendError('Contratacion not found');
		}

		$contratacion->delete();

		return $this->sendSuccess('Contratacion deleted successfully');
	}
}
