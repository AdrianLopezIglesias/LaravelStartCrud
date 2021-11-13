<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatetratamientoAPIRequest;
use App\Http\Requests\API\UpdatetratamientoAPIRequest;
use App\Models\Tratamiento;
use App\Repositories\tratamientoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;


class tratamientoAPIController extends AppBaseController {
	/** @var  tratamientoRepoitory */
	private $tratamientoRepository;

	public function __construct(tratamientoRepository $tratamientoRepo) {
		$this->tratamientoRepository = $tratamientoRepo;
	}

	public function index(Request $request) {
		$nombre = !empty($request->nombre) ? $request->nombre : false;

		$tratamientos = Tratamiento::with('area')
			->when($nombre, function ($query, $nombre) {
				return $query->where('nombre', 'like', '%' . $nombre . '%');
			})
			->paginate(15);

		return $this->sendResponse($tratamientos, 'Tratamientos retrieved successfully');
	}

	/**
	 * Store a newly created tratamiento in storage.
	 * POST /tratamientos
	 *
	 * @param CreatetratamientoAPIRequest $request
	 *
	 * @return Response
	 */
	public function store(CreatetratamientoAPIRequest $request) {
		$input = $request->all();

		$tratamiento = $this->tratamientoRepository->create($input);

		return $this->sendResponse($tratamiento->toArray(), 'Tratamiento saved successfully');
	}

	/**
	 * Display the specified tratamiento.
	 * GET|HEAD /tratamientos/{id}
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id) {
		/** @var tratamiento $tratamiento */
		$tratamiento = $this->tratamientoRepository->find($id);

		if (empty($tratamiento)) {
			return $this->sendError('Tratamiento not found');
		}

		return $this->sendResponse($tratamiento->toArray(), 'Tratamiento retrieved successfully');
	}

	/**
	 * Update the specified tratamiento in storage.
	 * PUT/PATCH /tratamientos/{id}
	 *
	 * @param int $id
	 * @param UpdatetratamientoAPIRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdatetratamientoAPIRequest $request) {
		$input = $request->all();

		/** @var tratamiento $tratamiento */
		$tratamiento = $this->tratamientoRepository->find($id);

		if (empty($tratamiento)) {
			return $this->sendError('Tratamiento not found');
		}

		$tratamiento = $this->tratamientoRepository->update($input, $id);

		return $this->sendResponse($tratamiento->toArray(), 'tratamiento updated successfully');
	}

	/**
	 * Remove the specified tratamiento from storage.
	 * DELETE /tratamientos/{id}
	 *
	 * @param int $id
	 *
	 * @throws \Exception
	 *
	 * @return Response
	 */
	public function destroy($id) {
		/** @var tratamiento $tratamiento */
		$tratamiento = $this->tratamientoRepository->find($id);

		if (empty($tratamiento)) {
			return $this->sendError('Tratamiento not found');
		}

		$tratamiento->delete();

		return $this->sendSuccess('Tratamiento deleted successfully');
	}
}
