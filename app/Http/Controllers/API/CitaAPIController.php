<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCitaAPIRequest;
use App\Http\Requests\API\UpdateCitaAPIRequest;
use App\Models\Cita;
use App\Repositories\CitaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;
use App\Models\Profesional;
use App\Helpers\TimeHelper;
use Illuminate\Support\Facades\DB;

/**
 * Class CitaController
 * @package App\Http\Controllers\API
 */

class CitaAPIController extends AppBaseController {

	/** @var  CitaRepository */
	private $citaRepository;

	public function __construct(CitaRepository $citaRepo) {
		$this->citaRepository = $citaRepo;
	}


	public function disponibilidad(Request $request) {
		$citas = Cita::whereDate('dia', date('y-m-d', strtotime($request->dia)))->with('tratamiento')->get();

		$turnos = 12 * 9;
		$disponibilidad = [];
		for ($i = 0; $i < $turnos; $i++) {
			$disponibilidad[$i]['disponibilidad'] =  'free';
			$disponibilidad[$i]['cod_horario'] =  $i;

			$disponibilidad[$i]['hora_inicio'] =  TimeHelper::getTime($i);

			$disponibilidad[$i]['hora_fin'] =  TimeHelper::getTime($i + ($request->tratamiento_duracion)/5);
		}
		foreach ($citas as $cita) {
			$disponibilidad[$cita->turno]['disponibilidad'] = "busy";
			for ($h=0; $h < ($cita->tratamiento->duracion)/5; $h++) { 
				$disponibilidad[$cita->turno + $h]['disponibilidad'] = "busy";
			}
		}

		return $disponibilidad;


		return $this->sendResponse($citas->toArray(), 'Citas retrieved successfully');
	}
	/**
	 * Display a listing of the Cita.
	 * GET|HEAD /citas
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function index(Request $request) {
		$citas = $this->citaRepository->all(
			$request->except(['skip', 'limit']),
			$request->get('skip'),
			$request->get('limit')
		);
		$citas = Cita::paginate(10);

		return $this->sendResponse($citas, 'Citas retrieved successfully');
	}

	/**
	 * Store a newly created Cita in storage.
	 * POST /citas
	 *
	 * @param CreateCitaAPIRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateCitaAPIRequest $request) {
		$input = $request->all();
		// return $input; 
		$cita = Cita::create($input); 
		// $cita = $this->citaRepository->create($input);
		$cita->profesional()->save(Profesional::find(1));
		return $cita;
		return $this->sendResponse($cita->toArray(), 'Cita saved successfully');
	}

	/**
	 * Display the specified Cita.
	 * GET|HEAD /citas/{id}
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		/** @var Cita $cita */
		$cita = $this->citaRepository->find($id);

		if (empty($cita)) {
			return $this->sendError('Cita not found');
		}

		return $this->sendResponse($cita->toArray(), 'Cita retrieved successfully');
	}

	/**
	 * Update the specified Cita in storage.
	 * PUT/PATCH /citas/{id}
	 *
	 * @param int $id
	 * @param UpdateCitaAPIRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateCitaAPIRequest $request) {
		$input = $request->all();

		/** @var Cita $cita */
		$cita = $this->citaRepository->find($id);

		if (empty($cita)) {
			return $this->sendError('Cita not found');
		}

		$cita = $this->citaRepository->update($input, $id);

		return $this->sendResponse($cita->toArray(), 'Cita updated successfully');
	}

	/**
	 * Remove the specified Cita from storage.
	 * DELETE /citas/{id}
	 *
	 * @param int $id
	 *
	 * @throws \Exception
	 *
	 * @return Response
	 */
	public function destroy($id) {
		/** @var Cita $cita */
		$cita = $this->citaRepository->find($id);

		if (empty($cita)) {
			return $this->sendError('Cita not found');
		}

		$cita->delete();

		return $this->sendSuccess('Cita deleted successfully');
	}
}
