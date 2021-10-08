<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacientesAPIRequest;
use App\Http\Requests\API\UpdatePacientesAPIRequest;
use App\Models\Pacientes;
use App\Repositories\PacientesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PacientesController
 * @package App\Http\Controllers\API
 */

class PacientesAPIController extends AppBaseController
{
    /** @var  PacientesRepository */
    private $pacientesRepository;

    public function __construct(PacientesRepository $pacientesRepo)
    {
        $this->pacientesRepository = $pacientesRepo;
    }

    /**
     * Display a listing of the Pacientes.
     * GET|HEAD /pacientes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pacientes = $this->pacientesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pacientes->toArray(), 'Pacientes retrieved successfully');
    }

    /**
     * Store a newly created Pacientes in storage.
     * POST /pacientes
     *
     * @param CreatePacientesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePacientesAPIRequest $request)
    {
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
    public function show($id)
    {
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
    public function update($id, UpdatePacientesAPIRequest $request)
    {
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
    public function destroy($id)
    {
        /** @var Pacientes $pacientes */
        $pacientes = $this->pacientesRepository->find($id);

        if (empty($pacientes)) {
            return $this->sendError('Pacientes not found');
        }

        $pacientes->delete();

        return $this->sendSuccess('Pacientes deleted successfully');
    }
}
