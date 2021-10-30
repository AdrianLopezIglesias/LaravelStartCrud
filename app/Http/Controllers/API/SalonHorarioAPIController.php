<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSalonHorarioAPIRequest;
use App\Http\Requests\API\UpdateSalonHorarioAPIRequest;
use App\Models\SalonHorario;
use App\Repositories\SalonHorarioRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class SalonHorarioController
 * @package App\Http\Controllers\API
 */

class SalonHorarioAPIController extends AppBaseController
{
    /** @var  SalonHorarioRepository */
    private $salonHorarioRepository;

    public function __construct(SalonHorarioRepository $salonHorarioRepo)
    {
        $this->salonHorarioRepository = $salonHorarioRepo;
    }

    /**
     * Display a listing of the SalonHorario.
     * GET|HEAD /salonHorarios
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $salonHorarios = $this->salonHorarioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($salonHorarios->toArray(), 'Salon Horarios retrieved successfully');
    }

    /**
     * Store a newly created SalonHorario in storage.
     * POST /salonHorarios
     *
     * @param CreateSalonHorarioAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSalonHorarioAPIRequest $request)
    {
        $input = $request->all();

        $salonHorario = $this->salonHorarioRepository->create($input);

        return $this->sendResponse($salonHorario->toArray(), 'Salon Horario saved successfully');
    }

    /**
     * Display the specified SalonHorario.
     * GET|HEAD /salonHorarios/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SalonHorario $salonHorario */
        $salonHorario = $this->salonHorarioRepository->find($id);

        if (empty($salonHorario)) {
            return $this->sendError('Salon Horario not found');
        }

        return $this->sendResponse($salonHorario->toArray(), 'Salon Horario retrieved successfully');
    }

    /**
     * Update the specified SalonHorario in storage.
     * PUT/PATCH /salonHorarios/{id}
     *
     * @param int $id
     * @param UpdateSalonHorarioAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalonHorarioAPIRequest $request)
    {
        $input = $request->all();

        /** @var SalonHorario $salonHorario */
        $salonHorario = $this->salonHorarioRepository->find($id);

        if (empty($salonHorario)) {
            return $this->sendError('Salon Horario not found');
        }

        $salonHorario = $this->salonHorarioRepository->update($input, $id);

        return $this->sendResponse($salonHorario->toArray(), 'SalonHorario updated successfully');
    }

    /**
     * Remove the specified SalonHorario from storage.
     * DELETE /salonHorarios/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SalonHorario $salonHorario */
        $salonHorario = $this->salonHorarioRepository->find($id);

        if (empty($salonHorario)) {
            return $this->sendError('Salon Horario not found');
        }

        $salonHorario->delete();

        return $this->sendSuccess('Salon Horario deleted successfully');
    }
}
