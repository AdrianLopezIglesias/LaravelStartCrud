<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProfesionalHorarioAPIRequest;
use App\Http\Requests\API\UpdateProfesionalHorarioAPIRequest;
use App\Models\ProfesionalHorario;
use App\Repositories\ProfesionalHorarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProfesionalHorarioController
 * @package App\Http\Controllers\API
 */

class ProfesionalHorarioAPIController extends AppBaseController
{
    /** @var  ProfesionalHorarioRepository */
    private $profesionalHorarioRepository;

    public function __construct(ProfesionalHorarioRepository $profesionalHorarioRepo)
    {
        $this->profesionalHorarioRepository = $profesionalHorarioRepo;
    }

    /**
     * Display a listing of the ProfesionalHorario.
     * GET|HEAD /profesionalHorarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $profesionalHorarios = $this->profesionalHorarioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($profesionalHorarios->toArray(), 'Profesional Horarios retrieved successfully');
    }

    /**
     * Store a newly created ProfesionalHorario in storage.
     * POST /profesionalHorarios
     *
     * @param CreateProfesionalHorarioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProfesionalHorarioAPIRequest $request)
    {
        $input = $request->all();

        $profesionalHorario = $this->profesionalHorarioRepository->create($input);

        return $this->sendResponse($profesionalHorario->toArray(), 'Profesional Horario saved successfully');
    }

    /**
     * Display the specified ProfesionalHorario.
     * GET|HEAD /profesionalHorarios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProfesionalHorario $profesionalHorario */
        $profesionalHorario = $this->profesionalHorarioRepository->find($id);

        if (empty($profesionalHorario)) {
            return $this->sendError('Profesional Horario not found');
        }

        return $this->sendResponse($profesionalHorario->toArray(), 'Profesional Horario retrieved successfully');
    }

    /**
     * Update the specified ProfesionalHorario in storage.
     * PUT/PATCH /profesionalHorarios/{id}
     *
     * @param int $id
     * @param UpdateProfesionalHorarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfesionalHorarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProfesionalHorario $profesionalHorario */
        $profesionalHorario = $this->profesionalHorarioRepository->find($id);

        if (empty($profesionalHorario)) {
            return $this->sendError('Profesional Horario not found');
        }

        $profesionalHorario = $this->profesionalHorarioRepository->update($input, $id);

        return $this->sendResponse($profesionalHorario->toArray(), 'ProfesionalHorario updated successfully');
    }

    /**
     * Remove the specified ProfesionalHorario from storage.
     * DELETE /profesionalHorarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProfesionalHorario $profesionalHorario */
        $profesionalHorario = $this->profesionalHorarioRepository->find($id);

        if (empty($profesionalHorario)) {
            return $this->sendError('Profesional Horario not found');
        }

        $profesionalHorario->delete();

        return $this->sendSuccess('Profesional Horario deleted successfully');
    }
}
