<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePacienteDatosPersonalesAPIRequest;
use App\Http\Requests\API\UpdatePacienteDatosPersonalesAPIRequest;
use App\Models\PacienteDatosPersonales;
use App\Repositories\PacienteDatosPersonalesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PacienteDatosPersonalesController
 * @package App\Http\Controllers\API
 */

class PacienteDatosPersonalesAPIController extends AppBaseController
{
    /** @var  PacienteDatosPersonalesRepository */
    private $pacienteDatosPersonalesRepository;

    public function __construct(PacienteDatosPersonalesRepository $pacienteDatosPersonalesRepo)
    {
        $this->pacienteDatosPersonalesRepository = $pacienteDatosPersonalesRepo;
    }

    /**
     * Display a listing of the PacienteDatosPersonales.
     * GET|HEAD /pacienteDatosPersonales
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($pacienteDatosPersonales->toArray(), 'Paciente Datos Personales retrieved successfully');
    }

    /**
     * Store a newly created PacienteDatosPersonales in storage.
     * POST /pacienteDatosPersonales
     *
     * @param CreatePacienteDatosPersonalesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePacienteDatosPersonalesAPIRequest $request)
    {
        $input = $request->all();

        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->create($input);

        return $this->sendResponse($pacienteDatosPersonales->toArray(), 'Paciente Datos Personales saved successfully');
    }

    /**
     * Display the specified PacienteDatosPersonales.
     * GET|HEAD /pacienteDatosPersonales/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PacienteDatosPersonales $pacienteDatosPersonales */
        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->find($id);

        if (empty($pacienteDatosPersonales)) {
            return $this->sendError('Paciente Datos Personales not found');
        }

        return $this->sendResponse($pacienteDatosPersonales->toArray(), 'Paciente Datos Personales retrieved successfully');
    }

    /**
     * Update the specified PacienteDatosPersonales in storage.
     * PUT/PATCH /pacienteDatosPersonales/{id}
     *
     * @param int $id
     * @param UpdatePacienteDatosPersonalesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePacienteDatosPersonalesAPIRequest $request)
    {
        $input = $request->all();

        /** @var PacienteDatosPersonales $pacienteDatosPersonales */
        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->find($id);

        if (empty($pacienteDatosPersonales)) {
            return $this->sendError('Paciente Datos Personales not found');
        }

        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->update($input, $id);

        return $this->sendResponse($pacienteDatosPersonales->toArray(), 'PacienteDatosPersonales updated successfully');
    }

    /**
     * Remove the specified PacienteDatosPersonales from storage.
     * DELETE /pacienteDatosPersonales/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PacienteDatosPersonales $pacienteDatosPersonales */
        $pacienteDatosPersonales = $this->pacienteDatosPersonalesRepository->find($id);

        if (empty($pacienteDatosPersonales)) {
            return $this->sendError('Paciente Datos Personales not found');
        }

        $pacienteDatosPersonales->delete();

        return $this->sendSuccess('Paciente Datos Personales deleted successfully');
    }
}
