<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProfesionalTratamientoAPIRequest;
use App\Http\Requests\API\UpdateProfesionalTratamientoAPIRequest;
use App\Models\ProfesionalTratamiento;
use App\Repositories\ProfesionalTratamientoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProfesionalTratamientoController
 * @package App\Http\Controllers\API
 */

class ProfesionalTratamientoAPIController extends AppBaseController
{
    /** @var  ProfesionalTratamientoRepository */
    private $profesionalTratamientoRepository;

    public function __construct(ProfesionalTratamientoRepository $profesionalTratamientoRepo)
    {
        $this->profesionalTratamientoRepository = $profesionalTratamientoRepo;
    }

    /**
     * Display a listing of the ProfesionalTratamiento.
     * GET|HEAD /profesionalTratamientos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $profesionalTratamientos = $this->profesionalTratamientoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($profesionalTratamientos->toArray(), 'Profesional Tratamientos retrieved successfully');
    }

    /**
     * Store a newly created ProfesionalTratamiento in storage.
     * POST /profesionalTratamientos
     *
     * @param CreateProfesionalTratamientoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProfesionalTratamientoAPIRequest $request)
    {
        $input = $request->all();

        $profesionalTratamiento = $this->profesionalTratamientoRepository->create($input);

        return $this->sendResponse($profesionalTratamiento->toArray(), 'Profesional Tratamiento saved successfully');
    }

    /**
     * Display the specified ProfesionalTratamiento.
     * GET|HEAD /profesionalTratamientos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProfesionalTratamiento $profesionalTratamiento */
        $profesionalTratamiento = $this->profesionalTratamientoRepository->find($id);

        if (empty($profesionalTratamiento)) {
            return $this->sendError('Profesional Tratamiento not found');
        }

        return $this->sendResponse($profesionalTratamiento->toArray(), 'Profesional Tratamiento retrieved successfully');
    }

    /**
     * Update the specified ProfesionalTratamiento in storage.
     * PUT/PATCH /profesionalTratamientos/{id}
     *
     * @param int $id
     * @param UpdateProfesionalTratamientoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfesionalTratamientoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProfesionalTratamiento $profesionalTratamiento */
        $profesionalTratamiento = $this->profesionalTratamientoRepository->find($id);

        if (empty($profesionalTratamiento)) {
            return $this->sendError('Profesional Tratamiento not found');
        }

        $profesionalTratamiento = $this->profesionalTratamientoRepository->update($input, $id);

        return $this->sendResponse($profesionalTratamiento->toArray(), 'ProfesionalTratamiento updated successfully');
    }

    /**
     * Remove the specified ProfesionalTratamiento from storage.
     * DELETE /profesionalTratamientos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProfesionalTratamiento $profesionalTratamiento */
        $profesionalTratamiento = $this->profesionalTratamientoRepository->find($id);

        if (empty($profesionalTratamiento)) {
            return $this->sendError('Profesional Tratamiento not found');
        }

        $profesionalTratamiento->delete();

        return $this->sendSuccess('Profesional Tratamiento deleted successfully');
    }
}
